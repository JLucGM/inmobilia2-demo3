<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TipoPropiedad;
use App\Models\Monedas;
use App\Models\User;
use App\Models\PropiedadAgente;
use App\Models\PropiedadAmenities;
use App\Models\SettingGeneral;

use App\Models\Amenities;
use App\Models\AmenitiesCheck;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Ciudades;
use App\Models\Contacto;
use App\Models\ContactosPropiedad;
use App\Models\Estado;
use App\Models\Page;
use App\Models\Paises;
use App\Models\PhyState;
use App\Models\TypeBusiness;
use App\Notifications\ProductCreatedNotification;
use App\Notifications\ProductDeletedNotification;
use App\Notifications\ProductUpdateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SettingGeneral = SettingGeneral::first();
        if (auth()->user()->hasRole('super Admin') || auth()->user()->hasRole('admin')) {
            $products = Product::with(['media'])->get();
        } else {

            $products = Product::join('propiedad_agente', 'propiedad_agente.product_id', '=', 'products.id')
                ->where('propiedad_agente.user_id', auth()->user()->id)
                ->get();
        }

        return view('products.list')->with('products', $products)->with('SettingGeneral', $SettingGeneral)->with('i', (request()->input('page', 1) - 1));
    }

    public function show($id)
    {
        $product = Product::with('contactos')->find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $tipoPropiedad = TipoPropiedad::all();
        //$monedas = Monedas::all();
        $amenities = Amenities::all();
        $amenitiesCheck = AmenitiesCheck::all();
        $paises = Paises::all();
        $estados = Estado::all();
        $ciudades = Ciudades::all();
        $SettingGeneral = SettingGeneral::first();
        $typebusinesses = TypeBusiness::all();
        $phystates = PhyState::all();

        $asignado = User::whereHas("roles", function ($q) {
            $q->Where('name', 'vendedor');
        })->pluck('name', 'id');

        return view('products.newProduct')
            ->with('amenities', $amenities)
            ->with('amenitiesCheck', $amenitiesCheck)
            ->with('paises', $paises)
            ->with('estados', $estados)
            ->with('ciudades', $ciudades)
            ->with('typebusinesses', $typebusinesses)
            ->with('phystates', $phystates)
            ->with('SettingGeneral', $SettingGeneral)
            ->with('tipoPropiedad', $tipoPropiedad)
            //->with('monedas', $monedas)
            ->with('asignado', $asignado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $input = $request->all();

        $amenitiesAlla = json_encode($input['comodidades']);
        $amenitiesAll = json_decode($amenitiesAlla);
        $product = Product::create($input);

        $productId = $product->id;
        $folderPath = 'img/product/product_id_' . $productId;

        // GUARDA NOMBRE Y GUARDA IMAGENES DE GALLERIA
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            if (is_array($images)) {
                $nombreImagen = [];
                foreach ($images as $index => $image) {
                    $nombreImagen[$index] = [
                        'id' => $index + 1, // Asigna un ID basado en el índice del array
                        'name' => $image->getClientOriginalName()
                    ];
                    $image->move(public_path($folderPath), $image->getClientOriginalName());
                }
                $jsonImagenes = json_encode($nombreImagen);

                $product->image = $jsonImagenes;
                $product->save();
            } else {
                $nombreImagen = [
                    'id' => 1, // Asigna un ID de 1 para la única imagen
                    'name' => $images->getClientOriginalName()
                ];
                $images->move(public_path($folderPath), $images->getClientOriginalName());

                $product->image = json_encode($nombreImagen);
                $product->save();
            }
        }

        // GUARDA IMAGEN DE PORTADA
        if ($request->hasFile('portada')) {
            $image = $request->file('portada');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path($folderPath), $nombreImagen);

            $product->portada = $nombreImagen;
            $product->save();
        }

        if (auth()->user()->hasRole(['super Admin', 'admin'])) {
            $propiedadAgente = new PropiedadAgente();
            $propiedadAgente->user_id = $input['agenteVendedor_id'];
            $propiedadAgente->product_id = $product->id;
            $propiedadAgente->save();
        } else {
            $propiedadAgente = new PropiedadAgente();
            $propiedadAgente->user_id = auth()->user()->id;
            $propiedadAgente->product_id = $product->id;
            $propiedadAgente->save();
        }

        foreach ($amenitiesAll as $a) {

            $productAmenities = new PropiedadAmenities();
            $productAmenities->product_id = $product->id;
            // dd($a->id);
            $productAmenities->amenities_checks_id = $a;

            $productAmenities->save();
        }

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agent = User::find(auth()->id());

        foreach ($admins as $admin) {
            $admin->notify(new ProductCreatedNotification($product));
        }

        $agent->notify(new ProductCreatedNotification($product));

        return redirect()->route('product.index')->with('success', 'La propiedad se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productUpdate(request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->publicar = $request->publicar;
        $product->publicarPrecio = $request->publicarPrecio;
        $product->dormitorios = $request->dormitorios;
        $product->ambientes = $request->ambientes;
        $product->toilet = $request->toilet;
        $product->metrosCuadradosT = $request->metrosCuadradosT;
        $product->metrosCuadradosC = $request->metrosCuadradosC;
        $product->estrenar = $request->estrenar;
        $product->destacado = $request->destacado;
        $product->expensas = $request->expensas;
        $product->cocheras = $request->cocheras;
        $product->pais = $request->pais;
        $product->region = $request->region;
        $product->ciudad = $request->ciudad;
        $product->latitud = $request->latitud;
        $product->longitud = $request->longitud;
        $product->direccion = $request->direccion;
        $product->tipoPropiedad_id = $request->t_propiedades;
        $product->type_business_id = $request->type_business_id;
        $product->phy_state_id = $request->phy_state_id;

        // if ($request->hasFile('image')) {
        //     $images = []; // Crear un arreglo vacío para almacenar los nombres de las imágenes

        //     foreach ($request->file('image') as $file) {
        //         $imageName = $file->getClientOriginalName();
        //         $file->move(public_path('images'), $imageName);
        //         $images[] = $imageName; // Agregar el nombre de la imagen al arreglo
        //     }

        //     $product->image = $images;
        // }

        $amenitiesSelected = $request->amenities;

        $product->amenities()->delete();
        foreach ($amenitiesSelected as $amenityId) {
            $propiedadAmenity = new PropiedadAmenities();
            $propiedadAmenity->product_id = $product->id;
            $propiedadAmenity->amenities_checks_id = $amenityId;
            $propiedadAmenity->save();
        }

        $propiedadAgente = PropiedadAgente::where('product_id', $product->id)->firstOrFail();
        $propiedadAgente->user_id = $request->agenteVendedor_id;
        $propiedadAgente->save();

        $product->save();

        // Crear una notificación para los usuarios con roles de Super Admin y Admin, y el usuario logueado que actualizó el producto
        $users = User::role(['Super Admin', 'Admin'])->get();
        $users->push(Auth::user());

        Notification::send($users, new ProductUpdateNotification($product));

        return redirect()->route('product.index')->with('success', 'La propiedad se ha actualizado correctamente');
        //return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productEdit($id)
    {
        $product = Product::find($id);
        $images = json_decode($product->image);
        $tipoPropiedad = TipoPropiedad::all();
        $paises = Paises::all();
        $estados = Estado::all();
        $ciudades = Ciudades::all();
        $amenities = AmenitiesCheck::all();
        $typebusinesses = TypeBusiness::all();
        $phystates = PhyState::all();

        $asignado = $product->usuarios()->pluck('users.name', 'users.id')->flip();
        $asignadoa = User::whereHas('roles', function ($query) {
            $query->where('name', 'vendedor');
        })->pluck('name', 'id');

        $amenitiesChecks = $product->amenities()->get();

        return view('products.detail')
            ->with('product', $product)
            ->with('paises', $paises)
            ->with('estados', $estados)
            ->with('ciudades', $ciudades)
            ->with('images', $images)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('amenitiesChecks', $amenitiesChecks)
            ->with('amenities', $amenities)
            ->with('asignado', $asignado)
            ->with('typebusinesses', $typebusinesses)
            ->with('phystates', $phystates)
            ->with('asignadoa', $asignadoa);
    }

    public function productJsonImages(Request $request, $id)
    {
        $product = Product::find($id);
        $images = json_decode($product->image, false);

        if ($request->hasFile('portada')) {
            // Eliminar la imagen de portada anterior
            if ($product->portada && file_exists(public_path("img/product/product_id_" . $id . "/" . $product->portada))) {
                unlink(public_path("img/product/product_id_" . $id . "/" . $product->portada));
            }

            $image = $request->file('portada');
            $nombreImagen = $image->getClientOriginalName();
            $image->move(public_path("img/product/product_id_" . $id . "/"), $nombreImagen);

            $product->portada = $nombreImagen;
            $product->save();
        }

        if ($request->hasFile('image')) {
            $array = [];
            $file = $request->file('image');
            $count = count($file);

            for ($i = 0; $i < $count; $i++) {
                $filepath = "img/product/product_id_" . $id . "/";
                $filename = time() . '-' . $file[$i]->getClientOriginalName();
                $uploadSucess = $file[$i]->move($filepath, $filename);
                $array[] = [
                    'id' => count($images) + $i + 1, // Asigna un nuevo ID basado en el número total de imágenes existentes más el índice actual
                    'name' => $filename
                ];
            }

            $product->image = json_encode(array_merge((array) $images, $array));

            $product->save();
            $product->image = array_merge((array) $images, $array);
        }

        return redirect()->route('product.index')
            ->with('product', $product)
            ->with('images', $images)
            ->with('success', 'Imagenes guardadas correctamente');
    }

    public function deleteImage($id, $imageId)
    {
        $product = Product::findOrFail($id);

        $images = json_decode($product->image, true);

        if (!is_array($images)) {
            return redirect()->back()->with('error', 'No se pudo eliminar la imagen. El arreglo de imágenes no es válido.');
        }

        $position = array_search($imageId, array_column($images, 'id'));

        if ($position !== false) {
            $imagePath = public_path("img/product/product_id_" . $id . "/" . $images[$position]['name']);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            unset($images[$position]);
            $images = array_values($images);
            $product->image = json_encode($images);
            $product->save();

            return redirect()->back()->with('success', 'Imagen eliminada correctamente');
        }

        return redirect()->back()->with('error', 'No se pudo encontrar la imagen para eliminar');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function propiedadLista($tipo)
    {
        $products = Product::where('type_business_id', $tipo)
            ->where('publicar', 1)
            ->orderBy('destacado', 'desc')
            ->paginate(12);

        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $tipoAll = TipoPropiedad::all()->pluck('nombre', 'id');

        $paises = Paises::all();
        $estado = Estado::all();
        $ciudades = Ciudades::all();
        $typeBusinesses = TypeBusiness::all();

        $setting = SettingGeneral::first();

        $pages = Page::where('status', 1)->get();

        return view('frontend.PropiedadesLista')
            ->with('products', $products)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('tipoAll', $tipoAll)
            ->with('typeBusinesses', $typeBusinesses)
            ->with('pages', $pages)
            ->with('paises', $paises)
            ->with('estado', $estado)
            ->with('ciudades', $ciudades)
            ->with('setting', $setting);
    }

    public function propiedadAnunciar()
    {
        $tipoPropiedad = TipoPropiedad::get()->take(7);
        $pages = Page::where('status', 1)->get();
        $setting = SettingGeneral::first();
        $typeBusinesses = TypeBusiness::all();


        return view('frontend.Anunciar')
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('pages', $pages)
            ->with('typeBusinesses', $typeBusinesses)
            ->with('setting', $setting);
    }


    public function propiedadMapsAll()
    {
        try {
            $propiedad = Product::all();

            $response = ['data' => $propiedad];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'There was an error retrieving the records'], 500);
        }
        return response()->json($response);
    }

    public function buscarPropiedad(Request $request)
    {
        $pages = Page::where('status', 1)->get();
        $setting = SettingGeneral::first();
        $searchQuery = $request->input('searchQuery');

        $productsSearch = Product::where(function ($query) use ($searchQuery) {
            $query->whereHas('region', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            })
                ->orWhereHas('ciudad', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                })
                ->orWhereHas('tipoPropiedad', function ($query) use ($searchQuery) {
                    $query->where('nombre', 'like', '%' . $searchQuery . '%');
                })
                ->orWhereHas('paises', function ($query) use ($searchQuery) {
                    $query->where('name', 'like', '%' . $searchQuery . '%');
                })
                ->orWhere('price', '<=', str_replace(',', '', $searchQuery));
        })->orderBy('destacado', 'desc')->paginate(12);


        if ($productsSearch->isEmpty()) {
            $products = Product::with(['media'])->orderBy('destacado', 'desc')->paginate(12);
        } else {
            $products = $productsSearch;
        }

        return view('frontend.searchPropiedad')
            ->with('productsSearch', $productsSearch)
            ->with('searchQuery', $searchQuery)
            ->with('products', $products)
            ->with('setting', $setting)
            ->with('pages', $pages);
    }


    public function Delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        // Crear una colección de usuarios que deben recibir la notificación
        $users = User::role(['super Admin', 'Admin'])->get();
        $users->push(Auth::user()); // Agregar el usuario logueado que eliminó el producto

        // Enviar la notificación a los usuarios seleccionados
        Notification::send($users, new ProductDeletedNotification($product));

        return redirect()->route('product.index')->with('success', 'La propiedad se ha eliminado correctamente');
    }

    public function byEstado($id)
    {
        return Estado::where('pais_id', $id)->get();
    }

    public function byEstadoCiudad($id)
    {
        return Ciudades::where('estado_id', $id)->get();
    }
}
