<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;
use App\Models\JobQuote;

class CraftsmanController extends Controller
{
    /**
     * Show the Craftsman Dashboard
     */
    public function dashboard()
    {
        // Enforce role restriction
        Middleware::requireRole('craftsman');

        $quoteModel = new JobQuote();
        $myQuotes = $quoteModel->getQuotesByCraftsman($_SESSION['user_id']);

        $activeBookings = 0;
        $submittedBids = count($myQuotes);
        $totalEarnings = 0; // Placeholder for future feature

        foreach ($myQuotes as $quote) {
            if ($quote['status'] === 'accepted') {
                $activeBookings++;
            }
        }

        $this->view('layouts/app', [
            'pageTitle' => 'Craftsman Dashboard - CraftConnect',
            'contentView' => 'craftsman/dashboard',
            'quotes' => $myQuotes,
            'activeBookings' => $activeBookings,
            'submittedBids' => $submittedBids,
            'totalEarnings' => $totalEarnings
        ]);
    }
}
