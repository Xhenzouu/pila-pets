<?php

namespace App\Controllers;

use App\Models\ResidentModel;
use App\Models\PetModel;
use App\Models\UserModel; // Add this if not already included

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

        $petModel = new PetModel();

        // Get all pets with owner info
        $allPets = $petModel->getPetsWithOwner();

        // Count statuses
        $totalPets = count($allPets);
        $lostCount = 0;
        $adoptionCount = 0;
        $myPets = [];

        foreach ($allPets as $pet) {
            if ($pet['status'] === 'lost') $lostCount++;
            if ($pet['status'] === 'for_adoption') $adoptionCount++;

            // Collect current user's pets
            if ($pet['user_id'] == session('user_id')) {
                $myPets[] = $pet;
            }
        }

        $data = [
            'title'         => 'Welcome, ' . esc(session('username')),
            'totalPets'     => $totalPets,
            'lostCount'     => $lostCount,
            'adoptionCount' => $adoptionCount,
            'myPets'        => $myPets
        ];

        return view('residents/pages/home', $data);
    }

    // Resident: View Profile (Read-only)
    public function profile()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        // Fetch user's pets to display on profile
        $petModel = new PetModel();
        $pets = $petModel->where('user_id', session('user_id'))->findAll();

        $data = [
            'title' => 'My Profile',
            'pets'  => $pets // Pass pets to the view
        ];

        return view('residents/pages/profile', $data);
    }

    // Resident: Edit Profile Form
    public function editProfile()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Edit Profile'
        ];

        return view('residents/pages/edit_profile', $data);
    }

    // Resident: Handle Profile Update (POST)
    public function updateProfilePost()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $residentModel = new ResidentModel();
        $userModel     = new UserModel();

        $userId     = session('user_id');
        $residentId = session('resident_id'); // Make sure this is set during login!

        // Data from form
        $firstName      = $this->request->getPost('first_name');
        $middleName     = $this->request->getPost('middle_name');
        $lastName       = $this->request->getPost('last_name');
        $email          = $this->request->getPost('email');
        $contactNumber  = $this->request->getPost('contact_number');
        $barangay       = $this->request->getPost('barangay');
        $newPassword    = $this->request->getPost('password');

        // Update residents table
        $residentData = [
            'first_name'     => $firstName,
            'middle_name'    => $middleName ?: null,
            'last_name'      => $lastName,
            'email'          => $email,
            'contact_number' => $contactNumber,
            'barangay'       => $barangay
        ];
        $residentModel->update($residentId, $residentData);

        // Update users table (email + password if changed)
        $userData = [
            'email' => $email
        ];
        if (!empty($newPassword)) {
            $userData['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }
        $userModel->update($userId, $userData);

        // Refresh session with updated data
        $updatedSession = [
            'first_name'     => $firstName,
            'middle_name'    => $middleName,
            'last_name'      => $lastName,
            'email'          => $email,
            'contact_number' => $contactNumber,
            'barangay'       => $barangay
        ];
        session()->set($updatedSession);

        return redirect()->to('/resident/profile')->with('success', 'Profile updated successfully!');
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
}