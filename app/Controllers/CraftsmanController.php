<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Auth\Middleware;

class CraftsmanController extends Controller
{
    /**
     * Show the Craftsman Dashboard
     */
    public function dashboard()
    {
        // Enforce role restriction
        Middleware::requireRole('craftsman');

        // Here we would fetch submitted bids, active bookings, and earnings for the craftsman

        $this->view('layouts/app', [
            'pageTitle' => 'Craftsman Dashboard - CraftConnect',
            'contentView' => 'craftsman/dashboard'
        ]);
    }
}
