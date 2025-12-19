<?php

namespace App\Controllers;

use App\Models\ResidentModel;
use App\Models\PetModel;

class ResidentsController extends BaseController
{
    protected $perPage = 15;

    public function index()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/resident/dashboard')->with('error', 'Admins only');
        }

        $model = new ResidentModel();
        $residents = $model->orderBy('last_name', 'ASC')->paginate($this->perPage);

        // Use separate instance to avoid affecting pagination query
        $barangayModel = new ResidentModel();
        $uniqueBarangays = $barangayModel->select('barangay')->groupBy('barangay')->findAll();

        $data = [
            'title'           => 'Manage Residents (Admin)',
            'residents'       => $residents,
            'totalResidents'  => $model->countAll(),
            'barangayCount'   => count($uniqueBarangays),
            'pager'           => $model->pager
        ];

        return view('admin/pages/residents', $data);
    }

    public function home()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Welcome, ' . esc(session('username'))
        ];

        return view('residents/pages/home', $data);
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

        return view('residents/pages/profile', $data);
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

        return view('residents/pages/my_pets', $data);
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

        return view('residents/pages/browse', $data);
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

    public function updateProfile()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $model = new ResidentModel();

        $data = [
            'first_name'  => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'last_name'   => $this->request->getPost('last_name'),
            'email'       => $this->request->getPost('email')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model->update(session('user_id'), $data);

        // Update session values
        session()->set($data);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
