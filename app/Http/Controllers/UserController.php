<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User', // Judul yang lebih sesuai
            'users' => $this->userModel->getUser(), // Ambil daftar user
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->all();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request) // Menggunakan Request seperti yang Anda berikan
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        // Redirect ke halaman /user setelah menyimpan data
        return redirect()->to('/user');
    }
}