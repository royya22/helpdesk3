<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Subjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjekController extends Controller
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
        
        //Ambil data untuk perhitungan open, pending, close di menu
        $hitung['open'] = Laporan::where('status','like','1')->count();
        $hitung['pending'] = Laporan::where('status','like','2')->count();
        $hitung['close'] = Laporan::where('status','like','3')->count();

        $subjek = Subjek::orderBy('id_subjek','ASC')->where('hide',false)->get();

        //Perulangan untuk menghitung jumlah laporan berdasarkan subjek per bulan di tahun ini dan jumlah laporan per subjek (total kanan)
        $a = 1;
        foreach ($subjek as $key) {
            $totalh[$a] = 0;
            for ($i=1; $i < 13; $i++) {
                $j = str_pad($i,2,"0",STR_PAD_LEFT);
                $laporan[$a][$i] = Laporan::where('created_at','like',date('Y-'.$j).'%')->where('subjek','like',$key->kode_subjek)->count();
                $j = (int) $j;
                $totalh[$a] = $totalh[$a] + $laporan[$a][$i]; //Menghitung jumlah laporan per subjek (total kanan)
            }
            $a++;
        }

        //Perulangan untuk menghitung jumlah laporan per bulan (total bawah)
        for ($i=1; $i < 13; $i++) {
            $totalv[$i] = 0;
            $a = 1;
            foreach($subjek as $key){
                $totalv[$i] = $totalv[$i] + $laporan[$a][$i];
                $a++;
            }
            
        }

        //Perulangan untuk menghitung jumlah laporan keseluruhan (total kanan bawah)
        $totalv[13] = 0;
        $a = 1;
        foreach($subjek as $key){
            
            $totalv[13] = $totalv[13] + $totalh[$a];
            $a++;
        }
        
        return view('dashboard.master-subjek')->with('subjek',$subjek)->with('hitung',$hitung)->with('laporan',$laporan)->with('totalh',$totalh)->with('totalv',$totalv);
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
        
        return view('dashboard.form-subjek');
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
            'kode_subjek' => 'required|unique:subjek',
            'subjek' => 'required'
        ]);

        $tambah = new Subjek();
        $tambah->kode_subjek = strtoupper($request['kode_subjek']);
        $tambah->subjek = $request['subjek'];

        $tambah->save();
        return redirect()->to('subjek');
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
        
        $data = Subjek::find($id);
        return view('dashboard.detail-subjek')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Subjek::find($id);
        return view('dashboard.edit-subjek')->with('data',$data);
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
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $update = Subjek::where('id_subjek',$id)->first();

        if ($request['kode_subjek'] == $update->kode_subjek) {
            $this->validate($request, [
                'kode_subjek' => 'required',
                'subjek' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'kode_subjek' => 'required|unique:subjek',
                'subjek' => 'required'
            ]);
        }

        $subjek_baru = strtoupper($request['kode_subjek']);

        //Update laporan terkait
        foreach ($update->laporan as $laporan) {
            $kode = substr($laporan->kode_permohonan,3);
            
            $laporan->update(['kode_permohonan' => $subjek_baru ."".$kode ]);
            $laporan->update(['subjek' => $subjek_baru]);
        }

        $update->kode_subjek = $subjek_baru;
        $update->subjek = $request['subjek'];

        //update subjek
        $update->save();
        return redirect()->to('subjek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $hapus = Subjek::find($id);
        $hapus->hide = true;
        $hapus->save();

        return redirect()->to('subjek');
    }

    public function cetak_pdf()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }

        $subjek = Subjek::orderBy('id_subjek','ASC')->where('hide',false)->get();

        //Perulangan untuk menghitung jumlah laporan berdasarkan subjek per bulan di tahun ini dan jumlah laporan per subjek (total kanan)
        $a = 1;
        foreach ($subjek as $key) {
            $totalh[$a] = 0;
            for ($i=1; $i < 13; $i++) {
                $j = str_pad($i,2,"0",STR_PAD_LEFT);
                $laporan[$a][$i] = Laporan::where('created_at','like',date('Y-'.$j).'%')->where('subjek','like',$key->kode_subjek)->count();
                $j = (int) $j;
                $totalh[$a] = $totalh[$a] + $laporan[$a][$i]; //Menghitung jumlah laporan per subjek (total kanan)
            }
            $a++;
        }

        //Perulangan untuk menghitung jumlah laporan per bulan (total bawah)
        for ($i=1; $i < 13; $i++) {
            $totalv[$i] = 0;
            $a = 1;
            foreach($subjek as $key){
                $totalv[$i] = $totalv[$i] + $laporan[$a][$i];
                $a++;
            }
            
        }

        //Perulangan untuk menghitung jumlah laporan keseluruhan (total kanan bawah)
        $totalv[13] = 0;
        $a = 1;
        foreach($subjek as $key){
            
            $totalv[13] = $totalv[13] + $totalh[$a];
            $a++;
        }
        
        return view('dashboard.cetak-subjek')->with('subjek',$subjek)->with('laporan',$laporan)->with('totalh',$totalh)->with('totalv',$totalv);
    }
}
