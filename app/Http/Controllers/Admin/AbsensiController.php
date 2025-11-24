<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('admin.absensi.index');
    }
}
