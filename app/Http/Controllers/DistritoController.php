<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistritoRequest;
use App\Http\Requests\UpdateDistritoRequest;
use App\Repositories\DistritoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DistritoController extends AppBaseController
{
    /** @var  DistritoRepository */
    private $distritoRepository;

    public function __construct(DistritoRepository $distritoRepo)
    {
        $this->distritoRepository = $distritoRepo;
    }

    /**
     * Display a listing of the Distrito.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $distritos = $this->distritoRepository->all();

        return view('distritos.index')
            ->with('distritos', $distritos);
    }

    /**
     * Show the form for creating a new Distrito.
     *
     * @return Response
     */
    public function create()
    {
        return view('distritos.create');
    }

    /**
     * Store a newly created Distrito in storage.
     *
     * @param CreateDistritoRequest $request
     *
     * @return Response
     */
    public function store(CreateDistritoRequest $request)
    {
        $input = $request->all();

        $distrito = $this->distritoRepository->create($input);

        Flash::success('Distrito añadido.');

        return redirect(route('distritos.index'));
    }

    /**
     * Display the specified Distrito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distrito = $this->distritoRepository->find($id);

        if (empty($distrito)) {
            Flash::error('Distrito not found');

            return redirect(route('distritos.index'));
        }

        return view('distritos.show')->with('distrito', $distrito);
    }

    /**
     * Show the form for editing the specified Distrito.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distrito = $this->distritoRepository->find($id);

        if (empty($distrito)) {
            Flash::error('Distrito not found');

            return redirect(route('distritos.index'));
        }

        return view('distritos.edit')->with('distrito', $distrito);
    }

    /**
     * Update the specified Distrito in storage.
     *
     * @param int $id
     * @param UpdateDistritoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistritoRequest $request)
    {
        $distrito = $this->distritoRepository->find($id);

        if (empty($distrito)) {
            Flash::error('Distrito not found');

            return redirect(route('distritos.index'));
        }

        $distrito = $this->distritoRepository->update($request->all(), $id);

        Flash::success('Distrito actualizado.');

        return redirect(route('distritos.index'));
    }

    /**
     * Remove the specified Distrito from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distrito = $this->distritoRepository->find($id);

        if (empty($distrito)) {
            Flash::error('Distrito not found');

            return redirect(route('distritos.index'));
        }

        $this->distritoRepository->delete($id);

        Flash::success('Distrito eliminado.');

        return redirect(route('distritos.index'));
    }
}
