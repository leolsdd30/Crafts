<!-- Job Board Listing -->
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-3xl font-extrabold text-gray-900">Job Board</h1>
                <p class="mt-1 text-sm text-gray-500">Browse open jobs posted by homeowners looking for skilled professionals.</p>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="<?= APP_URL ?>/jobs/create" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Post a Job
                </a>
            </div>
            <?php endif; ?>
        </div>

        <!-- Job List -->
        <?php if (!empty($jobs)): ?>
        <div class="space-y-4">
            <?php foreach ($jobs as $job): ?>
            <a href="<?= APP_URL ?>/jobs/show?id=<?= $job['id'] ?>" class="block bg-white shadow rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-lg font-semibold text-indigo-600 truncate"><?= htmlspecialchars($job['title']) ?></h2>
                            <div class="mt-1 flex items-center space-x-4 text-sm text-gray-500">
                                <span class="flex items-center">
                                    <svg class="mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    <?= htmlspecialchars($job['first_name'] . ' ' . $job['last_name']) ?>
                                </span>
                                <span class="flex items-center">
                                    <svg class="mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    <?= htmlspecialchars($job['address']) ?>
                                </span>
                                <span class="flex items-center">
                                    <svg class="mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <?= date('M d, Y', strtotime($job['created_at'])) ?>
                                </span>
                            </div>
                        </div>
                        <div class="ml-4 flex flex-col items-end space-y-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                <?= htmlspecialchars($job['service_category']) ?>
                            </span>
                            <?php if (!empty($job['budget_range'])): ?>
                            <span class="text-sm font-medium text-gray-700"><?= htmlspecialchars($job['budget_range']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="mt-3 text-sm text-gray-500 line-clamp-2"><?= htmlspecialchars(substr($job['description'], 0, 200)) ?>...</p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">No open jobs yet</h3>
            <p class="mt-1 text-sm text-gray-500">Be the first to post a job and find the right professional.</p>
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="mt-6">
                <a href="<?= APP_URL ?>/jobs/create" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                    Post a Job
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
