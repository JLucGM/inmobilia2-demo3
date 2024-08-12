<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Product;
use App\Models\Contacto;
use App\Models\Priority;
use App\Models\SettingGeneral;
use App\Models\TypeBusiness;
use App\Models\User;
use App\Notifications\Negocio\NegocioCreatedNotification;
use App\Notifications\Negocio\NegocioDeleteNotification;
use App\Notifications\Negocio\NegocioUpdatedNotification;
use Illuminate\Http\Request;

/**
 * Class NegocioController
 * @package App\Http\Controllers
 */
class NegocioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.negocios.index')->only('index');
        $this->middleware('can:admin.negocios.create')->only('create', 'store');
        $this->middleware('can:admin.negocios.edit')->only('edit', 'update');
        $this->middleware('can:admin.negocios.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negocios = Negocio::all();
        $SettingGeneral = SettingGeneral::first();
        // dd($settingGeneral);
        return view('negocio.index', compact('negocios', 'SettingGeneral'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $negocio = new Negocio();
        $contactos = Contacto::all()->pluck('name', 'id');
        $propiedades = Product::all()->pluck('name', 'id');
        $agente =  User::whereHas("roles", function ($q) {
            $q->where("name", "Arrendador")->orWhere("name", 'Vendedor');
        })->pluck('name', 'id');
        $priorities = Priority::all();
        $typebusiness = TypeBusiness::all();

        return view('negocio.create', compact('negocio', 'contactos', 'propiedades', 'agente', 'priorities', 'typebusiness'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Negocio::$rules);
        // dd($request);
        $negocio = Negocio::create($request->all());

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($negocio->agente_id);

        foreach ($admins as $admin) {
            $admin->notify(new NegocioCreatedNotification($negocio));
        }

        $agenteAsignado->notify(new NegocioCreatedNotification($negocio));

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $negocio = Negocio::find($id);

        return view('negocio.show', compact('negocio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negocio = Negocio::find($id);
        $contactos = Contacto::all()->pluck('name', 'id');
        $propiedades = Product::all()->pluck('name', 'id');
        $agente =  User::whereHas("roles", function ($q) {
            $q->where("name", "Arrendador")->orWhere("name", 'Vendedor');
        })->pluck('name', 'id');
        $priorities = Priority::all();
        $typebusiness = TypeBusiness::all();

        return view('negocio.edit', compact('negocio', 'contactos', 'propiedades', 'agente', 'priorities', 'typebusiness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Negocio $negocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocio $negocio)
    {
        request()->validate(Negocio::$rules);

        $negocio->update($request->all());

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($negocio->agente_id);

        foreach ($admins as $admin) {
            $admin->notify(new NegocioUpdatedNotification($negocio));
        }

        $agenteAsignado->notify(new NegocioUpdatedNotification($negocio));

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $negocio = Negocio::find($id);
        $agenteId = $negocio->agente_id;
        $negocio->delete();

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($agenteId);

        foreach ($admins as $admin) {
            $admin->notify(new NegocioDeleteNotification($negocio));
        }

        $agenteAsignado->notify(new NegocioDeleteNotification($negocio));

        return redirect()->route('negocios.index')
            ->with('success', 'Negocio deleted successfully');
    }


    public function negocioStatus($status, $negocioId)
    {
        $negocio = Negocio::find($negocioId);
        $negocio->status = $status;

        $negocio->save();

        return redirect()->back();
    }
}
