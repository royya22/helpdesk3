<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        
        $unit = Unit::orderBy('id_unit','ASC')->get();

        //Perulangan untuk menghitung jumlah laporan berdasarkan unit per bulan di tahun ini dan jumlah laporan per unit (total kanan)
        $a = 1;
        foreach ($unit as $key) {
            $totalh[$a] = 0;
            for ($i=1; $i < 13; $i++) {
                $j = str_pad($i,2,"0",STR_PAD_LEFT);
                $laporan[$a][$i] = Laporan::where('created_at','like',date('Y-'.$j).'%')->where('unit','like',$key->kode_unit)->count();
                $j = (int) $j;
                $totalh[$a] = $totalh[$a] + $laporan[$a][$i]; //Menghitung jumlah laporan per teknisi (total kanan)
            }
            $a++;
        }

        //Perulangan untuk menghitung jumlah laporan per bulan (total bawah)
        for ($i=1; $i < 13; $i++) {
            $totalv[$i] = 0;
            $a = 1;
            foreach($unit as $key){
                $totalv[$i] = $totalv[$i] + $laporan[$a][$i];
                $a++;
            }
            
        }

        //Perulangan untuk menghitung jumlah laporan keseluruhan (total kanan bawah)
        $totalv[13] = 0;
        $a = 1;
        foreach($unit as $key){
            
            $totalv[13] = $totalv[13] + $totalh[$a];
            $a++;
        }

        //Dummy tampilan
        // echo "<br>";

        // $a = 1;
        // foreach ($unit as $key) {
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

        return view('dashboard.master-unit')->with('unit',$unit)->with('hitung',$hitung)->with('laporan',$laporan)->with('totalh',$totalh)->with('totalv',$totalv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Unit::select('kode_unit')->max('kode_unit');

        if ($data == null) {
            $kode_unit = "001";
        }else{
            $kode = (int) $data;
            $kode = $kode + 1;
            $kode_unit = str_pad($kode,3,"0",STR_PAD_LEFT);
        }
        
        return view('dashboard.form-unit')->with('kode_unit',$kode_unit);
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
            'unit' => 'required',
        ]);

        $tambah = new Unit();
        $tambah->kode_unit = $request['kode_unit'];
        $tambah->nama_unit = $request['unit'];

        $tambah->save();
        return redirect()->to('unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Unit::find($id);
        return view('dashboard.detail-unit')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Unit::find($id);
        return view('dashboard.edit-unit')->with('data',$data);
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
        $this->validate($request, [
            'unit' => 'required',
        ]);

        $update = Unit::where('id_unit',$id)->first();
        $update->kode_unit = $request['kode_unit'];
        $update->nama_unit = $request['unit'];

        $update->save();
        return redirect()->to('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Unit::find($id);
        $hapus->delete();

        return redirect()->to('unit');
    }
}
