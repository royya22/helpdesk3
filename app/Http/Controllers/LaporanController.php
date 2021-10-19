<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Subjek;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::orderBy('status','ASC')->orderBy('id_laporan','DESC')->with('k_unit')->with('k_subjek')->get();
        // $unit = Unit::orderBy('id_unit','ASC')->get();
        // $subjek = Subjek::orderBy('id_subjek','ASC')->get();
        // echo $laporan->kode_permohonan;
        return view('queue')->with('laporan', $laporan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::orderBy('id_unit','ASC')->get();
        $subjek = Subjek::orderBy('id_subjek','ASC')->get();
        return view('form')->with('unit',$unit)->with('subjek',$subjek);
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
            'nama' => 'required',
            'no_tlp' => 'required',
            'unit' => 'required',
            'ruangan' => 'required',
            'subjek' => 'required',
            'deskripsi' => 'required'
        ]);

        $kode = $request['subjek'] ."". $request['unit'] ."". date('y');
        // echo $kode;
        $kode_terakhir = Laporan::select('kode_permohonan')->where('kode_permohonan','like',$kode .'%')->first();
        // echo $kode_terakhir;
        if (!empty($kode_terakhir)) {
            $angka = substr($kode_terakhir->kode_permohonan,8);
            // echo $angka;
            $angka = (int) $angka + 1;
            $angka = str_pad($angka,3,"0",STR_PAD_LEFT);
        } else {
            $angka = "001";
        }
        
        $kode = $kode ."". $angka;
        // echo $kode;

        $tambah = new Laporan();
        $tambah->kode_permohonan = $kode;
        $tambah->nama_pemohon = $request['nama'];
        $tambah->no_tlp = $request['no_tlp'];
        $tambah->unit = $request['unit'];
        $tambah->ruangan = $request['ruangan'];
        $tambah->subjek = $request['subjek'];
        $tambah->deskripsi = $request['deskripsi'];
        $tambah->status = "1";

        $tambah->save();
        // echo "halo";
        return view('sent')->with('data',$tambah);
        // return redirect()->to('laporan');
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
