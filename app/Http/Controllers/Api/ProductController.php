<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products with filters.
     * GET /api/products
     */
    public function index()
    {
        // TODO: Return all products with pagination and filters
    }

    /**
     * Store a newly created product.
     * POST /api/products
     */
    public function store(Request $request)
    {
        // TODO: Create new product with image upload
    }

    /**
     * Display the specified product.
     * GET /api/products/{id}
     */
    public function show(string $id)
    {
        // TODO: Return product detail with relations
    }

    /**
     * Update the specified product.
     * PUT /api/products/{id}
     */
    public function update(Request $request, string $id)
    {
        // TODO: Update product
    }

    /**
     * Remove the specified product.
     * DELETE /api/products/{id}
     */
    public function destroy(string $id)
    {
        // TODO: Delete product
    }
}
