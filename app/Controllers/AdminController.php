<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $petModel = new PetModel();

        $data = [
            'title'       => 'Admin Dashboard',
            'totalPets'   => $petModel->countAll(),
            'registered'  => $petModel->where('status', 'registered')->countAllResults(),
            'lost'        => $petModel->where('status', 'lost')->countAllResults(),
            'forAdoption' => $petModel->where('status', 'for_adoption')->countAllResults(),
        ];

        // Updated path: now points directly to the file name
        return view('admin/pages/dashboard', $data);  // No need for /index since the file is dashboard.php
    }
}