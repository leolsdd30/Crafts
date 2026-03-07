<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;
use App\Models\JobPosting;

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
        $myJobs = $jobModel->getJobsByUser($_SESSION['user_id']);

        $activeJobsCount = 0;
        $completedJobsCount = 0;

        foreach ($myJobs as $job) {
            if ($job['status'] !== 'completed') {
                $activeJobsCount++;
            }
            else {
                $completedJobsCount++;
            }
        }

        $this->view('layouts/app', [
            'pageTitle' => 'Homeowner Dashboard - CraftConnect',
            'contentView' => 'homeowner/dashboard',
            'jobs' => $myJobs,
            'activeJobsCount' => $activeJobsCount,
            'completedJobsCount' => $completedJobsCount
        ]);
    }
}
