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

        return view('pets/index', $data);
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

        return view('pets/create', $data);
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
            'is_approved'    => 1, // Auto-approve for now
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $this->petModel->insert($data);

        return redirect()->to('/pets')->with('success', 'Pet successfully registered!');
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
            'image'          => $this->request->getPost('image') ?: null,
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
}