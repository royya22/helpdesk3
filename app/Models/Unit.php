<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'unit';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['kode_unit','nama_unit','biro'];

    /**
     * Get all of the Laporan for the Sybjek
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'unit', 'kode_unit');
    }
}
