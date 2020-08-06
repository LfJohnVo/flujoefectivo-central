<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Distrito
 * @package App\Models
 * @version August 6, 2020, 6:40 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $proyectos
 * @property string $distrito
 * @property string $identificador
 */
class Distrito extends Model
{

    public $table = 'distritos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'distrito',
        'identificador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'distrito' => 'string',
        'identificador' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'distrito' => 'required|string|max:255',
        'identificador' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'id_distrito');
    }
}
