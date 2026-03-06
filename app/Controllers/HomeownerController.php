<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;

class HomeownerController extends Controller
{
    /**
     * Show the Homeowner Dashboard
     */
    public function dashboard()
    {
        // Enforce role restriction
        Middleware::requireRole('homeowner');

        // Here we would fetch jobs, bids, and profile data from Models for the homeowner

        $this->view('layouts/app', [
            'pageTitle' => 'Homeowner Dashboard - CraftConnect',
            'contentView' => 'homeowner/dashboard'
        ]);
    }
}
