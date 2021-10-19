<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teknisi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teknisi';
    protected $primaryKey = 'id_teknisi';
    protected $fillable = ['kode_teknisi','nama_teknisi','user_teknisi','password_teknisi'];
}
