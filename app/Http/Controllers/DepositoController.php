<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Repositories\DepositoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
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
        //$depositos = $this->depositoRepository->all();
        $depositos = DB::table('depositos')
            ->join('proyecto', 'depositos.id_proyecto', '=', 'proyecto.id')
            ->join('gerentes', 'depositos.id_gerente', '=', 'gerentes.id')
            ->select('depositos.*', 'proyecto.Nombre as proyectonombre' , 'gerentes.nombre as gerentenombre')
            ->orderByDesc('created_at')
            ->paginate(31);

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
        $proyectos = DB::table('proyecto')->select('id', 'nombre')->get();
        $gerentes = DB::table('gerentes')->select('id', 'nombre')->get();
        return view('depositos.create')->with("proyectos", $proyectos)->with("gerentes", $gerentes);
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
        $proyectos = DB::table('proyecto')->select('id', 'nombre')->get();
        $gerentes = DB::table('gerentes')->select('id', 'nombre')->get();

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        return view('depositos.edit')->with('deposito', $deposito)->with("proyectos", $proyectos)->with("gerentes", $gerentes);
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
