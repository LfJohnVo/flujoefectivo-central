<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Models\Deposito;
use App\Models\TipoDeposito;
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
        $tdeposito = TipoDeposito::all();

        return view('depositos.create')->with('bancos', $bancos)->with('gerentes', $gerentes)->with('proyectos', $proyecto)->with('tdepositos', $tdeposito);
    }

    /**
     * Store a newly created Deposito in storage.
     *
     * @param CreateDepositoRequest $request
     *
     * @return Response
     */
    public function store()
    {
        $input = request()->all();

        $img = '';
        $foto = request()->file('archivo_pago');
        if ($foto != null) {
            $dataImg = $foto->get();
            $nombre_archivo = $foto->getBasename();
            $im = file_get_contents($foto);
            $imdata = base64_encode($im);
            $input['archivo_pago'] = $imdata;
            //$deposito = $this->depositoRepository->create($input);
        }

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
        $tdeposito = TipoDeposito::all();

        return view('depositos.edit')->with('deposito', $deposito)->with('bancos', $bancos)->with('gerentes', $gerentes)->with('proyectos', $proyecto)->with('tdepositos', $tdeposito);
    }

    /**
     * Update the specified Deposito in storage.
     *
     * @param int $id
     * @param UpdateDepositoRequest $request
     *
     * @return Response
     */
    public function update($id)
    {
        $input = request()->all();

        $deposito = $this->depositoRepository->find($id);

        if (empty($deposito)) {
            Flash::error('Deposito not found');

            return redirect(route('depositos.index'));
        }

        $img = '';
        $foto = request()->file('archivo_pago');
        //dd($foto);
        if ($foto != null) {
            $dataImg = $foto->get();
            $nombre_archivo = $foto->getBasename();
            $im = file_get_contents($foto);
            $imdata = base64_encode($im);
            $input['archivo_pago'] = $imdata;

            //$imagDep = Deposito::find();

        }

        //dd($imagDep);

        $deposito = $this->depositoRepository->update($input, $id);

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

    public function DownloadImg($id){
        $imagen = Deposito::find($id);
        //dd($imagen);
        $bin = base64_decode($imagen->archivo_pago);
        $path = "foto/" . $id . '-' . $imagen->created_at->toDateString() . ".jpeg";
        //dd($path);
        // Obtain the original content (usually binary data)
        // Load GD resource from binary data
        $im = imageCreateFromString($bin);
        //dd($im);
        // Make sure that the GD library was able to load the image
        // This is important, because you should not miss corrupted or unsupported images
        if (!$im) {
            die('Base64 value is not a valid image');
        }

        file_put_contents($path, $bin);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($path).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        flush(); // Flush system output buffer
        readfile($path);
        unlink($path);
    }
}
