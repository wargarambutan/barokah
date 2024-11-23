<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeluhanPelangganController extends Controller
{

    public function index()
    {

        return view('admin.keluhan.keluhan_pelanggan');
    }
}
