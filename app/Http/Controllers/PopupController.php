<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;

/**
 * Class PopupController
 * @package App\Http\Controllers
 */
class PopupController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.popups.index')->only('index');
        $this->middleware('can:admin.popups.create')->only('create','store');
        $this->middleware('can:admin.popups.edit')->only('edit','update');
        $this->middleware('can:admin.popups.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = Popup::paginate();

        return view('popup.index', compact('popups'))
            ->with('i', (request()->input('page', 1) - 1) * $popups->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $popup = new Popup();
        return view('popup.create', compact('popup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Popup::$rules);
        $input =$request->all();
        if($request['image'])
        {
            $file = $request->file('image');
            $filepath = "image/popups";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('image')->move($filepath, $filename);
            $input['image'] = $filename;
        }

        $popup = Popup::create($input);

        return redirect()->route('popups.index')
            ->with('success', 'Popup created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popup = Popup::find($id);

        return view('popup.show', compact('popup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popup = Popup::find($id);

        return view('popup.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Popup $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        request()->validate(Popup::$rules);

        $popup->title = $request->input('title');
        $popup->active = $request->input('active');
        $popup->description = $request->input('description');
        $popup->url = $request->input('url');
        $popup->start_date = $request->input('start_date');
        $popup->end_date = $request->input('end_date');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/sliders'), $imageName);

            $popup->image = $imageName;
        }

        $popup->save();

        return redirect()->route('popups.index')
            ->with('success', 'Popup updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $popup = Popup::find($id)->delete();

        return redirect()->route('popups.index')
            ->with('success', 'Popup deleted successfully');
    }
}
