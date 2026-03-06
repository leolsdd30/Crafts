<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard / home page.
     */
    public function index()
    {
        $this->view('layouts/app', [
            'pageTitle' => 'Welcome to CraftConnect',
            'contentView' => 'public/home'
        ]);
    }

    /**
     * Show the about us page.
     */
    public function about()
    {
        $this->view('layouts/app', [
            'pageTitle' => 'About Us - CraftConnect',
            'contentView' => 'public/about'
        ]);
    }
}
