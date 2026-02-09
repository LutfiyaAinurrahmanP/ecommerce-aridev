<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get cart items.
     * GET /api/cart
     */
    public function index(Request $request)
    {
        // TODO: Return cart items for authenticated customer
    }

    /**
     * Add item to cart.
     * POST /api/cart
     */
    public function store(Request $request)
    {
        // TODO: Add product to cart
    }

    /**
     * Update cart item quantity.
     * PUT /api/cart/{id}
     */
    public function update(Request $request, $id)
    {
        // TODO: Update cart item quantity
    }

    /**
     * Remove item from cart.
     * DELETE /api/cart/{id}
     */
    public function destroy($id)
    {
        // TODO: Remove cart item
    }

    /**
     * Clear all cart items.
     * DELETE /api/cart
     */
    public function clear()
    {
        // TODO: Clear all cart items for customer
    }
}
