<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoDepositoRequest;
use App\Http\Requests\UpdateTipoDepositoRequest;
use App\Repositories\TipoDepositoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipoDepositoController extends AppBaseController
{
    /** @var  TipoDepositoRepository */
    private $tipoDepositoRepository;

    public function __construct(TipoDepositoRepository $tipoDepositoRepo)
    {
        $this->tipoDepositoRepository = $tipoDepositoRepo;
    }

    /**
     * Display a listing of the TipoDeposito.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoDepositos = $this->tipoDepositoRepository->all();

        return view('tipo_depositos.index')
            ->with('tipoDepositos', $tipoDepositos);
    }

    /**
     * Show the form for creating a new TipoDeposito.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_depositos.create');
    }

    /**
     * Store a newly created TipoDeposito in storage.
     *
     * @param CreateTipoDepositoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDepositoRequest $request)
    {
        $input = $request->all();

        $tipoDeposito = $this->tipoDepositoRepository->create($input);

        Flash::success('Tipo Deposito añadido.');

        return redirect(route('tipoDepositos.index'));
    }

    /**
     * Display the specified TipoDeposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDeposito = $this->tipoDepositoRepository->find($id);

        if (empty($tipoDeposito)) {
            Flash::error('Tipo Deposito not found');

            return redirect(route('tipoDepositos.index'));
        }

        return view('tipo_depositos.show')->with('tipoDeposito', $tipoDeposito);
    }

    /**
     * Show the form for editing the specified TipoDeposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDeposito = $this->tipoDepositoRepository->find($id);

        if (empty($tipoDeposito)) {
            Flash::error('Tipo Deposito not found');

            return redirect(route('tipoDepositos.index'));
        }

        return view('tipo_depositos.edit')->with('tipoDeposito', $tipoDeposito);
    }

    /**
     * Update the specified TipoDeposito in storage.
     *
     * @param int $id
     * @param UpdateTipoDepositoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDepositoRequest $request)
    {
        $tipoDeposito = $this->tipoDepositoRepository->find($id);

        if (empty($tipoDeposito)) {
            Flash::error('Tipo Deposito not found');

            return redirect(route('tipoDepositos.index'));
        }

        $tipoDeposito = $this->tipoDepositoRepository->update($request->all(), $id);

        Flash::success('Tipo Deposito actualizado.');

        return redirect(route('tipoDepositos.index'));
    }

    /**
     * Remove the specified TipoDeposito from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDeposito = $this->tipoDepositoRepository->find($id);

        if (empty($tipoDeposito)) {
            Flash::error('Tipo Deposito not found');

            return redirect(route('tipoDepositos.index'));
        }

        $this->tipoDepositoRepository->delete($id);

        Flash::success('Tipo Deposito eliminado.');

        return redirect(route('tipoDepositos.index'));
    }
}
