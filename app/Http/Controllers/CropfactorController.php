<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        // print_r($this->zippy(3));
        $presets = config('cf.presets');
        $currentPreset = $request->query('preset') ?? 'full';
        $pieces = explode('.', $currentPreset);

        if (count($pieces) > 1) {
            $selector = $pieces[0] . '.presets.' . $pieces[1];
        } else {
            $selector = $pieces[0];
        }

        $output = data_get($presets, $selector);

        return view ('cropfactor', [
            'presets' => config('cf.presets'),
            'currentPreset' => $currentPreset,
            'height' => $request->query('height') ?? $output['dimensions']['height'],
            'width' => $request->query('width') ?? $output['dimensions']['width'],
            'focalLength' => $request->query('focal_length') ?? 50,
            'fStop' => $request->query('f_stop') ?? 1.8,
        ]);
    }

    protected function zippy($x)
    {
        return $x * $x;
    }
}
