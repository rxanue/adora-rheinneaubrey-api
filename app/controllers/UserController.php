<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function showUsers()
    {
      $this->call->database();
      $this->call->model('UserModel');
      $data['users'] = $this->UserModel->all();
      $this->call->view('users', $data);
    }

    public function login()
    {
        $this->call->library('api');

        $api = lava_instance()->api;

        $api->require_method('POST');
        $api->rate_limit();

        $data = $api->body();

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        if (empty($username) || empty($password)) {
            $api->respond_error('Username and password are required.', 400);
        }

        $this->call->model('UserModel');

        $user = $this->UserModel->find_by_username($username);

        if (!$user || !password_verify($password, $user['password'])) {
            $api->respond_error('Invalid username or password.', 401);
        }

        if ((int) $user['is_active'] !== 1) {
            $api->respond_error('This account is inactive.', 403);
        }

        $tokens = $api->issue_tokens([
            'id' => $user['id'],
            'role' => $user['role'],
            'scopes' => ['read', 'write']
        ]);

        $api->respond([
            'status' => true,
            'message' => 'Login successful.',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role']
            ],
            'tokens' => $tokens
        ]);
    }
}