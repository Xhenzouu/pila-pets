<?php

namespace App\Controllers;

use App\Models\ResidentModel;
use App\Models\PetModel;

class ResidentsController extends BaseController
{
    protected $perPage = 15;

    // Admin: List all residents
    public function index()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/resident/dashboard')->with('error', 'Admins only');
        }

        $model = new ResidentModel();

        $residents = $model->orderBy('full_name', 'ASC')->paginate($this->perPage);
        $uniqueBarangays = $model->select('barangay')->distinct()->findAll();

        $data = [
            'title'           => 'Manage Residents (Admin)',
            'residents'       => $residents,
            'totalResidents'  => $model->countAll(),
            'barangayCount'   => count($uniqueBarangays),
            'pager'           => $model->pager
        ];

        return view('residents/admin_index', $data);
    }

    // Resident: Home / Dashboard
    public function dashboard()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Welcome, ' . esc(session('username'))
        ];

        return view('residents/dashboard', $data);
    }

    // Resident: My Profile
    public function profile()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'My Profile'
        ];

        return view('residents/profile', $data);
    }

    // Resident: My Pets
    public function myPets()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $petModel = new PetModel();
        $pets = $petModel->where('user_id', session('user_id'))->findAll();

        $data = [
            'title' => 'My Pets',
            'pets'  => $pets
        ];

        return view('residents/my_pets', $data);
    }

    // Resident: Browse All Pets
    public function browse()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $petModel = new PetModel();
        $pets = $petModel->getPetsWithOwner();

        $data = [
            'title' => 'Browse Pets',
            'pets'  => $pets
        ];

        return view('residents/browse', $data);
    }

    // Admin Only: Delete Resident
    public function delete($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/resident/dashboard')->with('error', 'Admins only');
        }

        $model = new ResidentModel();
        $model->delete($id);

        return redirect()->to('/admin/residents')->with('success', 'Resident deleted successfully');
    }
}