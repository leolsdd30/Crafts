<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Homeowner Dashboard</h1>
        
        <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <p class="text-gray-500 text-lg">
                    Welcome back! This is your control center. Soon, you will be able to see your active repairs, pending quotes, and post new jobs right here.
                </p>
                
                <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Placeholder Stat Cards -->
                    <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-indigo-500 truncate">Active Jobs</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-indigo-500 truncate">Pending Quotes</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm font-medium text-indigo-500 truncate">Completed Jobs</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">0</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Post a Job Call to Action -->
        <div class="bg-indigo-700 rounded-lg shadow-xl overflow-hidden">
            <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                <div class="lg:self-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Ready to fix something?</span>
                        <span class="block text-indigo-200">Post a job today.</span>
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-indigo-200">
                        Describe what you need done, and receive quotes from verified professionals in your area.
                    </p>
                    <a href="<?= APP_URL ?>/jobs/create" class="mt-8 bg-white border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center text-base font-medium text-indigo-600 hover:bg-indigo-50 transition duration-150">
                        Post a New Job
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
