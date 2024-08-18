<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

/**
 * Class SlideController
 * @package App\Http\Controllers
 */
class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.slides.index')->only('index');
        $this->middleware('can:admin.slides.create')->only('create', 'store');
        $this->middleware('can:admin.slides.edit')->only('edit', 'update');
        $this->middleware('can:admin.slides.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();

        return view('slide.index', compact('slides'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = new Slide();
        $products = Product::all()->where('publicar', 1);

        return view('slide.create', compact('slide', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Slide::$rules);

        $input = $request->all();


        if ($request['image']) {
            $file = $request->file('image');
            $filepath = "image/sliders";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('image')->move($filepath, $filename);
            $input['image'] = $filename;
        }


        $slide = Slide::create($input);
        /*if(isset($request['prueba']))
        {
            $slide->addMediaFromRequest('prueba')->toMediaCollection('prueba');
        }*/

        return redirect()->route('slides.index')
            ->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.d
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);

        return view('slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        $products = Product::all()->where('publicar', 1);

        return view('slide.edit', compact('slide', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'link' => 'nullable|url',
        ]);

        // Actualizar los campos
        $slide->active = $request->input('active');
        $slide->texto = $request->input('texto');
        $slide->title = $request->input('title');
        $slide->link = $request->input('link');

        // Verificar si se ha enviado una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            if ($slide->image && file_exists(public_path('image/sliders/' . $slide->image))) {
                unlink(public_path('image/sliders/' . $slide->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/sliders'), $imageName);

            $slide->image = $imageName;
        }

        $slide->save();

        return redirect()->route('slides.index')
            ->with('success', 'Slide updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        if ($slide) {
            // Eliminar la imagen asociada al slide
            if ($slide->image && file_exists(public_path('image/sliders/' . $slide->image))) {
                unlink(public_path('image/sliders/' . $slide->image));
            }

            $slide->delete();
        }

        return redirect()->route('slides.index')
            ->with('success', 'Slide deleted successfully');
    }
}
