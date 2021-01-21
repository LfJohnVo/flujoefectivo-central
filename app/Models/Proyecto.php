<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Proyecto
 * @package App\Models
 * @version August 6, 2020, 6:42 am UTC
 *
 * @property \App\Models\Distrito $idDistrito
 * @property \Illuminate\Database\Eloquent\Collection $depositos
 * @property \Illuminate\Database\Eloquent\Collection $gerentes
 * @property integer $no_proyecto
 * @property string $Nombre
 * @property integer $id_distrito
 */
class Proyecto extends Model
{

    public $table = 'proyecto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'no_proyecto',
        'Nombre',
        'id_distrito'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_proyecto' => 'integer',
        'Nombre' => 'string',
        'id_distrito' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_proyecto' => 'required|integer',
        'Nombre' => 'required|string|max:255',
        'id_distrito' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idDistrito()
    {
        return $this->belongsTo(\App\Models\Distrito::class, 'id_distrito');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function depositos()
    {
        return $this->hasMany(\App\Models\Deposito::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gerentes()
    {
        return $this->hasMany(\App\Models\Gerente::class, 'id_proyecto');
    }
}
