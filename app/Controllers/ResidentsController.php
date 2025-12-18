<?php

namespace App\Controllers;

use App\Models\ResidentModel;

class ResidentsController extends BaseController
{
    protected $perPage = 15;

    public function index()
    {
        if (!session()->has('user_id') || session('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Admins only');
        }

        $model = new ResidentModel();

        $residents = $model->orderBy('full_name', 'ASC')->paginate($this->perPage);

        $uniqueBarangays = $model->select('barangay')->distinct()->findAll();

        $data = [
            'title'           => 'Residents',
            'residents'       => $residents,
            'totalResidents'  => $model->countAll(),
            'barangayCount'   => count($uniqueBarangays),
            'pager'           => $model->pager
        ];

        return view('residents/index', $data);
    }

    public function delete($id)
    {
        if (!session()->has('user_id') || session('role') !== 'admin') {
            return redirect()->to('/residents')->with('error', 'Admins only');
        }

        $model = new ResidentModel();
        $model->delete($id);

        return redirect()->to('/residents')->with('success', 'Resident deleted');
    }
}