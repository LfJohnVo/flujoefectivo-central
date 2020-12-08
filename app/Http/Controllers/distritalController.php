<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedistritalRequest;
use App\Http\Requests\UpdatedistritalRequest;
use App\Repositories\distritalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class distritalController extends AppBaseController
{
    /** @var  distritalRepository */
    private $distritalRepository;

    public function __construct(distritalRepository $distritalRepo)
    {
        $this->distritalRepository = $distritalRepo;
    }

    /**
     * Display a listing of the distrital.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $distritals = $this->distritalRepository->all();

        return view('distritals.index')
            ->with('distritals', $distritals);
    }

    /**
     * Show the form for creating a new distrital.
     *
     * @return Response
     */
    public function create()
    {
        return view('distritals.create');
    }

    /**
     * Store a newly created distrital in storage.
     *
     * @param CreatedistritalRequest $request
     *
     * @return Response
     */
    public function store(CreatedistritalRequest $request)
    {
        $input = $request->all();

        $distrital = $this->distritalRepository->create($input);

        Flash::success('Distrital saved successfully.');

        return redirect(route('distritals.index'));
    }

    /**
     * Display the specified distrital.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        return view('distritals.show')->with('distrital', $distrital);
    }

    /**
     * Show the form for editing the specified distrital.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        return view('distritals.edit')->with('distrital', $distrital);
    }

    /**
     * Update the specified distrital in storage.
     *
     * @param int $id
     * @param UpdatedistritalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedistritalRequest $request)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        $distrital = $this->distritalRepository->update($request->all(), $id);

        Flash::success('Distrital updated successfully.');

        return redirect(route('distritals.index'));
    }

    /**
     * Remove the specified distrital from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distrital = $this->distritalRepository->find($id);

        if (empty($distrital)) {
            Flash::error('Distrital not found');

            return redirect(route('distritals.index'));
        }

        $this->distritalRepository->delete($id);

        Flash::success('Distrital deleted successfully.');

        return redirect(route('distritals.index'));
    }
}
