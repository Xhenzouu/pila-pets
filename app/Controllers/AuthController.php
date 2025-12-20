<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ResidentModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);

        // If already logged in, redirect based on role
        if (session()->has('user_id') && uri_string() !== 'auth/login') {
            return $this->redirectBasedOnRole();
        }

        if ($this->request->getMethod() === 'POST') {
            // Only validate that fields are filled — no password length check here
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return view('auth/pages/login', ['validation' => $this->validator]);
            }

            $loginInput = $this->request->getPost('username');
            $password   = $this->request->getPost('password');

            $userModel = new UserModel();

            // Try to find user by username OR email
            $user = $userModel->where('username', $loginInput)
                              ->orWhere('email', $loginInput)
                              ->first();

            // Always show generic message — don't reveal if username exists or password is wrong
            if (!$user || !password_verify($password, $user['password'])) {
                return view('auth/pages/login', [
                    'error' => 'Invalid login credentials. Please try again.',
                    'old_username' => $loginInput
                ]);
            }

            // Login successful
            $role = $user['role'] ?? 'user';

            $sessionData = [
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'email'     => $user['email'] ?? '',
                'role'      => $role,
                'logged_in' => true,
            ];

            // Load resident data for regular users
            if ($role !== 'admin' && !empty($user['resident_id'])) {
                $fullUserData = $userModel->getUserWithResident($user['id']);
                if ($fullUserData) {
                    $sessionData += [
                        'resident_id'    => $fullUserData['resident_id'],
                        'first_name'     => $fullUserData['first_name'] ?? '',
                        'middle_name'    => $fullUserData['middle_name'] ?? '',
                        'last_name'      => $fullUserData['last_name'] ?? '',
                        'contact_number' => $fullUserData['contact_number'] ?? '',
                        'barangay'       => $fullUserData['barangay'] ?? '',
                        'created_at'     => $fullUserData['created_at'] ?? date('Y-m-d H:i:s')
                    ];
                }
            } else {
                // Admin defaults
                $sessionData += [
                    'resident_id'    => null,
                    'first_name'     => 'Admin',
                    'middle_name'    => '',
                    'last_name'      => 'User',
                    'contact_number' => '',
                    'barangay'       => 'Pila, Laguna',
                    'created_at'     => $user['created_at'] ?? date('Y-m-d H:i:s')
                ];
            }

            session()->set($sessionData);

            return $this->redirectBasedOnRole();
        }

        return view('auth/pages/login');
    }

    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'first_name'       => 'required|min_length[2]',
                'last_name'        => 'required|min_length[2]',
                'username'         => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
                'email'            => 'required|valid_email|is_unique[users.email]',
                'password'         => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]',
                'barangay'         => 'required',
                'contact_number'   => 'required|min_length[10]|max_length[11]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/pages/register', ['validation' => $this->validator]);
            }

            $residentModel = new ResidentModel();
            $userModel     = new UserModel();

            $residentId = $residentModel->insert([
                'first_name'     => $this->request->getPost('first_name'),
                'middle_name'    => $this->request->getPost('middle_name'),
                'last_name'      => $this->request->getPost('last_name'),
                'barangay'       => $this->request->getPost('barangay'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email'          => $this->request->getPost('email'),
                'created_at'     => date('Y-m-d H:i:s')
            ]);

            if (!$residentId) {
                return view('auth/pages/register', ['error' => 'Failed to create resident record.']);
            }

            $userInserted = $userModel->insert([
                'username'    => $this->request->getPost('username'),
                'email'       => $this->request->getPost('email'),
                'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'        => 'user',
                'resident_id' => $residentId,
                'created_at'  => date('Y-m-d H:i:s')
            ]);

            if (!$userInserted) {
                return view('auth/pages/register', ['error' => 'Failed to create user account.']);
            }

            return redirect()->to('/auth/login')->with('success', 'Account created successfully! Please log in.');
        }

        return view('auth/pages/register');
    }

    public function forgotPassword()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST') {
            $rules = ['email' => 'required|valid_email'];
            if (!$this->validate($rules)) {
                return view('auth/pages/forgot_password', ['validation' => $this->validator]);
            }

            return view('auth/pages/forgot_password', [
                'success' => 'If an account exists with that email, a password reset link has been sent.'
            ]);
        }

        return view('auth/pages/forgot_password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out successfully.');
    }

    private function redirectBasedOnRole()
    {
        return session('role') === 'admin'
            ? redirect()->to(base_url('dashboard'))
            : redirect()->to(base_url('resident/home'));
    }
}