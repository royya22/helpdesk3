<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insiden extends Model
{
    use HasFactory;
    protected $table = 'insiden';
    protected $primaryKey = 'id_insiden';
    protected $fillable = ['kode_insiden','tgl','jam','penyampaian','lokasi','kategori','deskripsi','pengerjaan','analisi','solusi','eskalasi','status','teknisi'];
}
