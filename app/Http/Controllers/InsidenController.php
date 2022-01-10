<?php

namespace App\Http\Controllers;

use App\Models\Insiden;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\TextUI\XmlConfiguration\IniSetting;

class InsidenController extends Controller
{
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

        //membuat array untuk hari
        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
           );

        $insiden = Insiden::orderBy('id_insiden','DESC')->get();

        return view('dashboard.insiden')->with('insiden',$insiden)->with('hitung',$hitung)->with('daftar_hari',$daftar_hari);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $teknisi = User::get();

        $insiden = Insiden::select('kode_insiden')->max('kode_insiden');

        //pembuatan kode untuk insiden
        if ($insiden == null) {
            $kode_insiden = "IND00001";
        }else{
            $insiden = substr($insiden,3);
            $kode = (int) $insiden;
            $kode = $kode + 1;
            $kode_insiden = "IND". str_pad($kode,5,"0",STR_PAD_LEFT);
        }

        return view('dashboard.form-insiden')->with('teknisi',$teknisi)->with('kode_insiden',$kode_insiden);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $this->validate($request, [
            'kode_insiden' => 'required',
            'tgl' => 'required',
            'jam' => 'required',
            'alur' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'pengerjaan' => 'required',
            'analisis' => 'required',
            'solusi' => 'required',
            'eskalasi' => 'required',
            'status' => 'required',
            'teknisi' => 'required',
        ]);

        $tambah = new Insiden();
        $tambah->kode_insiden = $request['kode_insiden'];
        $tambah->tgl = $request['tgl'];
        $tambah->jam = $request['jam'];
        $tambah->penyampaian = $request['alur'];
        $tambah->lokasi = $request['lokasi'];
        $tambah->kategori = serialize($request['kategori']);
        $tambah->deskripsi = $request['deskripsi'];
        $tambah->pengerjaan = $request['pengerjaan'];
        $tambah->analisis = $request['analisis'];
        $tambah->solusi = $request['solusi'];
        $tambah->eskalasi = $request['eskalasi'];
        $tambah->status = $request['status'];
        $tambah->teknisi = serialize($request['teknisi']);

        $tambah->save();
        return redirect()->to('insiden');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $insiden = Insiden::find($id);
        return view('dashboard.detail-insiden')->with('insiden',$insiden);
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

    public function pending($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $pending = Insiden::find($id);
        $pending->status = "pending";
        $pending->save();
        return redirect()->to('insiden');
    }

    public function close($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $close = Insiden::find($id);
        $close->status = "close";
        $close->save();
        return redirect()->to('insiden');
    }
}
