<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['kode_unit','nama_unit'];

    /**
     * Get all of the laporan for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function laporan()
    // {
    //     return $this->belongsTo(Laporan::class, 'kode_unit', 'unit');
    // }
}
