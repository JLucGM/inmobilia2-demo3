<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Http\Request;

/**
 * Class CustomerTypeController
 * @package App\Http\Controllers
 */
class CustomerTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.customerstype.index')->only('index');
        $this->middleware('can:admin.customerstype.create')->only('create','store');
        $this->middleware('can:admin.customerstype.edit')->only('edit','update');
        $this->middleware('can:admin.customerstype.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerTypes = CustomerType::paginate();

        return view('customer-type.index', compact('customerTypes'))
            ->with('i', (request()->input('page', 1) - 1) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerType = new CustomerType();
        return view('customer-type.create', compact('customerType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CustomerType::$rules);

        $customerType = CustomerType::create($request->all());

        return redirect()->route('customer-types.index')
            ->with('success', 'CustomerType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerType = CustomerType::find($id);

        return view('customer-type.show', compact('customerType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerType = CustomerType::find($id);

        return view('customer-type.edit', compact('customerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CustomerType $customerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerType $customerType)
    {
        request()->validate(CustomerType::$rules);

        $customerType->update($request->all());

        return redirect()->route('customer-types.index')
            ->with('success', 'CustomerType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customerType = CustomerType::find($id)->delete();

        return redirect()->route('customer-types.index')
            ->with('success', 'CustomerType deleted successfully');
    }
}
