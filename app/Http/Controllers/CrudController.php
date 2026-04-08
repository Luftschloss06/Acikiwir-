<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function tambah()
    {
        return view('tambah');
    }
    
    public function proses_tambah(Request $request)
    {
        //Aturan Validasi
        $rule_validasi = [
            'nim' => 'required|numeric',
            'nama'=> 'required',
        ];

        //Custom Message    
        $pesan_validasi = [
            'nim.required' => 'NIM harus di isi !',
            'nim.numeric' => 'NIM harus berupa Angka!',
            'nama.required' => 'Nama harus di isi!'
        ];

        //Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);
        return back();

    }
}
