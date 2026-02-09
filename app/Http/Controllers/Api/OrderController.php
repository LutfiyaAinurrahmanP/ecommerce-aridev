<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     * GET /api/orders (Customer: own orders)
     * GET /api/admin/orders (Admin/Store: all orders)
     */
    public function index()
    {
        // TODO: Return orders based on user role
    }

    /**
     * Create a new order from cart.
     * POST /api/orders
     */
    public function store(Request $request)
    {
        // TODO: Create order from cart items
    }

    /**
     * Display the specified order.
     * GET /api/orders/{id}
     */
    public function show(string $id)
    {
        // TODO: Return order detail with items
    }

    /**
     * Update order status.
     * PUT /api/orders/{id}/status
     */
    public function updateStatus(Request $request, string $id)
    {
        // TODO: Update order status (Admin/Store only)
    }

    /**
     * Cancel order.
     * DELETE /api/orders/{id}
     */
    public function destroy(string $id)
    {
        // TODO: Cancel order
    }
}
