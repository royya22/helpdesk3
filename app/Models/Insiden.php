<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Insiden extends Model
{
    use HasFactory;
    protected $table = 'insiden';
    protected $primaryKey = 'id_insiden';
    protected $fillable = ['kode_insiden','tgl','jam','penyampaian','lokasi','kategori','deskripsi','pengerjaan','analisi','solusi','eskalasi','status','teknisi'];

    /**
     * Get the teknisi that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_teknisi(): BelongsTo
    {
        return $this->belongsTo(Teknisi::class, 'teknisi', 'kode_teknisi');
    }
}
