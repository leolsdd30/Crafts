<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Craftsman Dashboard</h1>
        
        <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <p class="text-gray-500 text-lg">
                    Welcome back! Manage your business, track your bids, and view your active jobs.
                </p>
                
                <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Total Earnings</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">$<?= number_format($totalEarnings, 2) ?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Active Bookings</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $activeBookings ?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Submitted Bids</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $submittedBids ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-[1fr_350px]">
            <!-- My Submitted Quotes -->
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-4">My Submitted Quotes</h2>
                <?php if (!empty($quotes)): ?>
                <div class="bg-white shadow overflow-hidden sm:rounded-md border border-gray-100">
                    <ul class="divide-y divide-gray-200">
                        <?php foreach ($quotes as $quote): ?>
                        <li>
                            <a href="<?= APP_URL ?>/jobs/show?id=<?= $quote['job_posting_id'] ?>" class="block hover:bg-gray-50 transition duration-150">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <p class="text-md font-bold text-indigo-600 truncate">
                                            <?= htmlspecialchars($quote['title']) ?>
                                        </p>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <p class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                <?= $quote['status'] === 'accepted' ? 'bg-green-100 text-green-800' : ($quote['status'] === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                                Quote <?= ucfirst($quote['status']) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm font-medium text-gray-900">
                                                My Bid: $<?= number_format($quote['quoted_price'], 2) ?>
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                            <p>Submitted on <?= date('M d, Y', strtotime($quote['created_at'])) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php else: ?>
                <div class="bg-gray-50 shadow-sm border border-gray-200 rounded-lg p-10 text-center">
                    <p class="text-gray-600 font-medium">You haven't submitted any quotes yet.</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Profile & Quick Links -->
            <div class="space-y-6">
                <div class="bg-indigo-600 rounded-lg shadow shadow-indigo-200 p-6 text-white text-center">
                    <h2 class="text-xl font-bold">Find Work Now</h2>
                    <p class="mt-2 text-indigo-200 text-sm">Browse open requests and submit bids to grow your income.</p>
                    <a href="<?= APP_URL ?>/jobs" class="mt-4 block w-full bg-white text-indigo-600 font-bold py-2 rounded shadow transition hover:bg-indigo-50">
                        Job Board &rarr;
                    </a>
                </div>

                <div class="bg-white border rounded-lg shadow-sm p-6">
                    <h2 class="text-lg leading-6 font-bold text-gray-900">Your Presence</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Update your portfolio and bio so homeowners trust you.
                    </p>
                    <div class="mt-4 space-y-3">
                        <a href="<?= APP_URL ?>/profile?id=<?= $_SESSION['user_id'] ?>" class="block w-full text-center bg-indigo-50 text-indigo-700 border border-indigo-200 font-medium py-2 rounded hover:bg-indigo-100">
                            View Public Profile
                        </a>
                        <button onclick="alert('Profile Editor coming soon!')" class="block w-full text-center bg-white text-gray-700 border border-gray-300 font-medium py-2 rounded hover:bg-gray-50">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
