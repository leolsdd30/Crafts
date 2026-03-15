<!-- Post a Job -->
<?php
// Only homeowners should post jobs — redirect others away
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'homeowner') {
    header("Location: " . APP_URL . "/jobs");
    exit;
}

$wilayas = [
    "01 - Adrar","02 - Chlef","03 - Laghouat","04 - Oum El Bouaghi","05 - Batna",
    "06 - Béjaïa","07 - Biskra","08 - Béchar","09 - Blida","10 - Bouira",
    "11 - Tamanrasset","12 - Tébessa","13 - Tlemcen","14 - Tiaret","15 - Tizi Ouzou",
    "16 - Alger","17 - Djelfa","18 - Jijel","19 - Sétif","20 - Saïda",
    "21 - Skikda","22 - Sidi Bel Abbès","23 - Annaba","24 - Guelma","25 - Constantine",
    "26 - Médéa","27 - Mostaganem","28 - M'Sila","29 - Mascara","30 - Ouargla",
    "31 - Oran","32 - El Bayadh","33 - Illizi","34 - Bordj Bou Arréridj","35 - Boumerdès",
    "36 - El Tarf","37 - Tindouf","38 - Tissemsilt","39 - El Oued","40 - Khenchela",
    "41 - Souk Ahras","42 - Tipaza","43 - Mila","44 - Aïn Defla","45 - Naâma",
    "46 - Aïn Témouchent","47 - Ghardaïa","48 - Relizane","49 - Timimoun","50 - Bordj Badji Mokhtar",
    "51 - Ouled Djellal","52 - Béni Abbès","53 - In Salah","54 - In Guezzam","55 - Touggourt",
    "56 - Djanet","57 - El M'Ghair","58 - El Meniaa"
];

$categories = [
    'Plumbing'         => ['icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'color' => 'text-blue-600 bg-blue-50 border-blue-200'],
    'Electrical'       => ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'text-yellow-600 bg-yellow-50 border-yellow-200'],
    'Carpentry'        => ['icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 'color' => 'text-orange-600 bg-orange-50 border-orange-200'],
    'Painting'         => ['icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01', 'color' => 'text-pink-600 bg-pink-50 border-pink-200'],
    'Roofing'          => ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'color' => 'text-red-600 bg-red-50 border-red-200'],
    'HVAC'             => ['icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'text-cyan-600 bg-cyan-50 border-cyan-200'],
    'Landscaping'      => ['icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'color' => 'text-green-600 bg-green-50 border-green-200'],
    'Tiling'           => ['icon' => 'M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm6 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 11a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm6 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z', 'color' => 'text-purple-600 bg-purple-50 border-purple-200'],
    'General Handyman' => ['icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'text-gray-600 bg-gray-50 border-gray-200'],
    'Other'            => ['icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'text-indigo-600 bg-indigo-50 border-indigo-200'],
];
?>

<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <a href="<?= APP_URL ?>/jobs" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Job Board
            </a>
            <div class="mt-4 flex items-center gap-4">
                <div class="h-12 w-12 bg-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">Post a New Job</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Describe what you need and craftsmen will send you their best quotes.</p>
                </div>
            </div>
        </div>

        <!-- Error -->
        <?php if (!empty($error)): ?>
        <div class="rounded-xl bg-red-50 border border-red-200 p-4 mb-6 flex items-start gap-3">
            <svg class="h-5 w-5 text-red-500 flex-shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm font-medium text-red-800"><?= htmlspecialchars($error) ?></p>
        </div>
        <?php endif; ?>

        <form action="<?= APP_URL ?>/jobs/create" method="POST">
            <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token'] ?? '') ?>">

            <!-- Section 1: Job Basics -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-6">
                <h2 class="text-base font-bold text-gray-900 mb-5 flex items-center gap-2">
                    <span class="h-6 w-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold">1</span>
                    Job Details
                </h2>
                <div class="space-y-5">

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">
                            Job Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" required
                               maxlength="120"
                               placeholder="e.g. Fix leaking kitchen faucet"
                               value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                               class="w-full border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2.5">
                        <p class="mt-1 text-xs text-gray-400">Be specific — a clear title gets more relevant quotes.</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="5" required
                                  maxlength="2000"
                                  placeholder="Describe the work you need done in detail — materials needed, size of the area, urgency, any specific requirements..."
                                  class="w-full border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2.5"
                                  oninput="updateCounter(this, 'desc-count', 2000)"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                        <div class="flex justify-between mt-1">
                            <p class="text-xs text-gray-400">The more detail you provide, the more accurate the quotes will be.</p>
                            <p class="text-xs text-gray-400"><span id="desc-count">0</span>/2000</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Section 2: Category — visual card picker -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-6">
                <h2 class="text-base font-bold text-gray-900 mb-1 flex items-center gap-2">
                    <span class="h-6 w-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                    Service Category <span class="text-red-500 font-normal text-sm">*</span>
                </h2>
                <p class="text-xs text-gray-400 mb-5 ml-8">Pick the category that best matches your job.</p>
                <input type="hidden" name="category" id="category-input" value="<?= htmlspecialchars($_POST['category'] ?? '') ?>" required>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3" id="category-grid">
                    <?php foreach ($categories as $catName => $catData): ?>
                    <?php $isSelected = ($_POST['category'] ?? '') === $catName; ?>
                    <button type="button"
                            onclick="selectCategory('<?= htmlspecialchars($catName) ?>', this)"
                            class="category-btn flex items-center gap-3 p-3 rounded-xl border-2 text-left transition-all duration-150 <?= $isSelected ? 'border-indigo-500 bg-indigo-50' : 'border-gray-200 hover:border-indigo-300 hover:bg-gray-50' ?>">
                        <div class="h-8 w-8 rounded-lg <?= $isSelected ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-500' ?> flex items-center justify-center flex-shrink-0">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="<?= $catData['icon'] ?>"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium <?= $isSelected ? 'text-indigo-700' : 'text-gray-700' ?>"><?= $catName ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>
                <p class="text-xs text-red-500 mt-2 hidden" id="category-error">Please select a category.</p>
            </div>

            <!-- Section 3: Location & Budget -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-6">
                <h2 class="text-base font-bold text-gray-900 mb-5 flex items-center gap-2">
                    <span class="h-6 w-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold">3</span>
                    Location & Budget
                </h2>
                <div class="space-y-5">

                    <!-- Wilaya -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-1">
                            Wilaya <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <select name="address" id="address" required
                                    class="w-full pl-9 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm py-2.5 bg-white">
                                <option value="">— Select your Wilaya —</option>
                                <?php foreach ($wilayas as $w): ?>
                                <option value="<?= htmlspecialchars($w) ?>" <?= ($_POST['address'] ?? '') === $w ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($w) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Budget -->
                    <div>
                        <label for="budget" class="block text-sm font-semibold text-gray-700 mb-1">
                            Budget <span class="text-gray-400 font-normal">(optional)</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="budget" id="budget"
                                   placeholder="e.g. 5000 – 10000"
                                   value="<?= htmlspecialchars($_POST['budget'] ?? '') ?>"
                                   class="w-full border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2.5 pr-16">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <span class="text-sm font-semibold text-gray-400">DZD</span>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-400">Sharing your budget helps craftsmen tailor their quotes to your expectations.</p>
                    </div>

                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between">
                <a href="<?= APP_URL ?>/jobs" class="text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center px-8 py-3 border border-transparent text-base font-semibold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition duration-150">
                    <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Post Job
                </button>
            </div>

        </form>

    </div>
</div>

<script>
// Category picker
function selectCategory(name, btn) {
    document.getElementById('category-input').value = name;
    document.getElementById('category-error').classList.add('hidden');
    document.querySelectorAll('.category-btn').forEach(function(b) {
        b.className = b.className
            .replace('border-indigo-500 bg-indigo-50', '')
            .replace('border-gray-200', '')
            .trim();
        b.classList.add('border-gray-200');
        var icon = b.querySelector('div');
        icon.className = icon.className
            .replace('bg-indigo-100 text-indigo-600', 'bg-gray-100 text-gray-500');
        var label = b.querySelector('span');
        label.className = label.className.replace('text-indigo-700', 'text-gray-700');
    });
    btn.classList.remove('border-gray-200');
    btn.classList.add('border-indigo-500', 'bg-indigo-50');
    var icon = btn.querySelector('div');
    icon.className = icon.className.replace('bg-gray-100 text-gray-500', 'bg-indigo-100 text-indigo-600');
    var label = btn.querySelector('span');
    label.className = label.className.replace('text-gray-700', 'text-indigo-700');
}

// Character counter
function updateCounter(el, countId, max) {
    document.getElementById(countId).textContent = el.value.length;
}

// Init counter on load
document.addEventListener('DOMContentLoaded', function() {
    var desc = document.getElementById('description');
    if (desc) updateCounter(desc, 'desc-count', 2000);
});

// Validate category on submit
document.querySelector('form').addEventListener('submit', function(e) {
    if (!document.getElementById('category-input').value) {
        e.preventDefault();
        document.getElementById('category-error').classList.remove('hidden');
        document.getElementById('category-grid').scrollIntoView({behavior: 'smooth', block: 'center'});
    }
});
</script>
