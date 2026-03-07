<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;
use App\Models\JobPosting;
use App\Models\JobQuote;
use App\Models\Booking;

class HomeownerController extends Controller
{
    /**
     * Show the Homeowner Dashboard
     */
    public function dashboard()
    {
        // Enforce role restriction
        Middleware::requireRole('homeowner');

        $jobModel = new JobPosting();
        $quoteModel = new JobQuote();

        $myJobs = $jobModel->getJobsByUser($_SESSION['user_id']);

        $activeJobsCount = 0;
        $completedJobsCount = 0;

        foreach ($myJobs as $job) {
            if ($job['status'] === 'completed') {
                $completedJobsCount++;
            } else if ($job['status'] !== 'cancelled') {
                $activeJobsCount++;
            }
        }

        // Load all quotes for this homeowner's jobs
        $allQuotes = $quoteModel->getQuotesForHomeowner($_SESSION['user_id']);
        $pendingQuotesCount = 0;
        foreach ($allQuotes as $quote) {
            if ($quote['quote_status'] === 'pending') {
                $pendingQuotesCount++;
            }
        }

        // Load bookings sent by this homeowner
        $bookingModel = new Booking();
        $myBookings = $bookingModel->getBookingsForHomeowner($_SESSION['user_id']);

        $this->view('layouts/app', [
            'pageTitle' => 'Homeowner Dashboard - CraftConnect',
            'contentView' => 'homeowner/dashboard',
            'jobs' => $myJobs,
            'activeJobsCount' => $activeJobsCount,
            'completedJobsCount' => $completedJobsCount,
            'allQuotes' => $allQuotes,
            'pendingQuotesCount' => $pendingQuotesCount,
            'bookings' => $myBookings
        ]);
    }
}
