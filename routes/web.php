<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\HomeownerController;
use App\Controllers\CraftsmanController;
use App\Controllers\JobBoardController;
use App\Controllers\SearchController;
use App\Controllers\ProfileController;

/**
 * Register all web routes here.
 * The $router object is provided by public/index.php
 */

$router->get('/', [HomeController::class , 'index']);
$router->get('/about', [HomeController::class , 'about']);

// Public Search & Profile Routes
$router->get('/search', [SearchController::class , 'index']);
$router->get('/profile', [ProfileController::class , 'show']);

// Profile Management Routes
$router->get('/profile/edit', [ProfileController::class , 'edit']);
$router->post('/profile/edit', [ProfileController::class , 'update']);

// Authentication Routes
$router->get('/login', [AuthController::class , 'showLoginForm']);
$router->post('/login', [AuthController::class , 'processLogin']);
$router->get('/register', [AuthController::class , 'showRegisterForm']);
$router->post('/register', [AuthController::class , 'processRegister']);
$router->get('/logout', [AuthController::class , 'logout']);

// Role-based Dashboards
$router->get('/homeowner/dashboard', [HomeownerController::class , 'dashboard']);
$router->get('/craftsman/dashboard', [CraftsmanController::class , 'dashboard']);

// Job Board Routes
$router->get('/jobs', [JobBoardController::class , 'index']);
$router->get('/jobs/create', [JobBoardController::class , 'create']);
$router->post('/jobs/create', [JobBoardController::class , 'store']);
$router->get('/jobs/show', [JobBoardController::class , 'show']);
$router->post('/jobs/quote', [JobBoardController::class , 'submitQuote']);
$router->post('/jobs/accept-quote', [JobBoardController::class , 'acceptQuote']);
$router->post('/jobs/reject-quote', [JobBoardController::class , 'rejectQuote']);
