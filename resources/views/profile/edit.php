<!-- Edit Profile View -->
<div class="bg-gray-50 min-h-screen pb-12">
    <!-- Cover Banner -->
    <div class="h-48 bg-indigo-600 w-full relative object-cover bg-gradient-to-r from-indigo-700 to-indigo-500 shadow-inner">
        <!-- Abstract CSS Background pattern -->
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
    </div>
    <!-- Main Content Container -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
        <div class="mb-4">
            <a href="<?= APP_URL ?>/profile?id=<?= $user['id'] ?>" class="text-sm font-medium text-white hover:text-indigo-100 transition-colors duration-200 drop-shadow-md">&larr; Back to Profile</a>
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-900">Edit Your Profile</h1>
                    <p class="text-gray-500 mt-2">Update your personal information and public profile details.</p>
                </div>
                <form action="<?= APP_URL ?>/profile/edit" method="POST" enctype="multipart/form-data" class="space-y-8">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                    <!-- Profile Picture Section -->
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2">Profile Picture</h3>
                        <div class="flex items-center space-x-6">
                            <div class="relative w-24 h-24 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-sm ring-1 ring-gray-200">
                                <img id="profile-preview" src="<?= get_profile_picture_url($user['profile_picture'] ?? 'default.png', $user['first_name'], $user['last_name']) ?>" alt="Current profile picture" class="object-cover w-full h-full">
                            </div>
                            <div>
                                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Change Photo</label>
                                <div class="mt-1 flex items-center space-x-3">
                                    <input type="file" name="profile_picture" id="profile-upload" class="sr-only" accept="image/png, image/jpeg, image/gif, image/webp" onchange="previewImage(event)">
                                    <button type="button" onclick="document.getElementById('profile-upload').click()" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                        Choose File
                                    </button>
                                    <span id="file-name" class="text-sm text-gray-500">No file chosen</span>
                                    
                                    <?php if(!empty($user['profile_picture']) && $user['profile_picture'] !== 'default.png'): ?>
                                    <!-- Hidden checkbox to track if we should delete the image -->
                                    <input type="checkbox" name="remove_picture" id="remove_picture" value="1" class="hidden">
                                    <button type="button" id="remove-btn" onclick="removePhoto()" class="text-sm text-red-600 hover:text-red-800 font-medium transition duration-150">
                                        Remove Photo
                                    </button>
                                    <?php endif; ?>
                                </div>
                                <p class="mt-2 text-xs text-gray-400">JPG, PNG, GIF or WebP up to 5MB</p>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Info Section -->
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2">Personal Information</h3>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <div class="mt-1">
                                    <input type="text" name="first_name" id="first_name" required value="<?= htmlspecialchars($user['first_name']) ?>" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border">
                                </div>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <div class="mt-1">
                                    <input type="text" name="last_name" id="last_name" required value="<?= htmlspecialchars($user['last_name']) ?>" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border">
                                </div>
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <div class="mt-1">
                                    <input type="tel" name="phone_number" id="phone_number" value="<?= htmlspecialchars($user['phone_number'] ?? '') ?>" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border" placeholder="0555 123 456">
                                </div>
                            </div>
                            <div>
                                <label for="wilaya" class="block text-sm font-medium text-gray-700">Location (Wilaya)</label>
                                <div class="mt-1">
                                    <select id="wilaya" name="wilaya" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border bg-white">
                                        <option value="">Select your Wilaya</option>
                                        <?php 
                                            $wilayas = [
                                                "01 - Adrar", "02 - Chlef", "03 - Laghouat", "04 - Oum El Bouaghi", "05 - Batna", "06 - Béjaïa", "07 - Biskra", "08 - Béchar", "09 - Blida", "10 - Bouira",
                                                "11 - Tamanrasset", "12 - Tébessa", "13 - Tlemcen", "14 - Tiaret", "15 - Tizi Ouzou", "16 - Alger", "17 - Djelfa", "18 - Jijel", "19 - Sétif", "20 - Saïda",
                                                "21 - Skikda", "22 - Sidi Bel Abbès", "23 - Annaba", "24 - Guelma", "25 - Constantine", "26 - Médéa", "27 - Mostaganem", "28 - M'Sila", "29 - Mascara", "30 - Ouargla",
                                                "31 - Oran", "32 - El Bayadh", "33 - Illizi", "34 - Bordj Bou Arréridj", "35 - Boumerdès", "36 - El Tarf", "37 - Tindouf", "38 - Tissemsilt", "39 - El Oued", "40 - Khenchela",
                                                "41 - Souk Ahras", "42 - Tipaza", "43 - Mila", "44 - Aïn Defla", "45 - Naâma", "46 - Aïn Témouchent", "47 - Ghardaïa", "48 - Relizane", "49 - Timimoun", "50 - Bordj Badji Mokhtar",
                                                "51 - Ouled Djellal", "52 - Béni Abbès", "53 - In Salah", "54 - In Guezzam", "55 - Touggourt", "56 - Djanet", "57 - El M'Ghair", "58 - El Meniaa"
                                            ];
                                            $selectedWilaya = $user['wilaya'] ?? '';
                                            foreach($wilayas as $w):
                                        ?>
                                            <option value="<?= $w ?>" <?= $w === $selectedWilaya ? 'selected' : '' ?>><?= $w ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Craftsman Specific Section -->
                    <?php if ($user['role'] === 'craftsman'): ?>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2">Professional Details</h3>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="service_category" class="block text-sm font-medium text-gray-700">Primary Service Category</label>
                                <div class="mt-1">
                                    <select id="service_category" name="service_category" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border bg-white">
                                        <?php 
                                            // The currently selected category
                                            $selectedCat = $craftsmanDetails['service_category'] ?? 'General Handyman';
                                            $categories = ["Plumbing", "Electrical", "Carpentry", "Painting", "Roofing", "HVAC", "Landscaping", "Tiling", "General Handyman"];
                                            foreach($categories as $cat):
                                        ?>
                                            <option value="<?= $cat ?>" <?= $cat === $selectedCat ? 'selected' : '' ?>><?= $cat ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="hourly_rate" class="block text-sm font-medium text-gray-700">Hourly Rate ($)</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm"> $ </span>
                                    </div>
                                    <input type="number" name="hourly_rate" id="hourly_rate" min="0" step="0.01" value="<?= htmlspecialchars($craftsmanDetails['hourly_rate'] ?? '0.00') ?>" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2 border">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency"> USD </span>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="bio" class="block text-sm font-medium text-gray-700">
                                    Professional Bio
                                    <span class="text-gray-400 font-normal ml-1">(Tell homeowners about your experience and why they should hire you)</span>
                                </label>
                                <div class="mt-1">
                                    <textarea id="bio" name="bio" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md px-4 py-2 border"><?= htmlspecialchars($craftsmanDetails['bio'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Section -->
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2 flex items-center">
                            <svg class="mr-2 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Portfolio Images
                        </h3>

                        <?php 
                            $existingImages = [];
                            if (!empty($craftsmanDetails['portfolio_images'])) {
                                $existingImages = json_decode($craftsmanDetails['portfolio_images'], true) ?: [];
                            }
                        ?>

                        <!-- Existing Images Grid -->
                        <?php if (!empty($existingImages)): ?>
                        <div class="mb-6">
                            <p class="text-sm text-gray-500 mb-3">Your current portfolio (<span id="portfolio-count"><?= count($existingImages) ?></span> images). Click the × to remove.</p>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4" id="existing-portfolio">
                                <?php foreach ($existingImages as $index => $img): ?>
                                <div class="relative group rounded-xl overflow-hidden border border-gray-200 shadow-sm aspect-square" id="portfolio-item-<?= $index ?>">
                                    <img src="<?= APP_URL ?>/uploads/portfolio/<?= htmlspecialchars($img) ?>" 
                                         alt="Portfolio piece" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-200"></div>
                                    <button type="button" 
                                            onclick="removePortfolioImage(<?= $index ?>, '<?= htmlspecialchars($img) ?>')" 
                                            class="absolute top-2 right-2 bg-red-500 text-white rounded-full h-7 w-7 flex items-center justify-center text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-red-600 shadow-lg">
                                        ×
                                    </button>
                                    <input type="hidden" name="existing_images[]" value="<?= htmlspecialchars($img) ?>" id="input-portfolio-<?= $index ?>">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Upload New Images -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Add New Images</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-400 transition-colors duration-200 cursor-pointer relative" 
                                 id="portfolio-dropzone"
                                 onclick="document.getElementById('portfolio-upload').click()">
                                <input type="file" name="portfolio_images[]" id="portfolio-upload" multiple 
                                       accept="image/png,image/jpeg,image/gif,image/webp" 
                                       class="sr-only" 
                                       onchange="previewPortfolioImages(event)">
                                <svg class="mx-auto h-12 w-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 font-medium">Click to upload images</p>
                                <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF or WebP · Max 5MB each · Up to 10 images total</p>
                            </div>
                            <!-- New Image Previews -->
                            <div id="portfolio-new-previews" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 hidden"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end gap-3">
                            <a href="<?= APP_URL ?>/profile?id=<?= $user['id'] ?>" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Simple script to preview the profile picture upload
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profile-preview');
            output.src = reader.result;
        }
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
            document.getElementById('file-name').textContent = event.target.files[0].name;
            document.getElementById('file-name').classList.remove('text-gray-500');
            document.getElementById('file-name').classList.add('text-indigo-600', 'font-medium');
            
            // Uncheck the remove box if they uploaded something new
            var removeBox = document.getElementById('remove_picture');
            if(removeBox) removeBox.checked = false;
        }
    }

    function removePhoto() {
        document.getElementById('remove_picture').checked = true;
        document.getElementById('profile-upload').value = '';
        document.getElementById('file-name').textContent = 'No file chosen';
        document.getElementById('file-name').classList.add('text-gray-500');
        document.getElementById('file-name').classList.remove('text-indigo-600', 'font-medium');
        
        // Hide the current image visually to show it's "removed"
        document.getElementById('profile-preview').style.opacity = '0.3';
        document.getElementById('remove-btn').style.display = 'none';
    }

    // Portfolio Management
    function removePortfolioImage(index, filename) {
        var item = document.getElementById('portfolio-item-' + index);
        var input = document.getElementById('input-portfolio-' + index);
        if (item) {
            item.style.opacity = '0';
            item.style.transform = 'scale(0.8)';
            item.style.transition = 'all 0.3s ease';
            setTimeout(function() { 
                item.remove(); 
                updatePortfolioCount();
            }, 300);
        }
        if (input) input.remove();
    }

    function updatePortfolioCount() {
        var countEl = document.getElementById('portfolio-count');
        if (countEl) {
            var remaining = document.querySelectorAll('#existing-portfolio [id^="portfolio-item-"]').length;
            countEl.textContent = remaining;
        }
    }

    function previewPortfolioImages(event) {
        var container = document.getElementById('portfolio-new-previews');
        container.innerHTML = '';
        var files = event.target.files;
        if (files.length === 0) {
            container.classList.add('hidden');
            return;
        }
        container.classList.remove('hidden');
        for (var i = 0; i < files.length; i++) {
            (function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var div = document.createElement('div');
                    div.className = 'relative rounded-xl overflow-hidden border-2 border-indigo-200 shadow-sm aspect-square';
                    div.innerHTML = '<img src="' + e.target.result + '" alt="Preview" class="w-full h-full object-cover">' +
                        '<div class="absolute bottom-0 inset-x-0 bg-indigo-600 bg-opacity-80 px-2 py-1 text-center">' +
                        '<span class="text-xs text-white font-medium">New</span></div>';
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            })(files[i]);
        }

        // Update dropzone text
        var dropzone = document.getElementById('portfolio-dropzone');
        var pEl = dropzone.querySelector('p');
        if (pEl) pEl.textContent = files.length + ' image' + (files.length > 1 ? 's' : '') + ' selected';
    }
</script>   