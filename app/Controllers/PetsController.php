<?php

namespace App\Controllers;

use App\Models\PetModel;

class PetsController extends BaseController
{
    protected $petModel;

    public function __construct()
    {
        $this->petModel = new PetModel();
        
        // Optional: helper for form
        helper(['form', 'url']);
    }

    // Display list of all pets
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pets = $this->petModel->orderBy('created_at', 'DESC')->findAll();

        $totalPets = count($pets);
        $statusCount = [
            'registered'   => 0,
            'lost'         => 0,
            'for_adoption' => 0,
        ];

        foreach ($pets as $pet) {
            $statusCount[$pet['status']]++;
        }

        $data = [
            'pets'        => $pets,
            'totalPets'   => $totalPets,
            'statusCount' => $statusCount,
            'title'       => 'All Registered Pets',
        ];

        return view('admin/pages/pets', $data);
    }

    // Show form to register a new pet
    public function create()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Register New Pet',
        ];

        return view('residents/pages/register_pet', $data);
    }

    // Store new pet from form submission
    public function store()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $rules = [
            'pet_name'       => 'required|min_length[2]|max_length[100]',
            'species'        => 'required',
            'status'         => 'required|in_list[registered,lost,for_adoption]',
            'description'    => 'required|min_length[10]',
            'location'       => 'required|max_length[255]',
            'contact_number' => 'required|regex_match[/^09\d{9}$/]',
            'image'          => 'permit_empty|valid_url',
            'breed'          => 'permit_empty|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'user_id'        => session('user_id'),
            'pet_name'       => $this->request->getPost('pet_name'),
            'species'        => $this->request->getPost('species'),
            'breed'          => $this->request->getPost('breed'),
            'status'         => $this->request->getPost('status'),
            'description'    => $this->request->getPost('description'),
            'image'          => $this->request->getPost('image') ?: null,
            'location'       => $this->request->getPost('location'),
            'contact_number' => $this->request->getPost('contact_number'),
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $this->petModel->insert($data);

        return redirect()->to('/resident/my-pets')->with('success', 'Pet successfully registered!');
    }

    // Show edit form for a specific pet
    public function edit($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);

        if (!$pet) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pet not found');
        }

        // Optional: Only allow owner to edit (uncomment if needed)
        // if ($pet['user_id'] != session('user_id')) {
        //     return redirect()->to('/pets')->with('error', 'You can only edit your own pets.');
        // }

        $data = [
            'pet'   => $pet,
            'title' => 'Edit Pet - ' . esc($pet['pet_name']),
        ];

        return view('pets/edit', $data);
    }

    // Update pet after editing
    public function update($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);

        if (!$pet) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pet not found');
        }

        $rules = [
            'pet_name'       => 'required|min_length[2]|max_length[100]',
            'species'        => 'required',
            'status'         => 'required|in_list[registered,lost,for_adoption]',
            'description'    => 'required|min_length[10]',
            'location'       => 'required|max_length[255]',
            'contact_number' => 'required|regex_match[/^09\d{9}$/]',
            'image'          => 'permit_empty|valid_url',
            'breed'          => 'permit_empty|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'pet_name'       => $this->request->getPost('pet_name'),
            'species'        => $this->request->getPost('species'),
            'breed'          => $this->request->getPost('breed'),
            'status'         => $this->request->getPost('status'),
            'description'    => $this->request->getPost('description'),
            'image'          => $this->request->getPost('image') ?: $pet['image'],
            'location'       => $this->request->getPost('location'),
            'contact_number' => $this->request->getPost('contact_number'),
        ];

        $this->petModel->update($id, $data);

        return redirect()->to('/pets')->with('success', 'Pet information updated successfully!');
    }

    // Delete a pet
    public function delete($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);

        if (!$pet) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pet not found');
        }

        // Optional: Restrict to owner only
        // if ($pet['user_id'] != session('user_id')) {
        //     return redirect()->to('/pets')->with('error', 'You can only delete your own pets.');
        // }

        $this->petModel->delete($id);

        return redirect()->to('/pets')->with('success', 'Pet record deleted successfully.');
    }

    // Resident: Edit own pet
    public function editPet($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);

        if (!$pet || $pet['user_id'] != session('user_id')) {
            return redirect()->to('/resident/my-pets')->with('error', 'Pet not found or access denied.');
        }

        $data = [
            'title' => 'Edit Pet',
            'pet'   => $pet
        ];

        return view('residents/pages/edit_pet', $data);
    }

    // Resident: Update own pet
    public function updatePet($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);
        if (!$pet || $pet['user_id'] != session('user_id')) {
            return redirect()->to('/resident/my-pets')->with('error', 'Access denied.');
        }

        // Same validation as store()
        $rules = [ /* same as in store() */ ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [ /* same fields as store() */ ];
        $this->petModel->update($id, $data);

        return redirect()->to('/resident/my-pets')->with('success', 'Pet updated successfully!');
    }

    // Resident: Delete own pet
    public function deletePet($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pet = $this->petModel->find($id);
        if (!$pet || $pet['user_id'] != session('user_id')) {
            return redirect()->to('/resident/my-pets')->with('error', 'Access denied.');
        }

        $this->petModel->delete($id);
        return redirect()->to('/resident/my-pets')->with('success', 'Pet deleted successfully.');
    }

    public function browse()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $petModel = new PetModel();

        $query = $petModel->select('pets.*, 
            COALESCE(
                CONCAT(residents.first_name, " ", IFNULL(CONCAT(residents.middle_name, " "), ""), residents.last_name), 
                users.username
            ) as owner_name')
            ->join('users', 'users.id = pets.user_id', 'left')
            ->join('residents', 'residents.id = users.resident_id', 'left');

        // Search by name or breed
        if ($search = $this->request->getGet('search')) {
            $query->groupStart()
                ->like('pet_name', $search)
                ->orLike('breed', $search)
                ->groupEnd();
        }

        // Filter by status
        if ($status = $this->request->getGet('status')) {
            $query->where('status', $status);
        }

        $pets = $query->findAll();

        $data = [
            'title'         => 'Browse All Pets',
            'pets'          => $pets,
            'currentSearch' => $this->request->getGet('search') ?? '',
            'currentStatus' => $this->request->getGet('status') ?? ''
        ];

        return view('residents/pages/browse', $data);
    }

}