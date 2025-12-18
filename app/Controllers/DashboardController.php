<?php

namespace App\Controllers;

use App\Models\PetModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $petModel = new PetModel();
        $pets = $petModel->findAll();

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
            'title'        => 'Admin Dashboard',
            'totalPets'    => $totalPets,
            'registered'   => $statusCount['registered'],
            'lost'         => $statusCount['lost'],
            'forAdoption'  => $statusCount['for_adoption'],
            'statusCount'  => $statusCount, // For chart
        ];

        return view('dashboard/index', $data);
    }
}