<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ResidentModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);

        if (session()->has('user_id') && uri_string() !== 'auth/login') {
            return $this->redirectBasedOnRole();
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/pages/login', ['validation' => $this->validator]);
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new UserModel();
            $user  = $model->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id'     => $user['id'],
                    'username'    => $user['username'],
                    'role'        => $user['role'] ?? 'user',
                    'resident_id' => $user['resident_id'],
                    'logged_in'   => true,
                ]);
                return $this->redirectBasedOnRole();
            }

            return view('auth/pages/login', [
                'error' => 'Invalid username or password.',
                'old_username' => $username
            ]);
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
                'contact_number'   => 'required|min_length[10]',
            ];

            if (!$this->validate($rules)) {
                return view('auth/pages/register', ['validation' => $this->validator]);
            }

            $residentModel = new ResidentModel();
            $userModel = new UserModel();

            $residentId = $residentModel->insert([
                'first_name'     => $this->request->getPost('first_name'),
                'middle_name'    => $this->request->getPost('middle_name'),
                'last_name'      => $this->request->getPost('last_name'),
                'barangay'       => $this->request->getPost('barangay'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email'          => $this->request->getPost('email'),
                'created_at'     => date('Y-m-d H:i:s')
            ]);

            $userModel->insert([
                'username'    => $this->request->getPost('username'),
                'email'       => $this->request->getPost('email'),
                'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'        => 'user',
                'resident_id' => $residentId
            ]);

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

            $email = $this->request->getPost('email');
            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if (!$user) {
                return view('auth/pages/forgot_password', ['error' => 'No account found with that email.']);
            }

            return view('auth/pages/forgot_password', ['success' => 'If an account exists, a password reset link has been sent.']);
        }

        return view('auth/pages/forgot_password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Logged out successfully.');
    }

    private function redirectBasedOnRole()
    {
        return session('role') === 'admin'
            ? redirect()->to(base_url('dashboard'))
            : redirect()->to(base_url('resident/home'));
    }
}