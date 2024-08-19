<?php

use App\Http\Controllers\AmenitiesCheckController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ContactosPropiedadController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MensajesSoporteController;
use App\Http\Controllers\TicketChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerLoyaltiesController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoWebController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\OriginMediumController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PhyStateController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SettingGeneralController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StartPOPUPController;
use App\Http\Controllers\StatusContactController;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\TypeBusinessController;
use App\Http\Controllers\userController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['cors']], function () {

    // index routing via Route feature
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Route::redirect('/', '/home');

    /*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
    // Route::view('/Dashboard', 'dashboard');

    // Route::view('/', [App\Http\Controllers\userController::class, 'indexView']);
    Route::get('/Dashboard', [HomeController::class, 'indexView'])->name('Dashboard');

    // Route::prefix('Customers')->group(function () {
    //     Route::redirect('/', '/Customers/List');
    //     Route::view('List', 'customers/list');
    //     Route::view('Detail', 'customers/detail');
    // });

    // User
    Route::get('/user', [userController::class, 'index'])->name('user.index');
    Route::get('/user-edit/{id}', [userController::class, 'edit'])->name('user.edit');
    Route::patch('/user-update/{id}', [userController::class, 'update'])->name('user.update');
    Route::get('/UsuarioLogin', [userController::class, 'usuarioLogin'])->name('user.login');
    Route::get('/logout', [userController::class, 'logout'])->name('login.destroy');
    // Route::post('/register', [userController::class, 'store'])->name('register.store');
    Route::get('/userDelete{id}', [userController::class, 'destroy'])->name('user.delete');
    Route::get('user/new-user', [userController::class, 'create'])->name('new.user');
    Route::post('/storeUsuario', [userController::class, 'store'])->name('store.user');
    Route::get('/profile', [userController::class, 'profile'])->name('profile');


    //usuario del formulario de anunciar
    Route::post('/storeUsuario-anunciar', [UserController::class, 'storeUserAnunciar'])->name('store.user-anunciar');

    //usuario formulario de contacto del home
    Route::post('/storeUserContacto', [ContactoController::class, 'storeUserContacto'])->name('store.user-contacto');

    //Product
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('property/{id}', [HomeController::class, 'show'])->name('producto.show');
    Route::get('productoDelete/{id}', [ProductController::class, 'Delete'])->name('propiedad.delete');

    Route::post('/storeProducto', [ProductController::class, 'store'])->name('store.product');
    Route::patch('/productUpdate/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    // Rutas auxiliares
    Route::patch('/productJsonEdit{id}', [ProductController::class, 'productJsonImages'])->name('pjsonimages');
    Route::get('/create-product', [ProductController::class, 'create'])->name('new.product');
    Route::get('/edit-product/{id}', [ProductController::class, 'productEdit'])->name('product.edit');

    Route::delete('/products/{id}/images/{imageId}', [ProductController::class, 'deleteImage'])->name('pjsondelete');




    // RUTAS DE FRONTDEND
    Route::get('/propiedad-anunciar', [ProductController::class, 'propiedadAnunciar'])->name('propiedad.anunciar'); // Ruta sin usar
    Route::get('propiedadesAll', [ProductController::class, 'propiedadMapsAll'])->name('propiedadesMaps');
    Route::get('/type/{tipo}', [ProductController::class, 'propiedadLista'])->name('propiedad.lista');
    Route::get('properties', [ProductController::class, 'buscarPropiedad'])->name('buscarPropiedad');

    // Notification
    Route::group(['middleware' => 'auth'], function () {
        Route::POST('store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
        Route::POST('send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
        Route::GET('notification/list', [NotificationSendController::class, 'listNotification'])->name('notification.list');
        Route::GET('notification', [NotificationSendController::class, 'newNotification'])->name('notification.new');
    });

    // push notification
    //make a push notification.
    //Route::get('/push', [PushController::class, 'push'])->name('push');

    //store a push subscriber.
    //Route::post('/push', [PushController::class, 'store']);


    // Payment Gateway
    //Route::get('/paymentGateway', [PaymentGatewayController::class, 'index'])->name('paymentGateway.index');
    //Route::get('/paymentEdit{id}', [PaymentGatewayController::class, 'paymentEdit'])->name('payment.edit');
    //Route::patch('/paymentUpdate{id}', [PaymentGatewayController::class, 'paymentUpdate'])->name('payment.update');

    // SEO
    //Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    //Route::patch('/seoUpdate{id}', [SeoController::class, 'seoUpdate'])->name('seo.update');

    //cupon
    //Route::get('/Coupons', [CouponController::class, 'index'])->name('cupon.index');
    //Route::post('/RedeemCoupon', [CouponController::class, 'canjearCupon'])->name('canjear.cupon');
    //Route::get('/cupondit{id}', [CouponController::class, 'cuponEdit'])->name('cupon.edit');
    //Route::patch('/cuponUpdate{id}', [CouponController::class, 'cuponUpdate'])->name('cupon.update');
    //Route::get('/addCoupon', [CouponController::class, 'cuponAdd'])->name('add.cupon');
    //Route::post('/newCoupon', [CouponController::class, 'newCupon'])->name('new.cupon');

    //Categorias
    Route::get('/categories', [CategoriasController::class, 'index'])->name('cat.index');
    Route::get('/editCategory/{id}', [CategoriasController::class, 'edit'])->name('cat.edit');
    Route::get('/createCategory', [CategoriasController::class, 'create'])->name('cat.create');
    Route::post('/newCategorias', [CategoriasController::class, 'store'])->name('cat.store');
    Route::patch('/CategoriasUpdate/{id}', [CategoriasController::class, 'update'])->name('cat.update');

    Route::get('categorias/{id}', [CategoriasController::class, 'categoriaDelete'])->name('cat.delete');

    //subCategorias 
    //Route::get('/subCategorias', [SubCategoriasController::class, 'index'])->name('subcat.index');
    //Route::get('/editsubCategorias{id}', [SubCategoriasController::class, 'edit'])->name('subcat.edit');
    //Route::get('/createsubCategorias', [SubCategoriasController::class, 'create'])->name('subcat.create');
    //Route::post('/newsubCategorias', [SubCategoriasController::class, 'store'])->name('subcat.store');
    //Route::patch('/subCategoriasUpdate{id}', [SubCategoriasController::class, 'update'])->name('subcat.update');

    // Ciudades
    Route::get('/ciudades', [CiudadesController::class, 'index'])->name('city.index');
    Route::get('/editCiudades{id}', [CiudadesController::class, 'edit'])->name('city.edit');
    Route::get('/createCiudades', [CiudadesController::class, 'create'])->name('city.create');
    Route::post('/newCiudades', [CiudadesController::class, 'store'])->name('city.store');
    Route::patch('/CiudadesUpdate{id}', [CiudadesController::class, 'update'])->name('city.update');

    Route::get('ciudad/{id}', [CiudadesController::class, 'ciudadDelete'])->name('city.delete');

    //Fidelizacion
    //Route::get('/Fidelizacion', [CustomerLoyaltiesController::class, 'index'])->name('fidel.index');
    //Route::get('/editFidelizacion{id}', [CustomerLoyaltiesController::class, 'edit'])->name('fidel.edit');
    //Route::get('/createFidelizacion', [CustomerLoyaltiesController::class, 'create'])->name('fidel.create');
    //Route::post('/newFidelizacion', [CustomerLoyaltiesController::class, 'store'])->name('fidel.store');
    //Route::patch('/fidelizacionUpdate{id}', [CustomerLoyaltiesController::class, 'update'])->name('fidel.update');

    //startPOPUP
    //Route::get('/spop', [StartPOPUPController::class, 'index'])->name('spop.index');
    //Route::PATCH('/spop', [StartPOPUPController::class, 'update'])->name('spop.update');

    // Enviando Pedido
    //Route::post('/enviandoPedido', [SalesController::class, 'enviandoPedido'])->name('enviando.pedido');

    //  Carrito de compras
    //Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    //Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    //Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    //Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    //Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

    // Tratando de usar ajax
    // Route::get('/country', [ProductController::class, 'country'])->name('country');

    Route::resource('roles', RolesController::class);
    Route::resource('contactos', ContactoController::class);
    Route::resource('contactos-propiedads', ContactosPropiedadController::class);
    Route::get('contactos-propiedad/{id}', [ContactosPropiedadController::class, 'index'])->name('contactos-propiedad.index');
    Route::get('/contact-us', [ContactosPropiedadController::class, 'contactoWeb'])->name('contactacto.web');

    Route::resource('tasks', TaskController::class);

    Route::get('/tasksStatus/{id}/{taskId}', [TaskController::class, 'taskStatus'])->name('taskStatus.edit');
    Route::get('/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
    //Route::get('/send-task-reminders', [TaskController::class, 'sendTaskReminders']);

    Route::resource('mensajes-soportes', MensajesSoporteController::class);
    Route::resource('ticketchats', TicketChatController::class);

    Route::resource('slides', SlideController::class);
    Route::resource('info-webs', InfoWebController::class);

    Route::resource('testimonios', TestimonioController::class);
    Route::resource('setting-generals', SettingGeneralController::class);

    Route::resource('amenities-checks', AmenitiesCheckController::class);

    Route::get('markAsRead', [NotificationController::class, 'markAsRead'])->name('markAsRead');

    Route::resource('negocios', NegocioController::class);

    Route::get('/negocioStatus/{status}/{negocioId}', [NegocioController::class, 'negocioStatus'])->name('negocioStatus.edit');

    Route::resource('tags', TagController::class)->names('tags');
    Route::resource('posts', PostController::class)->names('posts');

    // Route::view('/Shipping', 'shipping');
    // Route::view('/Discount', 'discount');

    // Route::prefix('Products')->group(function () {
    //     Route::redirect('/', '/Products/List');
    //     Route::view('List', 'products/list');
    //     Route::view('Detail', 'products/detail');
    // });

    // Route::prefix('Orders')->group(function () {
    //     Route::redirect('/', '/Orders/List');
    //     Route::view('List', 'orders/list');
    //     Route::view('Detail', 'orders/detail');
    // });

    // Route::prefix('Storefront')->group(function () {
    //     Route::redirect('/', '/Storefront/Home');
    //     Route::view('Home', 'storefront/home');
    //     Route::view('Filters', 'storefront/filters');
    //     Route::view('Categories', 'storefront/categories');
    //     Route::view('Detail', 'storefront/detail');
    //     Route::view('Cart', 'storefront/cart');
    //     Route::view('Checkout', 'storefront/checkout');
    //     Route::view('Invoice', 'storefront/invoice');
    // });

    Route::prefix('Settings')->group(function () {
        Route::view('/', 'settings/index');
        Route::view('General', 'settings/general');
    });
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/show/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [BlogController::class, 'tag'])->name('blog.tag');
Route::post('blog/show/{post}', [BlogController::class, 'store'])->name('blog.comments.store');

Auth::routes();

// Ruta de Pais
Route::resource('paises', PaisController::class);
Route::resource('estados', EstadoController::class);

// Ruta de selec dinamico estado y ciudad
Route::get('/pais/{id}/estado', [ProductController::class, 'byEstado']);
Route::get('/estado/{id}/ciudad', [ProductController::class, 'byEstadoCiudad']);

Route::resource('faqs', FaqController::class);

Route::get('faq', [HomeController::class, 'faq'])->name('faq.show');

// Ruta de prueba, para enviar info de settingGeneral al login, BORRAR SI FALLA EL LOGIN
Route::get('login', [AuthLoginController::class, 'logins'])->name('login');

Route::resource('pages', PageController::class);
Route::resource('type_business', TypeBusinessController::class);
Route::resource('phy-states', PhyStateController::class);
Route::resource('popups', PopupController::class);
Route::resource('customer-types', CustomerTypeController::class);
Route::resource('origins', OriginController::class);
Route::resource('status-contacts', StatusContactController::class);

Route::get('/page/{slug}', [PageController::class, 'page'])->name('page');
Route::get('/contactsproperty/pdf/{id}/{vendedor_id}', [PdfController::class, 'contactopropiedad'])->name('pdpreport.show');

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return Redirect::back();
});
