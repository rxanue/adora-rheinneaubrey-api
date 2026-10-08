<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        parent::__construct();

        $this->product = $this->call->model('ProductModel');
    }

    public function index()
    {
        $products = $this->product->get_all_products();

        header('Content-Type: application/json');

        echo json_encode([
            'status' => true,
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $product = $this->product->get_product($id);

        header('Content-Type: application/json');

        if (!$product) {
            http_response_code(404);

            echo json_encode([
                'status' => false,
                'message' => 'Product not found'
            ]);

            return;
        }

        echo json_encode([
            'status' => true,
            'data' => $product
        ]);
    }

    public function store()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            $input = $_POST;
        }

        $data = [
            'product_name' => $input['product_name'] ?? '',
            'description'  => $input['description'] ?? null,
            'price'        => $input['price'] ?? 0,
            'quantity'     => $input['quantity'] ?? 0
        ];

        if (empty($data['product_name'])) {
            http_response_code(400);

            header('Content-Type: application/json');

            echo json_encode([
                'status' => false,
                'message' => 'Product name is required'
            ]);

            return;
        }

        $result = $this->product->create_product($data);

        header('Content-Type: application/json');

        if ($result) {
            http_response_code(201);

            echo json_encode([
                'status' => true,
                'message' => 'Product created successfully'
            ]);

            return;
        }

        http_response_code(500);

        echo json_encode([
            'status' => false,
            'message' => 'Failed to create product'
        ]);
    }

    public function update($id)
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input) {
            $input = $_POST;
        }

        $existing = $this->product->get_product($id);

        header('Content-Type: application/json');

        if (!$existing) {
            http_response_code(404);

            echo json_encode([
                'status' => false,
                'message' => 'Product not found'
            ]);

            return;
        }

        $data = [
            'product_name' => $input['product_name'] ?? '',
            'description'  => $input['description'] ?? null,
            'price'        => $input['price'] ?? 0,
            'quantity'     => $input['quantity'] ?? 0
        ];

        if (empty($data['product_name'])) {
            http_response_code(400);

            echo json_encode([
                'status' => false,
                'message' => 'Product name is required'
            ]);

            return;
        }

        $result = $this->product->update_product($id, $data);

        if ($result) {
            echo json_encode([
                'status' => true,
                'message' => 'Product updated successfully'
            ]);

            return;
        }

        http_response_code(500);

        echo json_encode([
            'status' => false,
            'message' => 'Failed to update product'
        ]);
    }

    public function delete($id)
    {
        $existing = $this->product->get_product($id);

        header('Content-Type: application/json');

        if (!$existing) {
            http_response_code(404);

            echo json_encode([
                'status' => false,
                'message' => 'Product not found'
            ]);

            return;
        }

        $result = $this->product->delete_product($id);

        if ($result) {
            echo json_encode([
                'status' => true,
                'message' => 'Product deleted successfully'
            ]);

            return;
        }

        http_response_code(500);

        echo json_encode([
            'status' => false,
            'message' => 'Failed to delete product'
        ]);
    }
}