<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        $presets = config('cf.presets');
        $currentPreset['selector'] = $request->query('preset') ?? 'full';
        $pieces = explode('.', $currentPreset['selector']);

        if (count($pieces) > 1) {
            $fullSelector = $pieces[0] . '.presets.' . $pieces[1];
        } else {
            $fullSelector = $pieces[0];
        }

        $currentPreset['values'] = data_get($presets, $fullSelector);

        if ($currentPreset['values'] == null) {
            abort(404);
        }

        $results['focalLength'] = $request->query('focal_length') ?? 50;
        $results['fStop'] = $request->query('f_stop') ?? 1.8;
        $results['height'] = $request->query('height') ?? $currentPreset['values']['dimensions']['height'];
        $results['width'] = $request->query('width') ?? $currentPreset['values']['dimensions']['width'];
        $results['diagonal'] = $this->diagonal($results['width'], $results['height']);

        return view ('cropfactor', [
            'presets' => config('cf.presets'),
            'currentPreset' => $currentPreset,
            'results' => $results,
        ]);
    }

    protected function diagonal($h, $w)
    {
        return round(sqrt(pow($w, 2) + pow($h, 2)), 2);
    }
}
