<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Rol
 * @package App\Models
 * @version August 6, 2020, 6:42 am UTC
 *
 * @property \App\Models\User $idUsers
 * @property string $nombre
 * @property integer $id_users
 */
class Rol extends Model
{

    public $table = 'roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre',
        'id_users'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'id_users' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:150',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_users' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUsers()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users');
    }
}
