<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Teknisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hitung['open'] = Laporan::where('status','like','1')->count();
        $hitung['pending'] = Laporan::where('status','like','2')->count();
        $hitung['close'] = Laporan::where('status','like','3')->count();

        $teknisi = User::orderBy('id_teknisi','ASC')->get();

        //Perulangan untuk menghitung jumlah laporan berdasarkan teknisi per bulan di tahun ini dan jumlah laporan per teknisi (total kanan)
        $a = 1;
        foreach ($teknisi as $key) {
            $totalh[$a] = 0;
            for ($i=1; $i < 13; $i++) {
                $j = str_pad($i,2,"0",STR_PAD_LEFT);
                $laporan[$a][$i] = Laporan::where('created_at','like',date('Y-'.$j).'%')->where('teknisi','like',$key->kode_teknisi)->count();
                $j = (int) $j;
                $totalh[$a] = $totalh[$a] + $laporan[$a][$i]; //Menghitung jumlah laporan per teknisi (total kanan)
            }
            $a++;
        }

        //Perulangan untuk menghitung jumlah laporan per bulan (total bawah)
        for ($i=1; $i < 13; $i++) {
            $totalv[$i] = 0;
            $a = 1;
            foreach($teknisi as $key){
                $totalv[$i] = $totalv[$i] + $laporan[$a][$i];
                $a++;
            }
            
        }

        //Perulangan untuk menghitung jumlah laporan keseluruhan (total kanan bawah)
        $totalv[13] = 0;
        $a = 1;
        foreach($teknisi as $key){
            
            $totalv[13] = $totalv[13] + $totalh[$a];
            $a++;
        }

        //Dummy tampilan
        // echo "<br>";

        // $a = 1;
        // foreach ($teknisi as $key) {
        //     for ($i=1; $i < 13; $i++) { 
        //         echo $laporan[$a][$i]." ";
                
        //     }
        //     echo $totalh[$a];
        //     $a++;
        //     echo "<br>";
        // }

        // // $totalv[$i] = 0;
        // for ($i=1; $i < 13; $i++) {
            
        //     echo $totalv[$i]." ";
        // } echo $totalv[13];

        return view('dashboard.master-teknisi')->with('teknisi',$teknisi)->with('hitung',$hitung)->with('laporan',$laporan)->with('totalh',$totalh)->with('totalv',$totalv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::select('kode_teknisi')->max('kode_teknisi');
        // echo $data;
        if ($data == null) {
            $kode_teknisi = "T001";
        }else{
            $data = substr($data,1);
            $kode = (int) $data;
            // echo $kode;
            $kode = $kode + 1;
            $kode_teknisi = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kode_teknisi = "T". $kode_teknisi;
        }

        // echo $kode_teknisi;
        
        return view('dashboard.form-teknisi')->with('kode_teknisi',$kode_teknisi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_teknisi' => 'required',
            'user_teknisi' => 'required|unique:teknisi',
            'password' => 'required|min:3|confirmed',
        ]);

        $tambah = new User();
        $tambah->kode_teknisi = $request['kode_teknisi'];
        $tambah->nama_teknisi = $request['nama_teknisi'];
        $tambah->user_teknisi = strtolower($request['user_teknisi']);
        $tambah->password_teknisi = Hash::make($request['password']);
        $tambah->save();

        return redirect()->to('teknisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('dashboard.detail-teknisi')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('dashboard.edit-teknisi')->with('data',$data);
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
        $update = User::where('id_teknisi',$id)->first();

        if ($request['user_teknisi'] == $update->user_teknisi) {
            $this->validate($request, [
                'nama_teknisi' => 'required',
                'user_teknisi' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'nama_teknisi' => 'required',
                'user_teknisi' => 'required|unique:teknisi',
            ]);
        }

        // $tambah = new User();
        // $tambah->kode_teknisi = $request['kode_teknisi'];
        $update->nama_teknisi = $request['nama_teknisi'];
        $update->user_teknisi = strtolower($request['user_teknisi']);
        // $tambah->password_teknisi = Hash::make($request['password']);
        $update->save();

        return redirect()->to('teknisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = User::find($id);
        foreach($hapus->laporan as $laporan){
            $laporan->delete();
        }
        $hapus->delete();

        return redirect()->to('teknisi');
    }

    public function ubah_password()
    {
        return view('dashboard.password');
    }
}
