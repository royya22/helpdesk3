<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'id_teknisi';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'kode_teknisi',
        'nama_teknisi',
        'user_teknisi',
        'password_teknisi'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password_teknisi',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

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
