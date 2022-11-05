<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        // print_r($this->zippy(3));
        $presets = config('cf.presets');
        $currentPreset['selector'] = $request->query('preset') ?? 'full';
        $pieces = explode('.', $currentPreset['selector']);

        if (count($pieces) > 1) {
            $selector = $pieces[0] . '.presets.' . $pieces[1];
        } else {
            $selector = $pieces[0];
        }

        $currentPreset['values'] = data_get($presets, $selector);
        $results['focalLength'] = $request->query('focal_length') ?? 50;
        $results['fStop'] = $request->query('f_stop') ?? 1.8;
        $results['height'] = $request->query('height') ?? $currentPreset['values']['dimensions']['height'];
        $results['width'] = $request->query('width') ?? $currentPreset['values']['dimensions']['width'];

        return view ('cropfactor', [
            'presets' => config('cf.presets'),
            'currentPreset' => $currentPreset,
            'results' => $results,
        ]);
    }

    protected function zippy($x)
    {
        return $x * $x;
    }
}
