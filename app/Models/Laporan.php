<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['kode_permohonan','nama_pemohon','no_tlp','unit','ruangan','subjek','deskripsi','status','keterangan_pending','keterangan_close','teknisi'];

    /**
     * Get the unit that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class,'unit','kode_unit');
    }

    /**
     * Get the subjek that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_subjek(): BelongsTo
    {
        return $this->belongsTo(Subjek::class, 'subjek','kode_subjek');
    }

    /**
     * Get the teknisi that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_teknisi(): BelongsTo
    {
        return $this->belongsTo(Teknisi::class, 'teknisi', 'kode_teknisi');
    }

    /**
     * Get the teknisi that owns the Laporan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teknisi', 'kode_teknisi');
    }
}
