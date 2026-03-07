<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Show the booking request form (from a craftsman's profile).
     */
    public function create()
    {
        Middleware::requireLogin();

        $craftsmanId = $_GET['craftsman_id'] ?? null;

        if (!$craftsmanId) {
            header("Location: " . APP_URL . "/search");
            exit;
        }

        // Cannot book yourself
        if ($craftsmanId == $_SESSION['user_id']) {
            header("Location: " . APP_URL . "/profile?id=" . $craftsmanId);
            exit;
        }

        $userModel = new User();
        $craftsman = $userModel->findById($craftsmanId);

        if (!$craftsman || $craftsman['role'] !== 'craftsman') {
            echo "Craftsman not found.";
            exit;
        }

        $this->view('layouts/app', [
            'pageTitle' => 'Request Booking - CraftConnect',
            'contentView' => 'bookings/create',
            'craftsman' => $craftsman
        ]);
    }

    /**
     * Process the booking request form submission.
     */
    public function store()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();

        $craftsmanId = $_POST['craftsman_id'] ?? null;
        $description = trim($_POST['description'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $scheduledDate = $_POST['scheduled_date'] ?? '';

        // Basic validation
        if (empty($craftsmanId) || empty($description) || empty($address) || empty($scheduledDate)) {
            $userModel = new User();
            $craftsman = $userModel->findById($craftsmanId);

            $this->view('layouts/app', [
                'pageTitle' => 'Request Booking - CraftConnect',
                'contentView' => 'bookings/create',
                'craftsman' => $craftsman,
                'error' => 'Please fill in all required fields.'
            ]);
            return;
        }

        $bookingModel = new Booking();
        $success = $bookingModel->create([
            'homeowner_id' => $_SESSION['user_id'],
            'craftsman_id' => $craftsmanId,
            'description' => $description,
            'address' => $address,
            'scheduled_date' => $scheduledDate
        ]);

        if ($success) {
            $dashboard = $_SESSION['role'] === 'craftsman' ? '/craftsman/dashboard' : '/homeowner/dashboard';
            header("Location: " . APP_URL . $dashboard . "?success=booking_requested");
            exit;
        } else {
            $userModel = new User();
            $craftsman = $userModel->findById($craftsmanId);

            $this->view('layouts/app', [
                'pageTitle' => 'Request Booking - CraftConnect',
                'contentView' => 'bookings/create',
                'craftsman' => $craftsman,
                'error' => 'Failed to submit booking request. Please try again.'
            ]);
        }
    }

    /**
     * Craftsman accepts a booking request.
     */
    public function accept()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();

        $bookingId = $_POST['booking_id'] ?? null;

        if (!$bookingId) {
            header("Location: " . APP_URL . "/craftsman/dashboard");
            exit;
        }

        $bookingModel = new Booking();
        $booking = $bookingModel->findById($bookingId);

        if (!$booking || $booking['craftsman_id'] != $_SESSION['user_id']) {
            echo "Access Denied.";
            exit;
        }

        $bookingModel->updateStatus($bookingId, 'hired');

        header("Location: " . APP_URL . "/craftsman/dashboard?success=booking_accepted");
        exit;
    }

    /**
     * Craftsman declines a booking request.
     */
    public function decline()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();

        $bookingId = $_POST['booking_id'] ?? null;

        if (!$bookingId) {
            header("Location: " . APP_URL . "/craftsman/dashboard");
            exit;
        }

        $bookingModel = new Booking();
        $booking = $bookingModel->findById($bookingId);

        if (!$booking || $booking['craftsman_id'] != $_SESSION['user_id']) {
            echo "Access Denied.";
            exit;
        }

        $bookingModel->updateStatus($bookingId, 'cancelled');

        header("Location: " . APP_URL . "/craftsman/dashboard?success=booking_declined");
        exit;
    }

    /**
     * Craftsman marks a booking as completed.
     */
    public function complete()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();

        $bookingId = $_POST['booking_id'] ?? null;

        if (!$bookingId) {
            header("Location: " . APP_URL . "/craftsman/dashboard");
            exit;
        }

        $bookingModel = new Booking();
        $booking = $bookingModel->findById($bookingId);

        if (!$booking || $booking['craftsman_id'] != $_SESSION['user_id']) {
            echo "Access Denied.";
            exit;
        }

        if ($booking['status'] === 'hired') {
            $bookingModel->updateStatus($bookingId, 'completed');
        }

        header("Location: " . APP_URL . "/craftsman/dashboard?success=booking_completed");
        exit;
    }
}
