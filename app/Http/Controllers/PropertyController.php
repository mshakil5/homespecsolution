<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function residential()
    {
        return view('frontend.residential');
    }

    public function commercial()
    {
        return view('frontend.commercial');
    }

    public function developing()
    {
        return view('frontend.developing');
    }

    public function newbuild()
    {
        return view('frontend.newbuild');
    }

    public function propertyDetails($id)
    {
        $property = Property::where('id', '=', $id)->first();
        return view('frontend.singleproperty', compact('property'));
    }
}
