<?php

namespace App\Http\Controllers;

use App\Models\Insiden;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class InsidenController extends Controller
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
        $teknisi = User::get();

        $insiden = Insiden::select('kode_insiden')->max('kode_insiden');

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

        // print_r(unserialize($tambah->kategori));
        // echo $tambah->kode_insiden;

        $tambah->save();
        return redirect()->to('insiden');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return view('dashboard.Insiden-detail');
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
