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
        return view('dashboard.master-teknisi')->with('teknisi',$teknisi)->with('hitung',$hitung);
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
        $hapus->delete();

        return redirect()->to('teknisi');
    }

    public function ubah_password()
    {
        return view('dashboard.password');
    }
}
