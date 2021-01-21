<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class distrital
 * @package App\Models
 * @version December 8, 2020, 4:11 am UTC
 *
 * @property string $nombre
 * @property string $clave_distrito
 * @property integer $id_regional
 * @property string $estatus
 */
class distrital extends Model
{

    public $table = 'distritales';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre',
        'clave_distrito',
        'id_regional',
        'estatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'clave_distrito' => 'string',
        'id_regional' => 'integer',
        'estatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:50',
        'clave_distrito' => 'nullable|string|max:20',
        'id_regional' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'estatus' => 'nullable|string|max:1'
    ];


}
