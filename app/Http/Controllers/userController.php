<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use App\Mail\Anunciar\NotificarAdmin;
use App\Mail\Anunciar\NuevoRegistro;
use App\Mail\User\NewUser;

use App\Notifications\user\UserCreatedNotification;
use App\Notifications\user\UserDeleteNotification;
use App\Notifications\user\UserUpdatedNotification;
use App\Notifications\user\UserUpdatedStatusNotification;
use Illuminate\Support\Facades\Auth;
use Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.create')->only('create', 'store');
        $this->middleware('can:admin.user.edit')->only('edit', 'update');
        // $this->middleware('can:admin.user.delete')->only('delete');
    }

    public function index()
    {
        $users = User::all();

        return view('customers.list')->with('users', $users)->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        $user = new User;
        $roles = Roles::all();
        $message = "";
        return view('customers.newUser')->with('user', $user)->with('roles', $roles)->with('message', $message);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'whatsapp' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->whatsapp = $request->whatsapp;
        $user->status = $request->status == "on" ? 1 : 0;
        $user->country_id = 0;
        $user->city_id = 0;
        $user->assignRole($request->rol);

        // AGREGAR AVATAR
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);
            $user->avatar = $nombreImagen;
        } else {
            $user->avatar = "default.jpg";
        }

        $user->save();

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        foreach ($admins as $admin) {
            $admin->notify(new UserCreatedNotification($user));
        }

        //Mail::to($user->email)->send(new NewUser($user, $request->password));
        //Mail::to("elluc09@gmail.com")->send(new NotificarAdmin($user, $request->mensaje));

        return redirect()->route('user.index');
    }



    public function storeUserAnunciar(Request $request)
    {
        $users = User::all();
        $user = new User;
        $user->name = $request->name;
        $user->last_name = "";

        $count = count($users);

        for ($i = 0; $i < $count; $i++) {
            if ($users[$i]->email == $request->email) {
                $message = "El correo ya existe!";
                // mandar atras
                return redirect()->route('propiedad.anunciar')->with('error', "Solicitud rechazada correo en uso");
            }
        }

        // dd("entro");
        $user->email = $request->email;
        $user->password = Hash::make($request->telefono);
        // $user->direccion = $request->direccion;
        $user->whatsapp =  $request->telefono;
        $user->avatar = "default.jpg";
        if ($request->status == null) {
            $user->status = 0;
        }
        if ($request->status == "on") {
            $user->status = 1;
        }

        $user->country_id = 0;
        $user->city_id = 0;
        $user->save();

        $user->assignRole('Vendedor');
        //Mail::to($user->email)->send(new NuevoRegistro($user, $request->telefono));
        //Mail::to("admin@gmail.com")->send(new NotificarAdmin($user, $request->mensaje));

        return redirect()->back()->with('success', "Solicitud realizada con exito en breve recibira un correo con las indicaciones a seguir");
    }


    public function edit($id) // edit de la vista detail en backend
    {
        $user = User::find($id);
        $roles = Roles::all();
        $userRol = $user->roles->first()->name; // Obtenemos el primer rol asignado al usuario

        return view('customers.detail')->with('user', $user)->with('roles', $roles)->with('userRol', $userRol);
    }



    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $originalStatus = $user->status;

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->whatsapp = $request->whatsapp;
        $user->email = $request->email;
        $rol = Role::findByName($request->rol);
        $user->syncRoles([$rol]);

        $user->status = $request->filled('status') ? 1 : 0;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $nombreImagen);

            if ($user->avatar !== 'default.jpg') {
                // Eliminar el avatar viejo
                $oldAvatarPath = public_path('img/profile/' . $user->avatar);
                if (File::exists($oldAvatarPath)) {
                    File::delete($oldAvatarPath);
                }
            }

            $user->avatar = $nombreImagen;
        }

        $user->save();

        if ($originalStatus !== $user->status) {
            // Enviar notificación solo si el estado del usuario ha cambiado
            $admins = User::whereHas("roles", function ($q) {
                $q->whereIn('name', ['super Admin', 'admin']);
            })->get();

            foreach ($admins as $admin) {
                $admin->notify(new UserUpdatedStatusNotification($user));
            }
        } else {
            $admins = User::whereHas("roles", function ($q) {
                $q->whereIn('name', ['super Admin', 'admin']);
            })->get();

            foreach ($admins as $admin) {
                $admin->notify(new UserUpdatedNotification($user));
            }
        }

        return redirect()->route('user.index')->with('user', $user)->with('success', "Usuario actualizado con exito.");
    }

    public function destroy($id)
    {
        $user = User::find($id);

        // Eliminar el avatar del usuario
        if ($user->avatar && file_exists(public_path('img/profile/' . $user->avatar))) {
            unlink(public_path('img/profile/' . $user->avatar));
        }

        $user->delete();

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        foreach ($admins as $admin) {
            $admin->notify(new UserDeleteNotification($user));
        }

        return redirect()->route('user.index')->with('success', "Usuario eliminado con exito.");
    }

    public function logout()
    {
        $user = User::all();
        auth()->logout();
        return redirect()->to('/');
    }

    public function profile()
    {
        $user = Auth::user();
        $roles = Roles::all();

        return view('customers.profile', compact('user', 'roles'));
    }
}
