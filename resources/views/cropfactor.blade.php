<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    <select>
    @foreach ($presets as $key => $preset)
        @if (@isset($preset['presets']))
            <optgroup label="{{ $preset['name'] }}">
            @foreach ($preset['presets'] as $subKey => $subPreset)
                <option value="{{ $key }}/{{ $subKey }}">{{ $subPreset['name'] }}</option>
            @endforeach
            </optgroup>
        @else
            <option value="{{ $key }}">
                {{ $preset['name'] }}
            </option>
        @endif
    @endforeach
    </select>

    <hr>

    <form action="">
        <button>Submit</button>
    </form>
</x-layout>
