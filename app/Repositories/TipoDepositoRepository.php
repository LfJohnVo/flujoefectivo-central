<?php

namespace App\Repositories;

use App\Models\TipoDeposito;
use App\Repositories\BaseRepository;

/**
 * Class TipoDepositoRepository
 * @package App\Repositories
 * @version December 23, 2020, 2:05 am UTC
*/

class TipoDepositoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
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
        return TipoDeposito::class;
    }
}
