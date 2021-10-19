<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teknisi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teknisi';
    protected $primaryKey = 'id_teknisi';
    protected $fillable = ['kode_teknisi','nama_teknisi','user_teknisi','password_teknisi'];

    /**
     * Get all of the Laporan for the Sybjek
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'teknisi', 'kode_teknisi');
    }
}
