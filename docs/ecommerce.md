# API Documentation - Simple Ecommerce System

## Overview

Simple ecommerce API dengan 3 role: **Admin**, **Store**, dan **Customer**.

### Base URL

```
http://localhost:8000/api
```

### Authentication

Menggunakan Laravel Sanctum untuk API authentication dengan Bearer Token.

### Response Format

Semua response menggunakan format JSON:

```json
{
  "success": boolean,
  "message": string,
  "data": object|array|null,
  "errors": object|null
}
```

### User Roles

- **admin**: Mengelola seluruh sistem (users, categories, orders)
- **store**: Mengelola produk dan pesanan toko
- **customer**: Berbelanja dan mengelola pesanan pribadi

---

## Authentication Endpoints

### Register

```http
POST /api/register
```

**Request Body:**

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "customer" // optional, default: customer
}
```

**Response (201):**

```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "role": "customer",
            "created_at": "2026-02-09T10:00:00Z"
        },
        "token": "1|abc123def456..."
    }
}
```

### Login

```http
POST /api/login
```

**Request Body:**

```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response (200):**

```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "role": "customer"
        },
        "token": "1|abc123def456..."
    }
}
```

### Logout

```http
POST /api/logout
```

**Headers:**

```
Authorization: Bearer {token}
```

**Response (200):**

```json
{
    "success": true,
    "message": "Logged out successfully"
}
```

---

## Profile Endpoints

### Get Profile

```http
GET /api/profile
```

**Headers:**

```
Authorization: Bearer {token}
```

**Response (200):**

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "role": "customer",
        "phone": "081234567890",
        "address": "Jl. Merdeka No. 123",
        "created_at": "2026-02-09T10:00:00Z"
    }
}
```

### Update Profile

```http
PUT /api/profile
```

**Headers:**

```
Authorization: Bearer {token}
```

**Request Body:**

```json
{
    "name": "John Doe Jr",
    "phone": "081234567890",
    "address": "Jl. Merdeka No. 456"
}
```

**Response (200):**

```json
{
    "success": true,
    "message": "Profile updated successfully",
    "data": {
        "id": 1,
        "name": "John Doe Jr",
        "email": "john@example.com",
        "role": "customer",
        "phone": "081234567890",
        "address": "Jl. Merdeka No. 456"
    }
}
```

---

## Categories Endpoints (Admin Only)

### Get All Categories

```http
GET /api/categories
```

**Response (200):**

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Electronics",
            "description": "Electronic devices and gadgets",
            "created_at": "2026-02-09T10:00:00Z"
        }
    ]
}
```

### Create Category

```http
POST /api/categories
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

**Request Body:**

```json
{
    "name": "Fashion",
    "description": "Clothing and accessories"
}
```

**Response (201):**

```json
{
    "success": true,
    "message": "Category created successfully",
    "data": {
        "id": 2,
        "name": "Fashion",
        "description": "Clothing and accessories",
        "created_at": "2026-02-09T10:00:00Z"
    }
}
```

### Update Category

```http
PUT /api/categories/{id}
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

**Request Body:**

```json
{
    "name": "Fashion & Style",
    "description": "Clothing, shoes, and accessories"
}
```

### Delete Category

```http
DELETE /api/categories/{id}
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

---

## Products Endpoints

### Get All Products

```http
GET /api/products?page=1&limit=10&category_id=1&search=phone
```

**Query Parameters:**

- `page` (optional): Page number (default: 1)
- `limit` (optional): Items per page (default: 10, max: 50)
- `category_id` (optional): Filter by category
- `search` (optional): Search by name or description
- `store_id` (optional): Filter by store

**Response (200):**

```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "iPhone 15 Pro",
                "description": "Latest iPhone with advanced features",
                "price": 15000000,
                "stock": 50,
                "category_id": 1,
                "store_id": 2,
                "image_url": "/storage/products/iphone15.jpg",
                "created_at": "2026-02-09T10:00:00Z",
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "store": {
                    "id": 2,
                    "name": "TechStore",
                    "email": "store@tech.com"
                }
            }
        ],
        "last_page": 3,
        "per_page": 10,
        "total": 25
    }
}
```

### Get Product Detail

```http
GET /api/products/{id}
```

**Response (200):**

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "iPhone 15 Pro",
        "description": "Latest iPhone with advanced features",
        "price": 15000000,
        "stock": 50,
        "category_id": 1,
        "store_id": 2,
        "image_url": "/storage/products/iphone15.jpg",
        "created_at": "2026-02-09T10:00:00Z",
        "category": {
            "id": 1,
            "name": "Electronics",
            "description": "Electronic devices"
        },
        "store": {
            "id": 2,
            "name": "TechStore",
            "email": "store@tech.com"
        }
    }
}
```

### Create Product (Store & Admin)

```http
POST /api/products
```

**Headers:**

```
Authorization: Bearer {store_or_admin_token}
Content-Type: multipart/form-data
```

**Request Body:**

```json
{
    "name": "Samsung Galaxy S24",
    "description": "Flagship Samsung smartphone",
    "price": 12000000,
    "stock": 30,
    "category_id": 1,
    "image": "file_upload"
}
```

**Response (201):**

```json
{
    "success": true,
    "message": "Product created successfully",
    "data": {
        "id": 2,
        "name": "Samsung Galaxy S24",
        "description": "Flagship Samsung smartphone",
        "price": 12000000,
        "stock": 30,
        "category_id": 1,
        "store_id": 2,
        "image_url": "/storage/products/galaxy-s24.jpg",
        "created_at": "2026-02-09T10:00:00Z"
    }
}
```

### Update Product (Store & Admin)

```http
PUT /api/products/{id}
```

**Headers:**

```
Authorization: Bearer {store_or_admin_token}
```

**Request Body:**

```json
{
    "name": "Samsung Galaxy S24 Ultra",
    "description": "Premium Samsung smartphone with S Pen",
    "price": 18000000,
    "stock": 25,
    "category_id": 1
}
```

### Delete Product (Store & Admin)

```http
DELETE /api/products/{id}
```

**Headers:**

```
Authorization: Bearer {store_or_admin_token}
```

---

## Cart Endpoints (Customer Only)

### Get Cart

```http
GET /api/cart
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

**Response (200):**

```json
{
    "success": true,
    "data": {
        "items": [
            {
                "id": 1,
                "product_id": 1,
                "quantity": 2,
                "price": 15000000,
                "subtotal": 30000000,
                "product": {
                    "id": 1,
                    "name": "iPhone 15 Pro",
                    "image_url": "/storage/products/iphone15.jpg",
                    "stock": 50
                }
            }
        ],
        "total_items": 2,
        "total_amount": 30000000
    }
}
```

### Add to Cart

```http
POST /api/cart
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

**Request Body:**

```json
{
    "product_id": 1,
    "quantity": 2
}
```

**Response (201):**

```json
{
    "success": true,
    "message": "Product added to cart",
    "data": {
        "id": 1,
        "product_id": 1,
        "quantity": 2,
        "price": 15000000,
        "subtotal": 30000000
    }
}
```

### Update Cart Item

```http
PUT /api/cart/{cart_item_id}
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

**Request Body:**

```json
{
    "quantity": 3
}
```

### Remove Cart Item

```http
DELETE /api/cart/{cart_item_id}
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

### Clear Cart

```http
DELETE /api/cart
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

---

## Orders Endpoints

### Create Order (Customer)

```http
POST /api/orders
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

**Request Body:**

```json
{
    "shipping_address": "Jl. Merdeka No. 123, Jakarta",
    "shipping_phone": "081234567890",
    "payment_method": "bank_transfer", // bank_transfer, cod, e_wallet
    "notes": "Tolong kirim pagi hari"
}
```

**Response (201):**

```json
{
    "success": true,
    "message": "Order created successfully",
    "data": {
        "id": "ORD-20260209-001",
        "customer_id": 1,
        "total_amount": 30000000,
        "shipping_address": "Jl. Merdeka No. 123, Jakarta",
        "shipping_phone": "081234567890",
        "payment_method": "bank_transfer",
        "status": "pending",
        "notes": "Tolong kirim pagi hari",
        "created_at": "2026-02-09T10:00:00Z",
        "items": [
            {
                "id": 1,
                "product_id": 1,
                "product_name": "iPhone 15 Pro",
                "quantity": 2,
                "price": 15000000,
                "subtotal": 30000000
            }
        ]
    }
}
```

### Get My Orders (Customer)

```http
GET /api/orders?page=1&status=pending
```

**Headers:**

```
Authorization: Bearer {customer_token}
```

**Query Parameters:**

- `page` (optional): Page number
- `status` (optional): pending, confirmed, shipped, delivered, cancelled

**Response (200):**

```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "ORD-20260209-001",
                "total_amount": 30000000,
                "status": "pending",
                "payment_method": "bank_transfer",
                "created_at": "2026-02-09T10:00:00Z",
                "items_count": 2
            }
        ],
        "last_page": 1,
        "total": 5
    }
}
```

### Get Order Detail

```http
GET /api/orders/{order_id}
```

**Headers:**

```
Authorization: Bearer {token}
```

**Response (200):**

```json
{
    "success": true,
    "data": {
        "id": "ORD-20260209-001",
        "customer_id": 1,
        "total_amount": 30000000,
        "shipping_address": "Jl. Merdeka No. 123, Jakarta",
        "shipping_phone": "081234567890",
        "payment_method": "bank_transfer",
        "status": "pending",
        "notes": "Tolong kirim pagi hari",
        "created_at": "2026-02-09T10:00:00Z",
        "customer": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "items": [
            {
                "id": 1,
                "product_id": 1,
                "product_name": "iPhone 15 Pro",
                "quantity": 2,
                "price": 15000000,
                "subtotal": 30000000,
                "product": {
                    "id": 1,
                    "image_url": "/storage/products/iphone15.jpg",
                    "store": {
                        "id": 2,
                        "name": "TechStore"
                    }
                }
            }
        ]
    }
}
```

### Get All Orders (Admin & Store)

```http
GET /api/admin/orders?page=1&status=pending&store_id=2
```

**Headers:**

```
Authorization: Bearer {admin_or_store_token}
```

**Query Parameters:**

- `page` (optional): Page number
- `status` (optional): Filter by status
- `store_id` (optional): Filter by store (admin only)
- `start_date` & `end_date` (optional): Date range filter

### Update Order Status (Admin & Store)

```http
PUT /api/orders/{order_id}/status
```

**Headers:**

```
Authorization: Bearer {admin_or_store_token}
```

**Request Body:**

```json
{
    "status": "shipped", // pending, confirmed, shipped, delivered, cancelled
    "notes": "Order shipped via JNE"
}
```

---

## Users Management (Admin Only)

### Get All Users

```http
GET /api/admin/users?page=1&role=customer&search=john
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

**Query Parameters:**

- `page` (optional): Page number
- `role` (optional): Filter by role
- `search` (optional): Search by name or email

**Response (200):**

```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "John Doe",
                "email": "john@example.com",
                "role": "customer",
                "created_at": "2026-02-09T10:00:00Z"
            }
        ],
        "last_page": 5,
        "total": 45
    }
}
```

### Update User Role

```http
PUT /api/admin/users/{user_id}/role
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

**Request Body:**

```json
{
    "role": "store" // admin, store, customer
}
```

### Delete User

```http
DELETE /api/admin/users/{user_id}
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

---

## Reports (Admin Only)

### Sales Report

```http
GET /api/admin/reports/sales?start_date=2026-02-01&end_date=2026-02-09&store_id=2
```

**Headers:**

```
Authorization: Bearer {admin_token}
```

**Query Parameters:**

- `start_date` & `end_date`: Date range
- `store_id` (optional): Filter by store

**Response (200):**

```json
{
    "success": true,
    "data": {
        "total_orders": 150,
        "total_revenue": 500000000,
        "total_customers": 85,
        "daily_sales": [
            {
                "date": "2026-02-09",
                "orders": 25,
                "revenue": 75000000
            }
        ],
        "top_products": [
            {
                "product_id": 1,
                "product_name": "iPhone 15 Pro",
                "total_sold": 50,
                "total_revenue": 750000000
            }
        ]
    }
}
```

---

## Error Responses

### Validation Error (422)

```json
{
    "success": false,
    "message": "The given data was invalid",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password must be at least 8 characters."]
    }
}
```

### Unauthorized (401)

```json
{
    "success": false,
    "message": "Unauthorized"
}
```

### Forbidden (403)

```json
{
    "success": false,
    "message": "Access denied. Admin role required."
}
```

### Not Found (404)

```json
{
    "success": false,
    "message": "Resource not found"
}
```

### Server Error (500)

```json
{
    "success": false,
    "message": "Internal server error"
}
```

---

## Status Codes

- **200**: Success
- **201**: Created
- **400**: Bad Request
- **401**: Unauthorized
- **403**: Forbidden
- **404**: Not Found
- **422**: Validation Error
- **500**: Internal Server Error

---

## Database Schema Overview

### Users Table

```sql
- id (bigint, primary key)
- name (varchar)
- email (varchar, unique)
- password (varchar)
- role (enum: admin, store, customer)
- phone (varchar, nullable)
- address (text, nullable)
- created_at, updated_at
```

### Categories Table

```sql
- id (bigint, primary key)
- name (varchar)
- description (text, nullable)
- created_at, updated_at
```

### Products Table

```sql
- id (bigint, primary key)
- name (varchar)
- description (text)
- price (decimal)
- stock (integer)
- category_id (foreign key)
- store_id (foreign key to users)
- image_url (varchar, nullable)
- created_at, updated_at
```

### Cart Items Table

```sql
- id (bigint, primary key)
- customer_id (foreign key to users)
- product_id (foreign key)
- quantity (integer)
- price (decimal)
- created_at, updated_at
```

### Orders Table

```sql
- id (varchar, primary key) // ORD-YYYYMMDD-XXX
- customer_id (foreign key to users)
- total_amount (decimal)
- shipping_address (text)
- shipping_phone (varchar)
- payment_method (enum)
- status (enum: pending, confirmed, shipped, delivered, cancelled)
- notes (text, nullable)
- created_at, updated_at
```

### Order Items Table

```sql
- id (bigint, primary key)
- order_id (foreign key)
- product_id (foreign key)
- product_name (varchar) // snapshot
- quantity (integer)
- price (decimal) // snapshot
- subtotal (decimal)
- created_at, updated_at
```

---

## Implementation Notes

1. **Authentication**: Menggunakan Laravel Sanctum untuk API token
2. **File Upload**: Gambar produk disimpan di `storage/app/public/products/`
3. **Pagination**: Default 10 items per page, maksimal 50
4. **Validation**: Semua input divalidasi sesuai rules Laravel
5. **Authorization**: Middleware untuk check role permissions
6. **Price**: Disimpan dalam satuan rupiah (integer)
7. **Order ID**: Format ORD-YYYYMMDD-XXX (auto increment per hari)

---

## Permissions Summary

| Endpoint                       | Admin    | Store        | Customer |
| ------------------------------ | -------- | ------------ | -------- |
| Auth (register, login, logout) | ✅       | ✅           | ✅       |
| Profile CRUD                   | ✅       | ✅           | ✅       |
| Categories CRUD                | ✅       | ❌           | ❌       |
| Products Read                  | ✅       | ✅           | ✅       |
| Products CUD                   | ✅       | ✅ (own)     | ❌       |
| Cart CRUD                      | ❌       | ❌           | ✅       |
| Orders Create                  | ❌       | ❌           | ✅       |
| Orders Read                    | ✅ (all) | ✅ (store's) | ✅ (own) |
| Orders Update Status           | ✅       | ✅ (store's) | ❌       |
| Users Management               | ✅       | ❌           | ❌       |
| Reports                        | ✅       | ❌           | ❌       |
