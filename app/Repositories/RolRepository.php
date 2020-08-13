<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Repositories\BaseRepository;

/**
 * Class RolRepository
 * @package App\Repositories
 * @version August 6, 2020, 6:42 am UTC
*/

class RolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'id_users'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rol::class;
    }
}
