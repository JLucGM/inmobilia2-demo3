<?php

namespace App\Http\Controllers;

use App\Models\Monedas;
use App\Models\SettingGeneral;
use Illuminate\Http\Request;

/**
 * Class SettingGeneralController
 * @package App\Http\Controllers
 */
class SettingGeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.setting-generals.index')->only('index');
        $this->middleware('can:admin.setting-generals.create')->only('create', 'store');
        $this->middleware('can:admin.setting-generals.edit')->only('edit', 'update');
        $this->middleware('can:admin.setting-generals.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$settingGeneralscount = SettingGeneral::all();
        $settingGenerals = SettingGeneral::first();
        //$settingCount = $settingGeneralscount->count();

        return redirect()->route('setting-generals.edit', $settingGenerals->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settingGeneral = new SettingGeneral();
        $monedas = Monedas::all();
        // dd($monedas);
        return view('setting-general.create', compact('settingGeneral', 'monedas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SettingGeneral::$rules);

        $input = $request->all();

        if ($request['logo_empresa']) {
            $file = $request->file('logo_empresa');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa')->move($filepath, $filename);
            $input['logo_empresa'] = $filename;
        }

        $settingGeneral = SettingGeneral::create($input);
        $settingGeneral->save();
        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settingGeneral = SettingGeneral::find($id);

        return view('setting-general.show', compact('settingGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settingGeneral = SettingGeneral::find($id);
        $monedas = Monedas::all();

        return view('setting-general.edit', compact('settingGeneral', 'monedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SettingGeneral $settingGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingGeneral $settingGeneral)
    {
        // request()->validate(SettingGeneral::$rules);
        $input = $request->all();
        // dd($input);

        // Verificar si el checkbox está marcado
        $valor1 = $request->input('status_section_one');
        $input['status_section_one'] = ($valor1 == "1") ? 1 : 0;

        $valor2 = $request->input('status_section_two');
        $input['status_section_two'] = ($valor2 == "1") ? 1 : 0;

        $valor3 = $request->input('status_section_three');
        $input['status_section_three'] = ($valor3 == "1") ? 1 : 0;

        $valor4 = $request->input('status_section_four');
        $input['status_section_four'] = ($valor4 == "1") ? 1 : 0;

        if ($request->hasFile('logo_empresa')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->logo_empresa != 'default.png' && file_exists(public_path('image/' . $settingGeneral->logo_empresa))) {
                unlink(public_path('image/' . $settingGeneral->logo_empresa));
            }

            $file = $request->file('logo_empresa');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa')->move($filepath, $filename);
            $input['logo_empresa'] = $filename;
        } else {
            $input['logo_empresa'] = $settingGeneral->logo_empresa;
        }

        if ($request->hasFile('logo_empresa_footer')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->logo_empresa_footer != 'default.png' && file_exists(public_path('image/' . $settingGeneral->logo_empresa_footer))) {
                unlink(public_path('image/' . $settingGeneral->logo_empresa_footer));
            }

            $file = $request->file('logo_empresa_footer');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa_footer')->move($filepath, $filename);
            $input['logo_empresa_footer'] = $filename;
        } else {
            $input['logo_empresa_footer'] = $settingGeneral->logo_empresa_footer;
        }

        if ($request->hasFile('logo_empresa_favicon')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->logo_empresa_favicon != 'favicon.ico' && file_exists(public_path('image/' . $settingGeneral->logo_empresa_favicon))) {
                unlink(public_path('image/' . $settingGeneral->logo_empresa_favicon));
            }

            $file = $request->file('logo_empresa_favicon');
            $filepath = "image/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('logo_empresa_favicon')->move($filepath, $filename);
            $input['logo_empresa_favicon'] = $filename;
        } else {
            $input['logo_empresa_favicon'] = $settingGeneral->logo_empresa_favicon;
        }

        if ($request->hasFile('portadaBlog')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->portadaBlog != 'banner-propertie2.png' && file_exists(public_path('img/' . $settingGeneral->portadaBlog))) {
                unlink(public_path('img/' . $settingGeneral->portadaBlog));
            }

            $file = $request->file('portadaBlog');
            $filepath = "img/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('portadaBlog')->move($filepath, $filename);
            $input['portadaBlog'] = $filename;
        } else {
            $input['portadaBlog'] = $settingGeneral->portadaBlog;
        }

        if ($request->hasFile('portadaFaq')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->portadaFaq != 'banner-propertie2.png' && file_exists(public_path('img/' . $settingGeneral->portadaFaq))) {
                unlink(public_path('img/' . $settingGeneral->portadaFaq));
            }

            $file = $request->file('portadaFaq');
            $filepath = "img/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('portadaFaq')->move($filepath, $filename);
            $input['portadaFaq'] = $filename;
        } else {
            $input['portadaFaq'] = $settingGeneral->portadaFaq;
        }

        if ($request->hasFile('portadaContact')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->portadaContact != 'banner-propertie2.png' && file_exists(public_path('img/' . $settingGeneral->portadaContact))) {
                unlink(public_path('img/' . $settingGeneral->portadaContact));
            }

            $file = $request->file('portadaContact');
            $filepath = "img/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('portadaContact')->move($filepath, $filename);
            $input['portadaContact'] = $filename;
        } else {
            $input['portadaContact'] = $settingGeneral->portadaContact;
        }

        if ($request->hasFile('portadaAnunciar')) {
            // Eliminar la imagen anterior
            if ($settingGeneral->portadaAnunciar != 'default.png' && file_exists(public_path('img/' . $settingGeneral->portadaAnunciar))) {
                unlink(public_path('img/' . $settingGeneral->portadaAnunciar));
            }

            $file = $request->file('portadaAnunciar');
            $filepath = "img/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSucess = $request->file('portadaAnunciar')->move($filepath, $filename);
            $input['portadaAnunciar'] = $filename;
        } else {
            $input['portadaAnunciar'] = $settingGeneral->portadaAnunciar;
        }

        $settingGeneral->update($input);
        // $settingGeneral->save();

        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $settingGeneral = SettingGeneral::find($id)->delete();

        return redirect()->route('setting-generals.index')
            ->with('success', 'SettingGeneral deleted successfully');
    }
}
