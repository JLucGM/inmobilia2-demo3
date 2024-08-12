<?php

namespace App\Http\Controllers;

use App\Models\TypeBusiness;
use Illuminate\Http\Request;

/**
 * Class TypeBusinessController
 * @package App\Http\Controllers
 */
class TypeBusinessController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.typebusiness.index')->only('index');
        $this->middleware('can:admin.typebusiness.create')->only('create','store');
        $this->middleware('can:admin.typebusiness.edit')->only('edit','update');
        $this->middleware('can:admin.typebusiness.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeBusinesses = TypeBusiness::paginate();

        return view('type-business.index', compact('typeBusinesses'))
            ->with('i', (request()->input('page', 1) - 1) * $typeBusinesses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeBusiness = new TypeBusiness();
        return view('type-business.create', compact('typeBusiness'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeBusiness::$rules);

        $typeBusiness = TypeBusiness::create($request->all());

        return redirect()->route('type_business.index')
            ->with('success', 'TypeBusiness created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeBusiness = TypeBusiness::find($id);

        return view('type-business.show', compact('typeBusiness'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeBusiness = TypeBusiness::find($id);

        return view('type-business.edit', compact('typeBusiness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeBusiness $typeBusiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeBusiness $typeBusiness)
    {
        request()->validate(TypeBusiness::$rules);

        $typeBusiness->update($request->all());

        return redirect()->route('type_business.index')
            ->with('success', 'TypeBusiness updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeBusiness = TypeBusiness::find($id)->delete();

        return redirect()->route('type_business.index')
            ->with('success', 'TypeBusiness deleted successfully');
    }
}
