<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Craftsman Dashboard</h1>
        
        <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <p class="text-gray-500 text-lg">
                    Welcome back! Manage your business, accept jobs, and view your earnings all from this portal.
                </p>
                
                <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Placeholder Stat Cards -->
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Total Earnings</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">$0.00</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Active Bookings</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-green-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-green-700 truncate">Submitted Bids</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Browse Jobs Call to Action -->
            <div class="bg-white border rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Browse Open Jobs</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Find homeowners looking for your specific skills right now.
                    </p>
                    <a href="<?= APP_URL ?>/jobs" class="mt-4 block w-full text-center bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 transition duration-150">
                        Search Jobs
                    </a>
                </div>
            </div>

            <!-- Profile Completion Action -->
            <div class="bg-white border rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Complete Your Profile</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Upload your portfolio and verify your identity to attract more clients.
                    </p>
                    <a href="#" class="mt-4 block w-full text-center bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
