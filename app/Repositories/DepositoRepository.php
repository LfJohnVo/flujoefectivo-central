<?php

namespace App\Repositories;

use App\Models\Deposito;
use App\Repositories\BaseRepository;

/**
 * Class DepositoRepository
 * @package App\Repositories
 * @version August 6, 2020, 6:39 am UTC
*/

class DepositoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_deposito',
        'tipo_traslado',
        'ingreso_dep_central',
        'ingreso_dep_cliente',
        'fecha_venta',
        'folios_traslado',
        'id_proyecto',
        'id_gerente'
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
        return Deposito::class;
    }
}
