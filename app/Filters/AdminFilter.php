<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // First check if logged in
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Please login first');
        }

        // Then check role
        if (session('role') !== 'admin') {
            return redirect()->to('/resident/dashboard')->with('error', 'Access denied. Admins only.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}