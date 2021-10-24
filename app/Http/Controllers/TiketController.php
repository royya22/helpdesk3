<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TiketController extends Controller
{
    public function open()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::where('status','like','1')->orderBy('id_laporan','DESC')->get();
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
        return view('dashboard.open')->with('data',$data)->with('hitung',$hitung)->with('daftar_hari',$daftar_hari);
    }

    public function pending()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::where('status','like','2')->orderBy('id_laporan','DESC')->get();
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
        return view('dashboard.pending')->with('data',$data)->with('hitung',$hitung)->with('daftar_hari',$daftar_hari);
    }

    public function form_pending($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::find($id);
        return view('dashboard.form-pending')->with('data',$data);
    }

    public function store_pending(Request $request, $id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $this->validate($request, [
            'keterangan_pending' => 'required',
            // 'teknisi' => 'required'
        ]);

        $pending = Laporan::find($id);
        $pending->keterangan_pending = $request['keterangan_pending'];
        $pending->status = "2";
        $pending->save();
        return redirect()->to('pending');
    }

    public function close()
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::where('status','like','3')->orderBy('id_laporan','DESC')->get();
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
        return view('dashboard.close')->with('data',$data)->with('hitung',$hitung)->with('daftar_hari',$daftar_hari);
    }

    public function form_close($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::find($id);
        return view('dashboard.form-close')->with('data',$data);
    }

    public function store_close(Request $request, $id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $this->validate($request, [
            'keterangan_close' => 'required',
            // 'teknisi' => 'required'
        ]);

        $pending = Laporan::find($id);
        $pending->keterangan_close = $request['keterangan_close'];
        $pending->status = "3";
        $pending->save();
        return redirect()->to('close');
    }

    public function close_detail($id)
    {
        //Cek Login
        if (!Session::has('username')) {
            return redirect()->to('/');
        }
        
        $data = Laporan::find($id);
        $daftar_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
           );
        return view('dashboard.close-detail')->with('data',$data)->with('daftar_hari',$daftar_hari);
    }
}
