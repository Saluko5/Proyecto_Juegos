<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Juego
 *
 * @property $id
 * @property $nombre
 * @property $anho
 * @property $plataforma_id
 * @property $nota
 * @property $created_at
 * @property $updated_at
 *
 * @property Consola $consola
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Juego extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'anho', 'plataforma_id', 'nota'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consola()
    {
        return $this->belongsTo(\App\Models\Consola::class, 'plataforma_id', 'id');
    }
    
}
