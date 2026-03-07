<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\CraftsmanProfile;
use App\Auth\Middleware;

class ProfileController extends Controller
{
    /**
     * Show a detailed profile of a single user (Homeowner or Craftsman).
     */
    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "User not found.";
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById($id);

        if (!$user) {
            echo "User not found.";
            exit;
        }

        $craftsmanDetails = null;

        if ($user['role'] === 'craftsman') {
            $craftsmanModel = new CraftsmanProfile();
            $craftsmanDetails = $craftsmanModel->findByUserId($id);

            // If they haven't created a specific profile record yet
            if (!$craftsmanDetails) {
                $craftsmanDetails = [
                    'service_category' => 'General Handyman',
                    'hourly_rate' => 0.00,
                    'bio' => '',
                    'portfolio_images' => '[]',
                    'is_verified' => false,
                    'created_at' => $user['created_at']
                ];
            }
        }

        $this->view('layouts/app', [
            'pageTitle' => $user['first_name'] . ' ' . $user['last_name'] . ' - Profile',
            'contentView' => 'profile/show',
            'user' => $user,
            'craftsmanDetails' => $craftsmanDetails
        ]);
    }

    /**
     * Show the edit profile form
     */
    public function edit()
    {
        Middleware::requireLogin();
        $id = $_SESSION['user_id'];

        $userModel = new User();
        $user = $userModel->findById($id);

        $craftsmanDetails = null;
        if ($user['role'] === 'craftsman') {
            $craftsmanModel = new CraftsmanProfile();
            $craftsmanDetails = $craftsmanModel->findByUserId($id);
        }

        $this->view('layouts/app', [
            'pageTitle' => 'Edit Profile - CraftConnect',
            'contentView' => 'profile/edit',
            'user' => $user,
            'craftsmanDetails' => $craftsmanDetails
        ]);
    }

    /**
     * Process profile updates
     */
    public function update()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();
        $id = $_SESSION['user_id'];

        $firstName = trim($_POST['first_name'] ?? '');
        $lastName = trim($_POST['last_name'] ?? '');
        $phone = trim($_POST['phone_number'] ?? '');

        // Handle basic User table updates
        $userModel = new User();
        $user = $userModel->findById($id);

        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number WHERE id = :id";
        $userModel->executeQuery($sql, [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phone,
            'id' => $id
        ]);

        // Handle Profile Picture Removal
        if (isset($_POST['remove_picture']) && $_POST['remove_picture'] == '1') {
            $userModel->executeQuery("UPDATE users SET profile_picture = 'default.png' WHERE id = :id", [
                'id' => $id
            ]);
            // If we successfully remove from DB, also delete the old file if it exists and isn't default
            if (!empty($user['profile_picture']) && $user['profile_picture'] !== 'default.png') {
                $oldFile = BASE_PATH . '/public/uploads/profile/' . $user['profile_picture'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
        }
        // Handle Profile Picture Upload
        elseif (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['profile_picture']['tmp_name'];
            $name = basename($_FILES['profile_picture']['name']);
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $newName = time() . '_' . uniqid() . '.' . $ext;
                $uploadDir = BASE_PATH . '/public/uploads/profile/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
                    $userModel->executeQuery("UPDATE users SET profile_picture = :pic WHERE id = :id", [
                        'pic' => $newName,
                        'id' => $id
                    ]);
                }
            }
        }

        // Handle Craftsman specific updates
        if ($user['role'] === 'craftsman') {
            $craftsmanModel = new CraftsmanProfile();

            $data = [
                'service_category' => $_POST['service_category'] ?? 'General Handyman',
                'hourly_rate' => $_POST['hourly_rate'] ?? 0,
                'bio' => $_POST['bio'] ?? ''
            ];

            // Retain old images for now until we build a full multi-file manager
            $existing = $craftsmanModel->findByUserId($id);
            if ($existing && !empty($existing['portfolio_images'])) {
                $data['portfolio_images'] = json_decode($existing['portfolio_images'], true);
            }
            else {
                $data['portfolio_images'] = [];
            }

            $craftsmanModel->updateOrCreate($id, $data);
        }

        header('Location: ' . APP_URL . '/profile?id=' . $id);
        exit;
    }
}
