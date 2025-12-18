<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);

        // If already logged in, redirect to employees list
        if (session()->has('user_id')) {
            return redirect()->to('dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[6]',
            ];

            $errors = [
                'username' => [
                    'required'    => 'Username is required.',
                    'min_length'  => 'Username must be at least 3 characters.',
                    'max_length'  => 'Username cannot exceed 50 characters.',
                ],
                'password' => [
                    'required'    => 'Password is required.',
                    'min_length'  => 'Password must be at least 6 characters.',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('auth/login', [
                    'validation' => $this->validator
                ]);
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new UserModel();
            $user = $model->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                
                $userData = [
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'role'      => $user['role'] ?? 'user',
                    'logged_in' => true,
                ];
                session()->set($userData);


                return redirect()->to('dashboard');
            }

            // Invalid credentials
            return view('auth/login', [
                'error' => 'Invalid username or password.',
                'old_username' => $username
            ]);
        }

        // GET request - show login form
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'You have been logged out.');
    }

}