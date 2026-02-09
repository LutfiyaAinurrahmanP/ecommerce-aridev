<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users (Admin only).
     * GET /api/admin/users
     */
    public function index()
    {
        // TODO: Return all users with pagination and filters
    }

    /**
     * Display the specified user.
     * GET /api/admin/users/{id}
     */
    public function show(string $id)
    {
        // TODO: Return user detail
    }

    /**
     * Update user role (Admin only).
     * PUT /api/admin/users/{id}/role
     */
    public function updateRole(Request $request, string $id)
    {
        // TODO: Update user role
    }

    /**
     * Remove the specified user.
     * DELETE /api/admin/users/{id}
     */
    public function destroy(string $id)
    {
        // TODO: Delete user
    }
}
