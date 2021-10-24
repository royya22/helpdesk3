<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CekController extends Controller
{
    // menampilkan isi session
	public function tampilkanSession(Request $request) {
		if($request->session()->has('nama')){
			echo $request->session()->get('nama');
		}else{
			echo 'Tidak ada data dalam session.';
		}
	}
 
	// membuat session
	public function buatSession(Request $request) {
		$request->session()->put('nama','Diki Alfarabi Hadi');
		echo "Data telah ditambahkan ke session.";
	}
 
	// menghapus session
	public function hapusSession(Request $request) {
		$request->session()->forget('nama');
		echo "Data telah dihapus dari session.";
	}

    public function cekSession(){
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
    }
}
