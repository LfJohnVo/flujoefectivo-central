<?php

namespace App\Repositories;

use App\Models\Banco;
use App\Repositories\BaseRepository;

/**
 * Class BancoRepository
 * @package App\Repositories
 * @version December 8, 2020, 4:09 am UTC
*/

class BancoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'estatus',
        'update_at'
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
        return Banco::class;
    }
}
