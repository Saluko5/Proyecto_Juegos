<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consola
 *
 * @property $id
 * @property $nombre
 * @property $anho
 * @property $compania
 * @property $nota
 * @property $created_at
 * @property $updated_at
 *
 * @property Juego[] $juegos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consola extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'anho', 'compania', 'nota'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function juegos()
    {
        return $this->hasMany(\App\Models\Juego::class, 'id', 'plataforma_id');
    }
    
}
