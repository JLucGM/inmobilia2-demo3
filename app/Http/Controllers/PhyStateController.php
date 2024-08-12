<?php

namespace App\Http\Controllers;

use App\Models\PhyState;
use Illuminate\Http\Request;

/**
 * Class PhyStateController
 * @package App\Http\Controllers
 */
class PhyStateController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.phystates.index')->only('index');
        $this->middleware('can:admin.phystates.create')->only('create','store');
        $this->middleware('can:admin.phystates.edit')->only('edit','update');
        $this->middleware('can:admin.phystates.delete')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phyStates = PhyState::paginate();

        return view('phy-state.index', compact('phyStates'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phyState = new PhyState();
        return view('phy-state.create', compact('phyState'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PhyState::$rules);

        $phyState = PhyState::create($request->all());

        return redirect()->route('phy-states.index')
            ->with('success', 'PhyState created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phyState = PhyState::find($id);

        return view('phy-state.show', compact('phyState'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phyState = PhyState::find($id);

        return view('phy-state.edit', compact('phyState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PhyState $phyState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhyState $phyState)
    {
        request()->validate(PhyState::$rules);

        $phyState->update($request->all());

        return redirect()->route('phy-states.index')
            ->with('success', 'PhyState updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $phyState = PhyState::find($id)->delete();

        return redirect()->route('phy-states.index')
            ->with('success', 'PhyState deleted successfully');
    }
}
