<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'CraftConnect' ?></title>
    <!-- Use Tailwind via CDN for prototyping -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-900">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="<?= APP_URL ?>/" class="text-2xl font-bold text-indigo-600">CraftConnect</a>
                    </div>
                    <!-- Main Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="<?= APP_URL ?>/" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="<?= APP_URL ?>/search" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Find Craftsmen
                        </a>
                        <a href="<?= APP_URL ?>/jobs" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Job Board
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php 
                            $dashboardUrl = $_SESSION['role'] === 'craftsman' 
                                ? APP_URL . '/craftsman/dashboard' 
                                : APP_URL . '/homeowner/dashboard';
                        ?>
                        <a href="<?= $dashboardUrl ?>" class="text-sm font-medium text-gray-500 hover:text-gray-900 border-b-2 border-transparent hover:border-indigo-600 transition-colors duration-200">
                            Dashboard
                        </a>
                        <span class="text-sm text-gray-300">|</span>
                        <a href="<?= APP_URL ?>/profile?id=<?= $_SESSION['user_id'] ?>" class="flex items-center space-x-2 hover:bg-gray-50 p-2 rounded-md transition-colors duration-200" title="View Profile">
                            <span class="text-sm font-semibold text-gray-700"><?= htmlspecialchars($_SESSION['name']) ?></span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $_SESSION['role'] === 'craftsman' ? 'bg-indigo-100 text-indigo-800' : 'bg-green-100 text-green-800' ?> capitalize">
                                <?= htmlspecialchars($_SESSION['role']) ?>
                            </span>
                        </a>
                    <?php else: ?>
                        <a href="<?= APP_URL ?>/login" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-200">Log in</a>
                        <a href="<?= APP_URL ?>/register" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200">Sign up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <?php
            // The controller will set $contentView to the nested view file path
            if (isset($contentView)) {
                require BASE_PATH . "/resources/views/{$contentView}.php";
            }
        ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">&copy; <?= date('Y') ?> CraftConnect. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
