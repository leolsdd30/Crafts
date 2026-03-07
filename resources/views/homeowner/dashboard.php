<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Homeowner Dashboard</h1>
        
        <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <p class="text-gray-500 text-lg mb-6">
                    Welcome back! Here is an overview of your active repair requests.
                </p>
                
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-2">
                    <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-indigo-500 truncate">Active or Pending Jobs</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $activeJobsCount ?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-indigo-500 truncate">Completed Jobs</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900"><?= $completedJobsCount ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-xl font-bold text-gray-900 mb-4">My Posted Jobs</h2>
        <?php if (!empty($jobs)): ?>
            <div class="bg-white shadow overflow-hidden sm:rounded-md mb-8 border border-gray-100">
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($jobs as $job): ?>
                    <li>
                        <a href="<?= APP_URL ?>/jobs/show?id=<?= $job['id'] ?>" class="block hover:bg-gray-50 transition duration-150 relative">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-md font-bold text-indigo-600 truncate">
                                        <?= htmlspecialchars($job['title']) ?>
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            <?= $job['status'] === 'open' ? 'bg-green-100 text-green-800' : ($job['status'] === 'assigned' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') ?>">
                                            <?= ucfirst($job['status']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm font-medium text-gray-500 bg-gray-100 px-2 rounded">
                                            <?= htmlspecialchars($job['service_category']) ?>
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 space-x-4">
                                        <?php if (!empty($job['budget_range'])): ?>
                                        <p class="font-medium text-gray-700"><?= htmlspecialchars($job['budget_range']) ?></p>
                                        <?php endif; ?>
                                        <p>Posted on <?= date('M d, Y', strtotime($job['created_at'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="bg-gray-50 shadow-sm border border-gray-200 rounded-lg p-10 text-center mb-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-gray-600 mt-2 mb-4 font-medium">You haven't posted any jobs yet.</p>
                <a href="<?= APP_URL ?>/jobs/create" class="bg-indigo-600 border border-transparent rounded-md shadow px-6 py-3 inline-flex items-center text-sm font-medium text-white hover:bg-indigo-700 transition duration-150">
                    Post your first job
                </a>
            </div>
        <?php endif; ?>

        <?php if (!empty($jobs)): ?>
        <!-- Post a Job Call to Action -->
        <div class="bg-indigo-700 rounded-lg shadow-xl overflow-hidden mt-8">
            <div class="pt-8 pb-10 px-6 sm:px-12 flex justify-between items-center">
                <div class="lg:self-center">
                    <h2 class="text-2xl font-extrabold text-white">Need another repair?</h2>
                    <p class="text-indigo-200 mt-1">Receive quotes from verified professionals in your area.</p>
                </div>
                <a href="<?= APP_URL ?>/jobs/create" class="bg-white border text-center border-transparent rounded-md shadow px-5 py-3 text-base font-bold text-indigo-600 hover:bg-slate-50 transition duration-150">
                    Post New Job
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
