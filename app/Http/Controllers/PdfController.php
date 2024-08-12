<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SettingGeneral;
use App\Models\User;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function contactopropiedad($id, $vendedor_id)
    {
$agente = User::find($vendedor_id);
        $product = Product::find($id);
        $images = json_decode($product->image, false);

        $setting =SettingGeneral::first();
        
        $pdf = \PDF::loadView('contactos-propiedad.pdf',[
            'product'=> $product, 
            'setting'=> $setting,
            'images'=> $images,
            'agente'=> $agente,
        ])->setPaper('a4', 'portrait');
return $pdf->stream();
        //return view('contactos-propiedad.pdf', compact('product','setting'));
    }
}
