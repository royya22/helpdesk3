<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CekController;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->forget('nama');
        return view('login');
    }

    public function cek_login(Request $request)
    {
        $user = $request['user'];
        $user = User::where('user_teknisi','like',$user)->first();
        

        if (empty($user)) {
            // echo "Username tidak ditemukan!";
            // $_SESSION['pesan'] = "Username tidak ditemukan!";
            return redirect()->to('login?pesan=gagal1');
        }else {
            $pass = Hash::check($request['pass'],$user->password_teknisi);
            // echo $pass;

            if (!empty($user) && $pass == 1) {
                // if ($user->user_teknisi == "bsid") {
                    // echo "Hai ADMIN";
                    // $_SESSION['username'] = $user->user_teknisi;
		            // $_SESSION['nama'] = $user->nama_teknisi;
                    $request->session()->put('username',$user->user_teknisi);
                    $request->session()->put('nama',$user->nama_teknisi);
                // }else {
                //     echo "Hai USER";
                // }
                return redirect()->to('dashboard');
            }else{
                // echo "Username dan Password tidak sesuai!";
                // $_SESSION['pesan'] = "Username dan Password tidak sesuai!";
                return redirect()->to('login?pesan=gagal2');
            }
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }

        $hitung['open'] = Laporan::where('status','like','1')->count();
        $hitung['pending'] = Laporan::where('status','like','2')->count();
        $hitung['close'] = Laporan::where('status','like','3')->count();
        
        return view('dashboard.index')->with('hitung',$hitung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
