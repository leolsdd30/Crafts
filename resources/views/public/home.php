<?php
/*
|=============================================================================
| HERO IMAGE MODE — READ THIS BEFORE CHANGING ANYTHING
|=============================================================================
|
| Currently ACTIVE: SLIDESHOW MODE
|   - Images auto-advance every 4 seconds with a smooth fade
|   - Dot indicators at the bottom let the user click to jump to any photo
|   - Arrow buttons (< >) let the user go forward or back manually
|   - Slideshow pauses when the user hovers over the image
|   - All controlled by the <script> block at the bottom of this file
|
| To switch back to STATIC MODE (one fixed photo, no JS, simpler):
|   1. Delete or comment out the entire "SLIDESHOW MODE ACTIVE" PHP block below
|   2. Uncomment the "STATIC MODE" PHP block below it
|   3. In the Hero Image section (search for "Hero Image"), replace the
|      slideshow <div id="hero-slideshow"> block with the single <img> tag:
|         <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
|              src="<?= $staticPhotoUrl ?>"
|              alt="Professional craftsman at work">
|   4. Delete the <script> block at the very bottom of this file
|
|=============================================================================
*/

// =============================================================================
// SLIDESHOW MODE ACTIVE — comment out this entire block to switch to static
// =============================================================================
$heroPhotos = [
    ['id' => '1620653713380-7a34b773fef8', 'alt' => 'Professional plumber fixing a pipe with a wrench'],
    ['id' => '1504307651254-35680f356dfd', 'alt' => 'Handyman working on a home project'],
    ['id' => '1749532125405-70950966b0e5', 'alt' => 'Electrician working on electrical panel'],
    ['id' => '1513694203232-719a280e022f', 'alt' => 'Professional painter painting a wall'],
    ['id' => '1621905251918-48416bd8575a', 'alt' => 'Carpenter measuring wood for a project'],
    ['id' => '1558618666-fcd25c85cd64', 'alt' => 'Mason laying bricks for a wall'],
    ['id' => '1574359411659-15573a27fd0c', 'alt' => 'General contractor reviewing building plans'],
    ['id' => '1589939705384-5185137a7f0f', 'alt' => 'Handyman using a power drill'],
];
$slideshowUrls = array_map(fn($p) => [
    'url' => "https://images.unsplash.com/photo-{$p['id']}?q=80&w=1545&auto=format&fit=crop",
    'alt' => $p['alt']
], $heroPhotos);
// =============================================================================
// END SLIDESHOW MODE BLOCK
// =============================================================================


// =============================================================================
// STATIC MODE — uncomment this block (and follow the 4 steps above) to use
// a single fixed photo instead of the slideshow
// =============================================================================
// $staticPhotoUrl = "https://images.unsplash.com/photo-1620653713380-7a34b773fef8?q=80&w=1545&auto=format&fit=crop";
// =============================================================================
// END STATIC MODE BLOCK
// =============================================================================
?>

<!-- ═══════════════════════════════════════════════════════════════════
     HERO SECTION
     FIX: h1 uses text-3xl on mobile (was text-4xl — too big on 375px phones).
     FIX: CTA buttons are full-width on mobile, auto width on sm+.
     The lg: split layout (text left / image right) is unchanged.
═══════════════════════════════════════════════════════════════════ -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

            <!-- Diagonal shape — desktop only -->
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                 fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">

                    <!-- [FIX] text-3xl on mobile (was text-4xl — too wide on 375px) -->
                    <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Find the perfect professional for your</span>
                        <span class="block text-indigo-600 xl:inline"> home projects</span>
                    </h1>

                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Connect with top-rated, verified craftsmen in your area. From plumbing to carpentry,
                        get your home improvement done right with Crafts.
                    </p>

                    <!-- [FIX] buttons: full-width stacked on mobile, side-by-side on sm+ -->
                    <div class="mt-5 sm:mt-8 flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-3">
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <a href="<?= APP_URL ?>/register"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-150">
                                Get Started
                            </a>
                            <a href="<?= APP_URL ?>/search"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 transition duration-150">
                                Browse Craftsmen
                            </a>

                        <?php elseif ($_SESSION['role'] === 'homeowner'): ?>
                            <a href="<?= APP_URL ?>/search"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-150">
                                Find a Craftsman
                            </a>
                            <a href="<?= APP_URL ?>/homeowner/dashboard"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 transition duration-150">
                                My Dashboard
                            </a>

                        <?php elseif ($_SESSION['role'] === 'craftsman'): ?>
                            <a href="<?= APP_URL ?>/jobs"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-150">
                                Browse Jobs
                            </a>
                            <a href="<?= APP_URL ?>/craftsman/dashboard"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 transition duration-150">
                                My Dashboard
                            </a>

                        <?php elseif ($_SESSION['role'] === 'admin'): ?>
                            <a href="<?= APP_URL ?>/admin/dashboard"
                               class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-150">
                                Admin Dashboard
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- ── Hero Image / Slideshow ───────────────────────────── -->
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <!-- Hero Image Slideshow -->
        <div id="hero-slideshow" class="h-56 w-full sm:h-72 md:h-96 lg:w-full lg:h-full relative overflow-hidden">
            <?php foreach ($slideshowUrls as $i => $photo): ?>
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out <?= $i === 0 ? 'opacity-100' : 'opacity-0' ?>">
                <img class="h-full w-full object-cover"
                     src="<?= $photo['url'] ?>"
                     alt="<?= htmlspecialchars($photo['alt']) ?>"
                     <?= $i === 0 ? 'loading="eager"' : 'loading="lazy"' ?>>
            </div>
            <?php endforeach; ?>

            <!-- Slideshow controls overlay -->
            <div class="absolute bottom-3 left-0 right-0 flex items-center justify-center gap-2 px-4">
                <!-- Left arrow -->
                <button onclick="moveSlide(-1)"
                        class="bg-black bg-opacity-30 hover:bg-opacity-50 text-white rounded-full w-8 h-8 flex items-center justify-center transition-all duration-200 focus:outline-none flex-shrink-0"
                        aria-label="Previous photo">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Dot indicators -->
                <?php foreach ($slideshowUrls as $i => $photo): ?>
                <button onclick="goToSlide(<?= $i ?>)"
                        class="hero-dot rounded-full transition-all duration-300 w-2 h-2 <?= $i === 0 ? 'bg-white scale-125' : 'bg-white bg-opacity-50' ?>"
                        aria-label="Go to photo <?= $i + 1 ?>">
                </button>
                <?php endforeach; ?>

                <!-- Right arrow -->
                <button onclick="moveSlide(1)"
                        class="bg-black bg-opacity-30 hover:bg-opacity-50 text-white rounded-full w-8 h-8 flex items-center justify-center transition-all duration-200 focus:outline-none flex-shrink-0"
                        aria-label="Next photo">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- END HERO IMAGE SLIDESHOW BLOCK -->
</div>


<!-- ═══════════════════════════════════════════════════════════════════
     STATS BAR + SERVICE CATEGORIES GRID
     FIX: Stats bar — removed divide-y / divide-x which broke the mobile
          2-column layout. Each stat now has its own bottom border on mobile,
          and dividers are shown only on md+ as before.
     FIX: Categories grid — 3 columns on mobile (was 2), smaller padding on
          mobile cards so labels don't wrap awkwardly.
═══════════════════════════════════════════════════════════════════ -->
<div class="pt-10 pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- STATS BAR -->
        <!-- [FIX] Replaced divide-y md:divide-x with explicit borders per cell.
             On mobile (2-col), each row of 2 stats is separated by a bottom border.
             On md+ the original horizontal divider look is restored. -->
        <div class="mb-16 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-0">

                <!-- Stat 1: Craftsmen -->
                <div class="flex items-center justify-center gap-4 py-5 px-4 border-b border-r border-gray-100 md:border-b-0 md:border-r md:last:border-r-0">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl hidden sm:block flex-shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                            <?= ($stats['craftsmen'] ?? 0) > 0 ? number_format($stats['craftsmen']) . '+' : '—' ?>
                        </p>
                        <p class="mt-1 text-xs sm:text-sm font-medium text-gray-500">Craftsmen</p>
                    </div>
                </div>

                <!-- Stat 2: Wilayas -->
                <div class="flex items-center justify-center gap-4 py-5 px-4 border-b border-gray-100 md:border-b-0 md:border-r">
                    <div class="p-3 bg-green-50 text-green-600 rounded-xl hidden sm:block flex-shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                            <?= ($stats['wilayas'] ?? 0) > 0 ? $stats['wilayas'] : '—' ?>
                        </p>
                        <p class="mt-1 text-xs sm:text-sm font-medium text-gray-500">Wilayas</p>
                    </div>
                </div>

                <!-- Stat 3: Completed Bookings -->
                <div class="flex items-center justify-center gap-4 py-5 px-4 border-r border-gray-100 md:border-r">
                    <div class="p-3 bg-yellow-50 text-yellow-600 rounded-xl hidden sm:block flex-shrink-0">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                            <?= ($stats['completed_bookings'] ?? 0) > 0 ? number_format($stats['completed_bookings']) . '+' : '—' ?>
                        </p>
                        <p class="mt-1 text-xs sm:text-sm font-medium text-gray-500">Jobs Done</p>
                    </div>
                </div>

                <!-- Stat 4: Avg Rating -->
                <div class="flex items-center justify-center gap-4 py-5 px-4">
                    <div class="p-3 bg-orange-50 text-orange-500 rounded-xl hidden sm:block flex-shrink-0">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                            <?= ($stats['avg_rating'] ?? 0) > 0 ? number_format($stats['avg_rating'], 1) . '★' : '—' ?>
                        </p>
                        <p class="mt-1 text-xs sm:text-sm font-medium text-gray-500">Average Rating</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- END STATS BAR -->

        <!-- Categories heading -->
        <div class="lg:text-center mb-10">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Browse by Trade</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                What do you need done?
            </p>
        </div>

        <!-- [FIX] Categories grid: 3 columns on mobile (was 2), reduced card padding on mobile -->
        <div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-4">
            <?php
            $serviceCategories = [
                ['label' => 'Plumbing',         'value' => 'Plumbing',         'bg' => 'bg-blue-50 hover:bg-blue-100 border-blue-100',     'icon' => 'bg-blue-100 text-blue-600',   'svg' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4'],
                ['label' => 'Electrical',        'value' => 'Electrical',        'bg' => 'bg-yellow-50 hover:bg-yellow-100 border-yellow-100', 'icon' => 'bg-yellow-100 text-yellow-600','svg' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                ['label' => 'Carpentry',         'value' => 'Carpentry',         'bg' => 'bg-orange-50 hover:bg-orange-100 border-orange-100', 'icon' => 'bg-orange-100 text-orange-600','svg' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
                ['label' => 'Painting',          'value' => 'Painting',          'bg' => 'bg-pink-50 hover:bg-pink-100 border-pink-100',       'icon' => 'bg-pink-100 text-pink-600',   'svg' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
                ['label' => 'Roofing',           'value' => 'Roofing',           'bg' => 'bg-stone-50 hover:bg-stone-100 border-stone-100',     'icon' => 'bg-stone-100 text-stone-600', 'svg' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['label' => 'HVAC',              'value' => 'HVAC',              'bg' => 'bg-cyan-50 hover:bg-cyan-100 border-cyan-100',         'icon' => 'bg-cyan-100 text-cyan-600',   'svg' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['label' => 'Landscaping',       'value' => 'Landscaping',       'bg' => 'bg-green-50 hover:bg-green-100 border-green-100',     'icon' => 'bg-green-100 text-green-600', 'svg' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'],
                ['label' => 'Tiling',            'value' => 'Tiling',            'bg' => 'bg-purple-50 hover:bg-purple-100 border-purple-100',   'icon' => 'bg-purple-100 text-purple-600','svg' => 'M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z'],
                ['label' => 'Handyman',          'value' => 'General Handyman',  'bg' => 'bg-indigo-50 hover:bg-indigo-100 border-indigo-100',   'icon' => 'bg-indigo-100 text-indigo-600','svg' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
            ];
            foreach ($serviceCategories as $cat): ?>
            <a href="<?= APP_URL ?>/search?category=<?= urlencode($cat['value']) ?>"
               class="flex flex-col items-center p-3 sm:p-5 rounded-xl border transition-all duration-200 cursor-pointer group <?= $cat['bg'] ?>">
                <div class="flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 rounded-full mb-2 sm:mb-3 <?= $cat['icon'] ?>">
                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="<?= $cat['svg'] ?>"/>
                    </svg>
                </div>
                <span class="text-xs sm:text-sm font-semibold text-gray-800 text-center group-hover:text-gray-900 leading-tight">
                    <?= $cat['label'] ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<!-- END SERVICE CATEGORIES GRID -->


<!-- ═══════════════════════════════════════════════════════════════════
     HOW IT WORKS SECTION
     FIX: The horizontal connector line between the 3 steps was
          `hidden md:block` in the original — it is kept that way here
          so it correctly hides when cards stack on mobile.
     FIX: Step cards use text-sm on mobile (was no size specified, so
          inherited base which was fine, but py-4 added for breathing room).
═══════════════════════════════════════════════════════════════════ -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">How It Works</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Get started in three simple steps
            </p>
            <p class="mt-3 text-gray-500 text-base max-w-xl mx-auto">
                Whether you need work done or are looking for new opportunities, we've made the process simple.
            </p>
        </div>

        <!-- Tab Toggle: For Homeowners / For Craftsmen -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex bg-gray-100 rounded-xl p-1 gap-1">
                <button id="tab-homeowner-btn"
                        onclick="switchHowTab('homeowner')"
                        class="px-5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 bg-white text-gray-900 shadow">
                    For Homeowners
                </button>
                <button id="tab-craftsman-btn"
                        onclick="switchHowTab('craftsman')"
                        class="px-5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 text-gray-500">
                    For Craftsmen
                </button>
            </div>
        </div>

        <!-- Homeowner Tab Content -->
        <div id="hiw-homeowner" class="hiw-content">
            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Connector line — hidden on mobile, shown md+ -->
                <div class="hidden md:block absolute top-8 h-0.5 bg-indigo-100 z-0" style="left:16.67%; right:16.67%;"></div>

                <!-- Step 1 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">01</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Find a Craftsman</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Browse verified professionals by category, read reviews, view portfolios, and compare rates to find the right match.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">02</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Book & Confirm</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Send a booking request with your project details. The craftsman confirms and you agree on price, date, and scope.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">03</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Get It Done</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Hire your craftsman, track the work, and pay securely once you're fully satisfied with the result.</p>
                </div>
            </div>
        </div>

        <!-- Craftsman Tab Content -->
        <div id="hiw-craftsman" class="hiw-content hidden">
            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Connector line — hidden on mobile -->
                <div class="hidden md:block absolute top-8 h-0.5 bg-indigo-100 z-0" style="left:16.67%; right:16.67%;"></div>

                <!-- Step 1 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">01</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Build Your Profile</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Showcase your skills, upload portfolio photos, set your hourly rate, and get verified to stand out.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">02</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Receive Leads</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Get booking requests and job leads directly from homeowners who need your exact skills. No cold outreach.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center px-4 relative z-10">
                    <div class="relative mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-600 text-white text-sm font-bold mb-5 shadow-lg">
                        <span class="absolute -top-1 -right-1 bg-white text-indigo-600 text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center border border-indigo-100 shadow-sm">03</span>
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Build Your Reputation</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Complete jobs, collect 5-star reviews, and grow your client base — every review makes your profile stronger.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END HOW IT WORKS -->


<!-- ═══════════════════════════════════════════════════════════════════
     FEATURES SECTION
     No mobile issues here — the dl grid already collapses to 1 col on mobile.
═══════════════════════════════════════════════════════════════════ -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Why Crafts?</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                A better way to hire professionals
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                We take the hassle out of finding reliable help for your home improvements.
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                <!-- Feature 1 -->
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Verified Professionals</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Every craftsman on our platform goes through a verification process so you can hire with confidence.
                    </dd>
                </div>

                <!-- Feature 2 -->
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transparent Pricing</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        See hourly rates upfront, request quotes before committing, and only pay when you're satisfied.
                    </dd>
                </div>

                <!-- Feature 3 -->
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Direct Communication</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Chat directly with professionals, share photos, and discuss project details all within our secure platform.
                    </dd>
                </div>

                <!-- Feature 4 -->
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transparent Reviews</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Read real, verified reviews from other homeowners to ensure you hire the best person for the job.
                    </dd>
                </div>

            </dl>
        </div>
    </div>
</div>


<!-- ═══════════════════════════════════════════════════════════════════
     CTA SECTION
     FIX: Tab toggle buttons were too wide on small phones.
          Added flex-col sm:flex-row fallback for very narrow screens.
          CTA action buttons are full-width on mobile.
═══════════════════════════════════════════════════════════════════ -->
<?php if (!isset($_SESSION['user_id'])): ?>
    <!-- Logged Out CTA -->
    <div class="bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gray-900 rounded-2xl py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
                <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;"></div>
                <div class="max-w-3xl mx-auto text-center relative z-10">

                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Ready to get started?</h2>
                    <p class="mt-3 text-gray-400 text-base">Join the platform connecting skilled craftsmen with homeowners across Algeria.</p>

                    <!-- Tab toggle — stacks on tiny screens, side by side on sm+ -->
                    <div class="mt-8 inline-flex items-center bg-gray-800 rounded-full p-1">
                        <button id="cta-homeowner-btn"
                                onclick="switchCtaTab('homeowner')"
                                class="cta-tab flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 bg-white text-gray-900 shadow">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span>For Homeowners</span>
                        </button>
                        <button id="cta-craftsman-btn"
                                onclick="switchCtaTab('craftsman')"
                                class="cta-tab flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 text-gray-400">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>For Craftsmen</span>
                        </button>
                    </div>

                    <!-- Homeowners Panel -->
                    <div id="cta-homeowner" class="cta-content mt-10">
                        <p class="text-gray-300 text-base mb-8 max-w-xl mx-auto">
                            Post your project, receive quotes from verified craftsmen, and hire the best one — all in one place.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="<?= APP_URL ?>/register"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-gray-900 bg-white hover:bg-gray-100 transition duration-150">
                                Sign Up Free
                            </a>
                            <a href="<?= APP_URL ?>/search"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-white border border-gray-600 hover:bg-gray-800 transition duration-150">
                                Browse Craftsmen
                            </a>
                        </div>
                    </div>

                    <!-- Craftsmen Panel -->
                    <div id="cta-craftsman" class="cta-content hidden mt-10">
                        <p class="text-gray-300 text-base mb-8 max-w-xl mx-auto">
                            Create your profile, showcase your work, and get booking requests from homeowners who need your exact skills — for free.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="<?= APP_URL ?>/register"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-indigo-900 bg-indigo-300 hover:bg-indigo-200 transition duration-150">
                                Join as a Craftsman
                            </a>
                            <a href="<?= APP_URL ?>/jobs"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-white border border-indigo-600 hover:bg-indigo-900 transition duration-150">
                                Browse Job Board
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    function switchCtaTab(tab) {
        document.querySelectorAll('.cta-content').forEach(function(el) { el.classList.add('hidden'); });
        document.getElementById('cta-' + tab).classList.remove('hidden');
        ['homeowner', 'craftsman'].forEach(function(t) {
            var btn = document.getElementById('cta-' + t + '-btn');
            btn.classList.remove('bg-white', 'text-gray-900', 'shadow');
            btn.classList.add('text-gray-400');
        });
        var activeBtn = document.getElementById('cta-' + tab + '-btn');
        activeBtn.classList.add('bg-white', 'text-gray-900', 'shadow');
        activeBtn.classList.remove('text-gray-400');
    }
    </script>

<?php else: ?>
    <!-- Logged In CTA (Role-based) -->
    <div class="bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gray-900 rounded-2xl py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
                <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;"></div>
                <div class="relative z-10 max-w-3xl mx-auto text-center">

                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Welcome back, <?= htmlspecialchars($_SESSION['first_name'] ?? $_SESSION['name'] ?? 'User') ?>!
                    </h2>

                    <?php if ($_SESSION['role'] === 'homeowner'): ?>
                        <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">
                            Ready to tackle your next home project? Find the right professional or check your ongoing jobs.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="<?= APP_URL ?>/search"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-gray-900 bg-white hover:bg-gray-100 transition duration-150">
                                Find a Craftsman
                            </a>
                            <a href="<?= APP_URL ?>/homeowner/dashboard"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-white border border-gray-600 hover:bg-gray-800 transition duration-150">
                                My Dashboard
                            </a>
                        </div>

                    <?php elseif ($_SESSION['role'] === 'craftsman'): ?>
                        <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">
                            Check your latest booking requests, browse the job board, and keep growing your reputation.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="<?= APP_URL ?>/jobs"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-gray-900 bg-white hover:bg-gray-100 transition duration-150">
                                Browse Jobs
                            </a>
                            <a href="<?= APP_URL ?>/craftsman/dashboard"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-white border border-gray-600 hover:bg-gray-800 transition duration-150">
                                My Dashboard
                            </a>
                        </div>

                    <?php elseif ($_SESSION['role'] === 'admin'): ?>
                        <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">
                            Manage the platform, verify craftsmen, and keep everything running smoothly.
                        </p>
                        <div class="mt-8 flex justify-center">
                            <a href="<?= APP_URL ?>/admin/dashboard"
                               class="inline-flex items-center justify-center px-7 py-3 text-base font-semibold rounded-lg text-gray-900 bg-white hover:bg-gray-100 transition duration-150">
                                Go to Admin Dashboard
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- END CTA SECTION -->


<!-- How It Works tab switcher script -->
<script>
function switchHowTab(tab) {
    document.querySelectorAll('.hiw-content').forEach(function(el) { el.classList.add('hidden'); });
    document.getElementById('hiw-' + tab).classList.remove('hidden');
    ['homeowner', 'craftsman'].forEach(function(t) {
        var btn = document.getElementById('tab-' + t + '-btn');
        btn.classList.remove('bg-white', 'text-gray-900', 'shadow');
        btn.classList.add('text-gray-500');
    });
    var activeBtn = document.getElementById('tab-' + tab + '-btn');
    activeBtn.classList.add('bg-white', 'text-gray-900', 'shadow');
    activeBtn.classList.remove('text-gray-500');
}
</script>

<!-- =============================================================================
     SLIDESHOW SCRIPT
     Delete this entire <script> block if you switch back to static mode.
============================================================================= -->
<script>
(function() {
    const slides  = document.querySelectorAll('.hero-slide');
    const dots    = document.querySelectorAll('.hero-dot');
    let current   = 0;
    let timer     = null;
    const DELAY   = 4000;

    function goTo(n) {
        slides[current].classList.remove('opacity-100');
        slides[current].classList.add('opacity-0');
        dots[current].classList.remove('scale-125');
        dots[current].classList.add('bg-opacity-50');

        current = (n + slides.length) % slides.length;

        slides[current].classList.remove('opacity-0');
        slides[current].classList.add('opacity-100');
        dots[current].classList.add('scale-125');
        dots[current].classList.remove('bg-opacity-50');
    }

    function startTimer() { timer = setInterval(function() { goTo(current + 1); }, DELAY); }
    function stopTimer()  { clearInterval(timer); }

    // Expose to onclick handlers
    window.moveSlide  = function(dir) { stopTimer(); goTo(current + dir); startTimer(); };
    window.goToSlide  = function(n)   { stopTimer(); goTo(n);             startTimer(); };

    // Pause on hover
    var slideshow = document.getElementById('hero-slideshow');
    if (slideshow) {
        slideshow.addEventListener('mouseenter', stopTimer);
        slideshow.addEventListener('mouseleave', startTimer);
    }

    startTimer();
})();
</script>