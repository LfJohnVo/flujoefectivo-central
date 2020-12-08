<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Repositories\DepositoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Banco;
use App\Models\Gerente;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepositoController extends AppBaseController
{
    /** @var  DepositoRepository */
    private $depositoRepository;

    public function __construct(DepositoRepository $depositoRepo)
    {
        $this->depositoRepository = $depositoRepo;
    }

    /**
     * Display a listing of the Deposito.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $depositos = $this->depositoRepository->all();

        return view('depositos.index')
            ->with('depositos', $depositos);
    }

    /**
     * Show the form for creating a new Deposito.
     *
     * @return Response
     */
    public function create()
    {
        $bancos = Banco::all();
        $gerentes = Gerente::all();
        $proyecto = Proyecto::all();

        return view('depositos.create')->with('bancos', $bancos)->with('gerentes', $gerentes)->with('proyectos', $proyecto);
    }

    /**
     * Store a newly created Deposito in storage.
     *
     * @param CreateDepositoRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositoRequest $request)
    {
        $input = $request->all();

        $deposito = $this->depositoRepository->create($input);

        Flash::success('Deposito añadido.');

        return redirect(route('depositos.index'));
    }

    /**
     * Display the specified Deposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        return view('depositos.show')->with('deposito', $deposito);
    }

    /**
     * Show the form for editing the specified Deposito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $bancos = Banco::all();
        $gerentes = Gerente::all();
        $proyecto = Proyecto::all();

        return view('depositos.edit')->with('deposito', $deposito)->with('bancos', $bancos)->with('gerentes', $gerentes)->with('proyectos', $proyecto);;
    }

    /**
     * Update the specified Deposito in storage.
     *
     * @param int $id
     * @param UpdateDepositoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositoRequest $request)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $deposito = $this->depositoRepository->update($request->all(), $id);

        Flash::success('Deposito actualizado.');

        return redirect(route('depositos.index'));
    }

    /**
     * Remove the specified Deposito from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $this->depositoRepository->delete($id);

        Flash::success('Deposito eliminado.');

        return redirect(route('depositos.index'));
    }
}
