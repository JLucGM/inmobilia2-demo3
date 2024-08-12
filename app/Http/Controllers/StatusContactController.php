<?php

namespace App\Http\Controllers;

use App\Models\StatusContact;
use Illuminate\Http\Request;

/**
 * Class StatusContactController
 * @package App\Http\Controllers
 */
class StatusContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.statuscontact.index')->only('index');
        $this->middleware('can:admin.statuscontact.create')->only('create','store');
        $this->middleware('can:admin.statuscontact.edit')->only('edit','update');
        $this->middleware('can:admin.statuscontact.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusContacts = StatusContact::paginate();

        return view('status-contact.index', compact('statusContacts'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statusContact = new StatusContact();
        return view('status-contact.create', compact('statusContact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(StatusContact::$rules);

        $statusContact = StatusContact::create($request->all());

        return redirect()->route('status-contacts.index')
            ->with('success', 'StatusContact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusContact = StatusContact::find($id);

        return view('status-contact.show', compact('statusContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusContact = StatusContact::find($id);

        return view('status-contact.edit', compact('statusContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  StatusContact $statusContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusContact $statusContact)
    {
        request()->validate(StatusContact::$rules);

        $statusContact->update($request->all());

        return redirect()->route('status-contacts.index')
            ->with('success', 'StatusContact updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statusContact = StatusContact::find($id)->delete();

        return redirect()->route('status-contacts.index')
            ->with('success', 'StatusContact deleted successfully');
    }
}
