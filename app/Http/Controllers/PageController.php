<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SettingGeneral;
use App\Models\TypeBusiness;
use Illuminate\Http\Request;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.pages.index')->only('index');
        $this->middleware('can:admin.pages.create')->only('create', 'store');
        $this->middleware('can:admin.pages.edit')->only('edit', 'update');
        $this->middleware('can:admin.pages.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('page.index', compact('pages'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('page.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Page::$rules);

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);

        $input['slug'] = $slugFinal;
        // dd($input);

        $path = 'img/';
        //dd($input['portada']);
        if (isset($input['portada'])) {
            $file = $input['portada'];
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $input['portada']->getClientOriginalExtension();
            $input["portada"] = $fileNameToStore;
            $file->move($path, $fileNameToStore);
        }

        $post =  Page::create($input);

        return redirect()->route('pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        request()->validate(Page::$rules);

        $input = $request->all();
        $slug = strtolower($input['name']);
        $slugFinal = str_replace(' ', '-', $slug);

        $input['slug'] = $slugFinal;

        $path = 'img/';

        if (isset($input['portada'])) {
            // Eliminar la imagen anterior, excepto la imagen por defecto
            if ($page->portada && file_exists($path . $page->portada) && $page->portada != 'banner-propertie2.png') {
                unlink($path . $page->portada);
            }

            $file = $input['portada'];
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $input['portada']->getClientOriginalExtension();
            $input["portada"] = $fileNameToStore;
            $file->move($path, $fileNameToStore);
        }

        $page->update($input);

        return redirect()->route('pages.index')
            ->with('success', 'Page updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        if ($page) {
            // Delete the associated image, except the default image
            if ($page->portada && file_exists(public_path('img/' . $page->portada)) && $page->portada != 'banner-propertie2.png') {
                unlink(public_path('img/' . $page->portada));
            }

            $page->delete();
        }

        return redirect()->route('pages.index')
            ->with('success', 'Page deleted successfully');
    }

    public function page($slug)
    {
        $pageShow = Page::where('slug', $slug)->where('status', 1)->get();
        $pages = Page::where('status', 1)->get();
        $setting = SettingGeneral::first();
        $typeBusinesses = TypeBusiness::all();

        return view('frontend.pages')
            ->with('setting', $setting)
            ->with('typeBusinesses', $typeBusinesses)
            ->with('pages', $pages)
            ->with('pageShow', $pageShow);
    }
}
