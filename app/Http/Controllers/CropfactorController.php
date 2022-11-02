<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        // print_r($this->zippy(3));
        print_r(config('cf.presets.full.dimensions.width'));

        return view ('cropfactor', [
            'preset' => $request->query('preset') ?? 'full',
            'height' => $request->query('height') ?? null,
            'width' => $request->query('width') ?? null,
            'focalLength' => $request->query('focal_length') ?? 50,
            'fStop' => $request->query('f_stop') ?? 1.8,
        ]);
    }

    protected function zippy($x)
    {
        return $x * $x;
    }
}