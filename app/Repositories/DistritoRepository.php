<?php

namespace App\Repositories;

use App\Models\Distrito;
use App\Repositories\BaseRepository;

/**
 * Class DistritoRepository
 * @package App\Repositories
 * @version August 6, 2020, 6:40 am UTC
*/

class DistritoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'distrito',
        'identificador'
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
        return Distrito::class;
    }
}
