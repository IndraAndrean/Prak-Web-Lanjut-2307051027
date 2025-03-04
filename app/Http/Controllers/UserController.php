<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){

        return view('create_user');
    }
    
 public function store(Request $request)
{
    
    $nama = $request->input('nama');
    $npm = $request->input('npm');
    $kelas = $request->input('kelas');

    return view('profile')->with([
        'nama' => $nama,
        'npm' => $npm,
        'kelas' => $kelas,
    ]);
}

}