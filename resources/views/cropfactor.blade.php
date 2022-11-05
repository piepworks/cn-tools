<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    <ul>
        <li>Height: {{ $results['height'] }}</li>
        <li>Width: {{ $results['width'] }}</li>
        <li>Focal Length: {{ $results['focalLength'] }}</li>
        <li>ƒ/stop: {{ $results['fStop'] }}</li>
        <li>Diagonal: {{ $results['diagonal'] }}</li>
        <li><b>Crop Factor: {{ $results['cropFactor'] }}</b></li>
        <li>Equivalent Focal Length: {{ $results['equivalentFocalLength'] }}mm</li>
    </ul>

    <hr>

    <form action="">
        <select name="preset">
            @foreach ($presets as $key => $preset)
                @if (@isset($preset['presets']))
                    <optgroup label="{{ $preset['name'] }}">
                    @foreach ($preset['presets'] as $subKey => $subPreset)
                        <option value="{{ $key }}.{{ $subKey }}"@if ($currentPreset['selector'] == $key . '.' . $subKey) selected @endif>
                            {{ $subPreset['name'] }}
                        </option>
                    @endforeach
                    </optgroup>
                @else
                    <option value="{{ $key }}"@if ($currentPreset['selector'] == $key) selected @endif>
                        {{ $preset['name'] }}
                    </option>
                @endif
            @endforeach
        </select>

        <button>Submit</button>
    </form>
</x-layout>
