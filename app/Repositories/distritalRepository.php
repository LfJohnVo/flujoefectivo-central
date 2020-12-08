<?php

namespace App\Repositories;

use App\Models\distrital;
use App\Repositories\BaseRepository;

/**
 * Class distritalRepository
 * @package App\Repositories
 * @version December 8, 2020, 4:11 am UTC
*/

class distritalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'clave_distrito',
        'id_regional',
        'estatus'
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
        return distrital::class;
    }
}
