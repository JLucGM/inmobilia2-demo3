<?php

namespace App\Http\Controllers;

use App\Mail\Anunciar\NuevoRegistro;
use App\Mail\Contacto\NuevoContacto;
use App\Models\Ciudades;
use App\Models\Contacto;
use App\Models\CustomerType;
use App\Models\Estado;
use App\Models\Origin;
use App\Models\Paises;
use App\Models\StatusContact;
use App\Models\TipoPropiedad;
use App\Models\User;
use App\Notifications\Contact\ContactCreatedNotification;
use App\Notifications\Contact\ContactDeleteNotification;
use App\Notifications\Contact\ContactUpdatedNotification;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

/**
 * Class ContactoController
 * @package App\Http\Controllers
 */
class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.contactos.index')->only('index');
        $this->middleware('can:admin.contactos.create')->only('create', 'store');
        $this->middleware('can:admin.contactos.edit')->only('edit', 'update');
        $this->middleware('can:admin.contactos.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('super Admin')) {
            $contactos = Contacto::all();
        } else {
            $contactos = Contacto::where('vendedorAgente_id', auth()->user()->id)->get();
        }

        return view('contacto.index', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.z
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto();
        $paises = Paises::all();
        $ciudades = Ciudades::all();
        $estados = Estado::all();
        $tipoPropiedad = TipoPropiedad::all();
        $customertypes = CustomerType::all();
        $origins = Origin::all();
        $statuscontacts = StatusContact::all();

        $agentes = User::whereHas('roles', function ($q) {
            $q->where('name', 'vendedor');
        })->get();

        return view('contacto.create', compact('contacto', 'paises', 'ciudades', 'estados', 'tipoPropiedad', 'customertypes', 'origins', 'statuscontacts', 'agentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contacto::$rules);
        $input = $request->all();
        /*$contacto = new Contacto();
        $contacto->name = $request['name'];
        $contacto->apellido = $request['apellido'];
        $contacto->email = $request['email'];
        $contacto->telefonoContacto1 = ($request['telefonoContacto1']);
        $contacto->telefonoContacto2 = ($request['telefonoContacto2']);
        $contacto->origen = ($request['origen']);
        $contacto->status = ($request['status']);
        $contacto->pais = ($request['pais']);
        $contacto->region = ($request['region']);
        $contacto->ciudad = ($request['ciudad']);
        $contacto->direccion = ($request['direccion']);
        $contacto->observaciones = ($request['observaciones']);*/

        /*$user = new User();
        $user->name = $request->name;
        $user->last_name = $request->apellido;
        $user->email = $request->email;
        $user->whatsapp = $request->telefonoContacto1;
        $user->password = bcrypt('123456789');

        $role = Role::where('name', 'cliente')->first();
        $user->assignRole($role);
        $user->save();*/

        if (auth()->user()->hasRole('super Admin') || auth()->user()->hasRole('admin')) {
            // Si el usuario es super admin o admin, permitir que seleccione el agente
            $input['vendedorAgente_id'] = $request->input('vendedorAgente_id');
        } else {
            // Si el usuario es agente, asignar automáticamente su propio ID
            $input['vendedorAgente_id'] = auth()->user()->id;
        }

        $contacto = Contacto::create($input);

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($contacto->vendedorAgente_id);

        foreach ($admins as $admin) {
            $admin->notify(new ContactCreatedNotification($contacto));
        }

        $agenteAsignado->notify(new ContactCreatedNotification($contacto));

        //Mail::to($agenteAsignado->email)->send(new NuevoContacto($contacto,));

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);
        $paises = Paises::all();
        $ciudades = Ciudades::all();
        $estados = Estado::all();


        return view('contacto.show', compact('contacto', 'paises', 'ciudades', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        $paises = Paises::all();
        $ciudades = Ciudades::all();
        $estados = Estado::all();
        $tipoPropiedad = TipoPropiedad::all();
        $customertypes = CustomerType::all();
        $origins = Origin::all();
        $statuscontacts = StatusContact::all();

        $agentes = User::whereHas('roles', function ($q) {
            $q->where('name', 'vendedor');
        })->get();

        return view('contacto.edit', compact('contacto', 'agentes', 'paises', 'ciudades', 'estados', 'tipoPropiedad', 'customertypes', 'origins', 'statuscontacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        request()->validate(Contacto::$rules);

        $contacto->update($request->all());

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($contacto->vendedorAgente_id);

        foreach ($admins as $admin) {
            $admin->notify(new ContactUpdatedNotification($contacto));
        }

        $agenteAsignado->notify(new ContactUpdatedNotification($contacto));

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);

        if (auth()->user()->hasRole('super Admin') || auth()->user()->hasRole('admin') || auth()->user()->id == $contacto->vendedorAgente_id) {
            // Si el usuario es super admin, admin o el agente asignado, permitir eliminar el contacto
            $contacto->delete();

            $admins = User::whereHas("roles", function ($q) {
                $q->whereIn('name', ['super Admin', 'admin']);
            })->get();

            $agenteAsignado = User::find($contacto->vendedorAgente_id);

            foreach ($admins as $admin) {
                $admin->notify(new ContactDeleteNotification($contacto));
            }

            if (auth()->user()->id == $contacto->vendedorAgente_id && !auth()->user()->hasRole('super Admin') && !auth()->user()->hasRole('admin')) {
                // Si el usuario autenticado es el agente asignado y no es super Admin ni admin, notificarlo
                auth()->user()->notify(new ContactDeleteNotification($contacto));
            }

            return redirect()->route('contactos.index')
                ->with('success', 'Contacto deleted successfully');
        } else {
            // Si el usuario no tiene permiso, mostrar un mensaje de error
            return redirect()->route('contactos.index')
                ->with('error', 'No tiene permiso para eliminar este contacto');
        }
    }

    public function storeUserContacto(Request $request)
    {
        // METODO PARA FORMULARIO DE CONTACTO DE FFRONTEND.SHOWPRODUCT
        $validatedData = $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefonoContacto1' => 'required',
            'observaciones' => 'required',
        ]);
        $vendedorAgente_id = $request['vendedorAgente_id'] ? $request['vendedorAgente_id'] : null;

        $data = [
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'email' => $request['email'],
            'telefonoContacto1' => $request['telefonoContacto1'],
            'observaciones' => $request['observaciones'],
            'origins_id' => 1,
            'status_contact_id' => 1,
            'customer_type_id' => 8,
            'vendedorAgente_id' => $vendedorAgente_id,
            'birthdate' => now()->format('Y-m-d'),
        ];

        $contacto = Contacto::create($data);

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        foreach ($admins as $admin) {
            $admin->notify(new ContactCreatedNotification($contacto));
        }

        //Mail::to($user->email)->send(new NuevoRegistro($user, $request->password));
        //Mail::to("elluc09@gmail.com")->send(new NotificarAdmin($user, $request->mensaje));

        return redirect()->back()->with('success', "Mensaje enviado.");
    }
}
