<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     * GET /api/categories
     */
    public function index()
    {
        // TODO: Return all categories
    }

    /**
     * Store a newly created category.
     * POST /api/categories
     */
    public function store(Request $request)
    {
        // TODO: Create new category
    }

    /**
     * Display the specified category.
     * GET /api/categories/{id}
     */
    public function show(string $id)
    {
        // TODO: Return category by ID
    }

    /**
     * Update the specified category.
     * PUT /api/categories/{id}
     */
    public function update(Request $request, string $id)
    {
        // TODO: Update category
    }

    /**
     * Remove the specified category.
     * DELETE /api/categories/{id}
     */
    public function destroy(string $id)
    {
        // TODO: Delete category
    }
}
