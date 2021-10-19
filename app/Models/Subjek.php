<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjek extends Model
{
    use HasFactory;
    protected $table = 'subjek';
    protected $primaryKey = 'id_subjek';
    protected $fillable = ['kode_subjek','subjek'];
}
