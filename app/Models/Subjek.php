<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjek extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subjek';
    protected $primaryKey = 'id_subjek';
    protected $fillable = ['kode_subjek','subjek'];

    /**
     * Get all of the Laporan for the Sybjek
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'subjek', 'kode_subjek');
    }
}
