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
        <li>Equivalent ƒ/stop: {{ $results['equivalentFStop'] }}</li>
        <li>Aspect Ratio: {{ $results['aspectRatio'] }}</li>
        <li>Aspect Ratio Decimal: {{ $results['aspectRatioDecimal'] }}</li>
    </ul>

    <hr>

    <form>
        <fieldset>
            <legend>1</legend>
            <div>
                <label>
                    Select format:
                    <select name="preset">
                        <option value="blank">Choose a format</option>
                        @foreach ($presets as $key => $preset)
                            @if (@isset($preset['presets']))
                                <optgroup label="{{ $preset['name'] }}">
                                @foreach ($preset['presets'] as $subKey => $subPreset)
                                    <option value="{{ $key }}.{{ $subKey }}"@if ($currentPreset['selector'] == "${key}.${subKey}") selected @endif>
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
                </label>
            </div>
            <div>
                <div class="subdued">or</div>
                <div class="wrap">
                    <div class="nowrap">
                        enter
                        <label>
                            height:
                            <input type="number" name="height" size="5" value="{{ $results['height'] }}">
                            <span class="subdued">mm</span>
                        </label>
                    </div>
                    <div class="nowrap">
                        &nbsp;×
                        <label>
                            width:
                            <input type="number" name="width" size="5" value="{{ $results['width'] }}">
                            <span class="subdued">mm</span>
                        </label>
                    </div>
                </div>
                <div class="subdued @if (!$results['diagonal']) hidden @endif">(diagonal = <span>{{ $results['diagonal'] }}</span>mm)</div>
            </div>
        </fieldset>
        <fieldset>
            <legend>2</legend>
            <div>
                <label>
                    Enter focal length:
                    <input type="number" name="focal_length" size="4" value="{{ $results['focalLength'] }}">
                    <span class="subdued">mm</span>
                </label>
            </div>
            <div>
                <label>
                    Enter ƒ/stop:
                    <span class="subdued">ƒ/</span>
                    <input type="number" name="f_stop" size="4" value={{ $results['fStop'] }}>
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>3</legend>
        </fieldset>

        <button>Submit</button>
    </form>
</x-layout>
