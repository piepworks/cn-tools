<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropfactorController extends Controller
{
    public function index(Request $request)
    {
        $presets = config('cf.presets');
        $currentPreset['selector'] = $request->query('preset') ?? 'blank';
        $pieces = explode('.', $currentPreset['selector']);
        $fullFrame = [
            'height' => data_get($presets, 'full')['dimensions']['height'],
            'width' => data_get($presets, 'full')['dimensions']['width'],
        ];

        if (count($pieces) > 1) {
            $fullSelector = $pieces[0] . '.presets.' . $pieces[1];
        } else {
            $fullSelector = $pieces[0];
        }

        $currentPreset['values'] = data_get($presets, $fullSelector);

        if ($currentPreset['selector'] != 'blank' && $currentPreset['values'] == null) {
            abort(404);
        }

        $results = [
            'focalLength' => $request->query('focal_length') ?? 50,
            'fStop' => $request->query('f_stop') ?? 1.8,
        ];

        if ($currentPreset['selector'] == 'blank') {
            $results['height'] = $request->query('height') ?? $fullFrame['height'];
            $results['width'] = $request->query('width') ?? $fullFrame['width'];
        } else {
            $results['height'] = $currentPreset['values']['dimensions']['height'];
            $results['width'] = $currentPreset['values']['dimensions']['width'];
        }

        $results['diagonal'] = $this->diagonal($results['width'], $results['height']);
        $results['cropFactor'] = $this->cropFactor($fullFrame, $results);
        $results['equivalentFocalLength'] = $this->equivalentFocalLength($results['cropFactor'], $results['focalLength']);
        $results['equivalentFStop'] = $this->equivalentFStop($fullFrame, $results['height'], $results['width'], $results['fStop']);
        $results['aspectRatio'] = $this->aspectRatio($results['height'], $results['width']);
        $results['aspectRatioDecimal'] = $this->aspectRatioDecimal($results['height'], $results['width']);
        $results['angleOfView'] =
            round(2 *
                atan(
                    $results['width'] /
                    (2 * $results['focalLength'])
                )
                * (180 / pi()),
            1);

        $context = [
            'presets' => config('cf.presets'),
            'currentPreset' => $currentPreset,
            'results' => $results,
        ];

        if ($request->header('HX-Request')) {
            return view ('cropfactor-form', $context);
        } else {
            return view ('cropfactor', $context);
        }
    }

    protected function diagonal($h, $w)
    {
        return round(sqrt(pow($w, 2) + pow($h, 2)), 2);
    }

    protected function cropFactor($ff, $r)
    {
        $fullFrame = $this->diagonal($ff['height'], $ff['width']);
        $currentValues = $this->diagonal($r['height'], $r['width']);

        return round(($fullFrame / $currentValues), 2);
    }

    protected function equivalentFocalLength($cf, $fl)
    {
        return round(($cf * $fl), 2);
    }

    protected function equivalentFStop($ff, $h, $w, $fs)
    {
        $wideSide = ($w > $h) ? $w : $h;
        return round(($fs * $ff['width'] / $wideSide), 1);
    }

    protected function aspectRatio($h, $w)
    {
        $r = intval(gmp_gcd(intval($h), intval($w)));
        $x = $w / $r;
        $y = $h / $r;

        $value = "${x}:${y}";

        // If the aspect ratio doesn’t come out clean, return an empty string.
        return (strlen($value) <= 5) ? $value : '';
    }

    protected function aspectRatioDecimal($h, $w)
    {
        $ratio = ($w > $h) ? ($w / $h) : ($h / $w);
        return round($ratio, 2);
    }
}
