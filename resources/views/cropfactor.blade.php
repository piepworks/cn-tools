<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    <form action="">
        <select name="preset">
            @foreach ($presets as $key => $preset)
                @if (@isset($preset['presets']))
                    <optgroup label="{{ $preset['name'] }}">
                    @foreach ($preset['presets'] as $subKey => $subPreset)
                        <option value="{{ $key }}.{{ $subKey }}"@if ($p == $key . '.' . $subKey) selected @endif>
                            {{ $subPreset['name'] }}
                        </option>
                    @endforeach
                    </optgroup>
                @else
                    <option value="{{ $key }}"@if ($p == $key) selected @endif>
                        {{ $preset['name'] }}
                    </option>
                @endif
            @endforeach
            </select>

        <button>Submit</button>
    </form>
</x-layout>
