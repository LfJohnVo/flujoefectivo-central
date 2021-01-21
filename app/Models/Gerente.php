<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Gerente
 * @package App\Models
 * @version August 6, 2020, 6:41 am UTC
 *
 * @property \App\Models\Proyecto $idProyecto
 * @property \Illuminate\Database\Eloquent\Collection $depositos
 * @property integer $id_proyecto
 * @property string $nombre
 * @property string $email
 * @property string $password
 */
class Gerente extends Model
{

    public $table = 'gerentes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id_proyecto',
        'nombre',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'nombre' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_proyecto' => 'required',
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idProyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function depositos()
    {
        return $this->hasMany(\App\Models\Deposito::class, 'id_gerente');
    }
}
