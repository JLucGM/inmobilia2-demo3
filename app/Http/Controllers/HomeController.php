<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Contacto;
use App\Models\Estado;
use App\Models\Faq;
use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Slide;
use  App\Models\InfoWeb;
use App\Models\Monedas;
use App\Models\Page;
use App\Models\Paises;
use App\Models\Post;
use App\Models\TipoPropiedad;
use  App\Models\User;
use  App\Models\Testimonio;
use  App\Models\SettingGeneral;
use App\Models\Task;
use App\Models\TypeBusiness;
use Brick\Money\Currency;
use Brick\Money\Money;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::where('publicar', 1)->where('destacado', 0)->latest()->get()->take(8);
        $info = InfoWeb::all()->first();
        $monedas = Monedas::all();
        $pages = Page::where('status', '1')->get();
        //dd($pages);
        $vendedorAgente =  User::whereHas("roles", function ($q) {
            $q->where("name", "Arrendador")->orWhere("name", 'Vendedor');
        })->where('status', 1) // Agregamos esta línea para filtrar por status 1
            ->take(4)
            ->get();

        $productsDestacados = Product::where('destacado', 1)->where('publicar', 1)->latest()->get()->take(8);

        $slides = Slide::latest()->where('active', 1)->take(5)->get();

        $typeBusinesses = TypeBusiness::all();
        $testimonios = Testimonio::latest()->take(4)->get();
        $tipoAll = TipoPropiedad::all()->pluck('nombre', 'id');
        $setting = SettingGeneral::first();

        //$bitcoin = new Currency(
        //    'XBT',     // currency code
        //    0,         // numeric currency code, useful when storing monies in a database; set to 0 if unused
        //    'Bitcoin', // currency name
        //    2          // default scale
        //);

        //$moneys = [];
        //foreach ($products as $product) {
        //    $precioUSD = $product->price;
        //    $precioCOP = $precioUSD * 2;
        //    $moneys[$product->id] = Money::of($precioCOP, $bitcoin);
        //}


        return view('frontend.Home')
            ->with('products', $products)
            ->with('productsDestacados', $productsDestacados)
            ->with('slides', $slides)
            ->with('monedas', $monedas)
            ->with('info', $info)
            ->with('vendedorAgente', $vendedorAgente)
            ->with('typeBusinesses', $typeBusinesses)
            //->with('moneys', $moneys)
            ->with('tipoAll', $tipoAll)
            ->with('setting', $setting)
            ->with('pages', $pages)
            ->with('testimonios', $testimonios);
    }

    public function show($id)
    {
        $tipoPropiedad = TipoPropiedad::get()->take(7);

        $product = Product::where('id', $id)->with(['media'])->first();
        $producto = Product::with('usuarios')->find($id); //rescata la informacion de la tabla agentepropiedad
        // $product = Product::find($id);
        $images = json_decode($product->image, false);
        $setting = SettingGeneral::first();
        $paises = Paises::all();
        $ciudades = Ciudades::all();
        $estados = Estado::all();
        $pages = Page::where('status', 1)->get();
        $typeBusinesses = TypeBusiness::all();

        $products = Product::where('tipoPropiedad_id', $product->tipoPropiedad_id)->take(6)->get();

        return view('frontend.productShow')
            ->with('product', $product)
            ->with('producto', $producto)
            ->with('products', $products)
            ->with('typeBusinesses', $typeBusinesses)
            ->with('images', $images)
            ->with('tipoPropiedad', $tipoPropiedad)
            ->with('setting', $setting)
            ->with('paises', $paises)
            ->with('ciudades', $ciudades)
            ->with('estados', $estados)
            ->with('pages', $pages);
    }

    public function indexView()
    {
        $user = Auth::user();

        // Contador de Productos (Propiedades)
        $products = Product::latest()->take(20)->get();
        //$productcount = Product::count();



        if ($user->hasRole('super Admin') || $user->hasRole('admin')) {
            // Contador de usuarios
            //$users = User::all();
            //$usercount = count($users);

            $contactos = Contacto::latest()->take(20)->get();
            $contactocount = Contacto::count();

            // Si es super-admin o admin, muestra todos los datos de tasks
            $task = Task::where('status', 'Completado');
            $taskcount = $task->count();

            $taskp = Task::where('status', 'Pendiente');
            $taskps = Task::where('status', '<>', 'Rechazado')->take(20)->get();
            $taskPcount = $taskp->count();
        } else {
            $contactos = Contacto::where('vendedorAgente_id', $user->id)->latest()->take(20)->get();
            $contactocount = Contacto::where('vendedorAgente_id', $user->id)->count();

            // Si es otro tipo de usuario, solo muestra los datos asignados
            $task = Task::where('agente_id', $user->id)->where('status', 'Completado')->get();
            $taskcount = $task->count();

            $taskp = Task::where('agente_id', $user->id)->where('status', 'Pendiente')->get();
            $taskps = Task::where('agente_id', $user->id)->where('status', '<>', 'Rechazado')->take(20)->get();

            $taskPcount = $taskp->count();
        }

        $blogcount = Post::count();

        $setting = SettingGeneral::first();

        $posts = Post::latest()->take(20)->get();

        return view('/dashboard')
            ->with('contactos', $contactos)
            ->with('blogcount', $blogcount)
            ->with('taskPcount', $taskPcount)
            ->with('taskps', $taskps)
            ->with('taskcount', $taskcount)
            ->with('contactocount', $contactocount)
            ->with('user', $user)
            //->with('usercount', $usercount)
            ->with('products', $products)
            //->with('productcount', $productcount)
            ->with('setting', $setting)
            ->with('posts', $posts);
        // return view('customers.list');
    }
    public function footerIndex()
    {
        $settingFooter = SettingGeneral::first();

        return view('frontend.footer')
            ->with('settingFooter', $settingFooter);
        // return view('customers.list');
    }

    public function faq()
    {
        $faqs = Faq::all()->where('status', 'Publicar');
        $setting = SettingGeneral::first();
        $pages = Page::where('status', 1)->get();
        $typeBusinesses = TypeBusiness::all();

        return view('frontend.faq')
            ->with('faqs', $faqs)
            ->with('typeBusinesses', $typeBusinesses)
            ->with('pages', $pages)
            ->with('setting', $setting);
    }
}
