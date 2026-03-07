<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    /**
     * Show the review form for a craftsman.
     */
    public function create()
    {
        Middleware::requireLogin();

        $craftsmanId = $_GET['craftsman_id'] ?? null;

        if (!$craftsmanId || $craftsmanId == $_SESSION['user_id']) {
            header("Location: " . APP_URL . "/search");
            exit;
        }

        $userModel = new User();
        $craftsman = $userModel->findById($craftsmanId);

        if (!$craftsman || $craftsman['role'] !== 'craftsman') {
            echo "Craftsman not found.";
            exit;
        }

        // Check if already reviewed
        $reviewModel = new Review();
        if ($reviewModel->hasReviewed($_SESSION['user_id'], $craftsmanId)) {
            header("Location: " . APP_URL . "/profile?id=" . $craftsmanId . "&info=already_reviewed");
            exit;
        }

        $this->view('layouts/app', [
            'pageTitle' => 'Write a Review - CraftConnect',
            'contentView' => 'reviews/create',
            'craftsman' => $craftsman
        ]);
    }

    /**
     * Store the review.
     */
    public function store()
    {
        Middleware::requireLogin();
        Middleware::verifyCsrfToken();

        $craftsmanId = $_POST['craftsman_id'] ?? null;
        $starRating = (int) ($_POST['star_rating'] ?? 0);
        $comment = trim($_POST['comment'] ?? '');

        if (empty($craftsmanId) || $starRating < 1 || $starRating > 5) {
            $userModel = new User();
            $craftsman = $userModel->findById($craftsmanId);

            $this->view('layouts/app', [
                'pageTitle' => 'Write a Review - CraftConnect',
                'contentView' => 'reviews/create',
                'craftsman' => $craftsman,
                'error' => 'Please select a star rating (1-5).'
            ]);
            return;
        }

        $reviewModel = new Review();

        // Prevent duplicate reviews
        if ($reviewModel->hasReviewed($_SESSION['user_id'], $craftsmanId)) {
            header("Location: " . APP_URL . "/profile?id=" . $craftsmanId . "&info=already_reviewed");
            exit;
        }

        $success = $reviewModel->create([
            'homeowner_id' => $_SESSION['user_id'],
            'craftsman_id' => $craftsmanId,
            'star_rating' => $starRating,
            'comment' => $comment
        ]);

        if ($success) {
            header("Location: " . APP_URL . "/profile?id=" . $craftsmanId . "&success=review_submitted");
        } else {
            header("Location: " . APP_URL . "/profile?id=" . $craftsmanId . "&error=review_failed");
        }
        exit;
    }
}
