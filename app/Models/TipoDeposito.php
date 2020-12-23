<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoDeposito
 * @package App\Models
 * @version December 23, 2020, 2:05 am UTC
 *
 * @property string $tipo
 * @property string $estatus
 * @property string|\Carbon\Carbon $update_at
 */
class TipoDeposito extends Model
{

    public $table = 'cat_depositos_tipo';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';




    public $fillable = [
        'tipo',
        'estatus',
        'update_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'string',
        'estatus' => 'string',
        'update_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required|string|max:50',
        'estatus' => 'nullable|string|max:8',
        'created_at' => 'nullable',
        'update_at' => 'nullable'
    ];


}
