<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        // print_r($this->zippy(3));
        // print_r(config('cf.presets.aps-ch.items'));
        $presets = config('cf.presets');
        // print_r($presets);

        $preset = 'aps-ch/nikon-apsc';
        $pieces = explode('.', $preset);

        if (count($pieces) > 1) {
            $selector = $pieces[0] . '.presets.' . $pieces[1];
        } else {
            $selector = $pieces[0];
        }

        // $output = data_get($presets, $selector);
        // dd($output['dimensions']);

        return view ('cropfactor', [
            'presets' => config('cf.presets'),
            'p' => $request->query('preset') ?? 'full',
            // 'height' => $request->query('height') ?? null,
            // 'width' => $request->query('width') ?? null,
            // 'focalLength' => $request->query('focal_length') ?? 50,
            // 'fStop' => $request->query('f_stop') ?? 1.8,
        ]);
    }

    protected function zippy($x)
    {
        return $x * $x;
    }
}
