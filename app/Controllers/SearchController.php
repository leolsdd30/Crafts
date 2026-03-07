<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\CraftsmanProfile;

class SearchController extends Controller
{
    /**
     * Display a public-facing grid of craftsmen with optional search and filters.
     */
    public function index()
    {
        $craftsmanModel = new CraftsmanProfile();

        $filters = [
            'category' => $_GET['category'] ?? null,
            'search' => $_GET['q'] ?? null
        ];

        $craftsmen = $craftsmanModel->getAllCraftsmen($filters);

        $this->view('layouts/app', [
            'pageTitle' => 'Find Skilled Professionals - CraftConnect',
            'contentView' => 'search/index',
            'craftsmen' => $craftsmen,
            'filters' => $filters
        ]);
    }

}
