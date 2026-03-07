<!-- Discover Craftsmen View -->
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <!-- Header and Search Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Find Skilled Professionals</h1>
            <p class="text-gray-500 mb-6">Browse verified craftsmen with experience in your specific home project needs.</p>

            <!-- Search Form -->
            <form action="<?= APP_URL ?>/search" method="GET" class="bg-white p-6 shadow-sm rounded-lg flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex-grow">
                    <label for="q" class="sr-only">Search</label>
                    <input type="text" name="q" id="q" value="<?= htmlspecialchars($filters['search'] ?? '') ?>" placeholder="Search by name, skill, or bio keywords..."
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2 border">
                </div>
                <div class="md:w-64">
                    <label for="category" class="sr-only">Category</label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2 border bg-white">
                        <option value="">All Categories</option>
                        <?php
                            $categories = ["Plumbing", "Electrical", "Carpentry", "Painting", "Roofing", "HVAC", "Landscaping", "Tiling", "General Handyman"];
                            foreach ($categories as $cat):
                        ?>
                            <option value="<?= $cat ?>" <?= (isset($filters['category']) && $filters['category'] === $cat) ? 'selected' : '' ?>><?= $cat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="inline-flex justify-center px-6 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                    Search
                </button>
                <?php if (!empty($filters['search']) || !empty($filters['category'])): ?>
                    <a href="<?= APP_URL ?>/search" class="text-xs text-gray-400 mt-2 block text-center underline">Clear filters</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Craftsman Grid -->
        <?php if (!empty($craftsmen)): ?>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach ($craftsmen as $craft): ?>
            <div class="bg-white overflow-hidden shadow rounded-lg flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="p-6 flex-grow">
                    <div class="flex items-center space-x-4 mb-4">
                        <img class="h-16 w-16 rounded-full object-cover border-2 <?= $craft['is_verified'] ? 'border-green-300' : 'border-gray-100' ?>" 
                             src="<?= get_profile_picture_url($craft['profile_picture'] ?? 'default.png', $craft['first_name'], $craft['last_name']) ?>" 
                             alt="<?= htmlspecialchars($craft['first_name']) ?>">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 flex items-center">
                                <?= htmlspecialchars($craft['first_name'] . ' ' . $craft['last_name']) ?>
                                <?php if ($craft['is_verified']): ?>
                                <svg class="ml-1.5 h-4 w-4 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812 3.066 3.066 0 00.723 1.745 3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <?php endif; ?>
                            </h2>
                            <p class="text-xs font-semibold uppercase tracking-wider text-indigo-600"><?= htmlspecialchars($craft['service_category']) ?></p>
                        </div>
                    </div>

                    <?php if (!empty($craft['bio'])): ?>
                    <p class="text-sm text-gray-500 line-clamp-3 mb-4"><?= htmlspecialchars($craft['bio']) ?></p>
                    <?php endif; ?>

                    <div class="flex items-center justify-between text-sm py-3 border-t border-gray-50">
                        <div>
                            <span class="text-gray-400">Hourly Rate</span>
                            <p class="font-bold text-gray-900">$<?= number_format($craft['hourly_rate'], 2) ?></p>
                        </div>
                        <div class="text-right">
                            <span class="text-gray-400">Success Rate</span>
                            <p class="font-bold text-gray-900">100%</p>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 mt-auto">
                    <a href="<?= APP_URL ?>/profile?id=<?= $craft['user_id'] ?>" class="block w-full text-center py-2 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                        View Profile
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-24 bg-white shadow rounded-lg">
            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">No craftsmen found</h3>
            <p class="mt-1 text-sm text-gray-500">Try adjusting your filters or search keywords.</p>
            <div class="mt-6">
                <a href="<?= APP_URL ?>/search" class="text-indigo-600 font-semibold hover:text-indigo-500">Clear all filters</a>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
