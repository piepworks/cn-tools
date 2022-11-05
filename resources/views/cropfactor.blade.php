<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

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
            <table>
                <tr>
                    <td><a target="_blank" rel="noopener" href="https://www.bhphotovideo.com/explora/photography/tips-and-solutions/understanding-crop-factor">Crop factor</a></td>
                    <td>&times; <b id="results_cropfactor">{{ $results['cropFactor'] }}</b></td>
                </tr>
                <tr>
                    <td><a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/135_film#Image_format">8-perf 35mm</a> equivalent focal length</td>
                    <td><b id="results_equivalent_focal_length">{{ $results['equivalentFocalLength'] }}</b>mm</td>
                </tr>
                <tr>
                    <td>
                        <a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/135_film#Image_format">8-perf 35mm</a>
                        equivalent ƒ/stop (same <a target="_blank" rel="noopener" href="http://yedlin.net/lens_blur.html">blur circles</a>)
                    </td>
                    <td>ƒ/<b id="results_equivalent_f_stop">{{ $results['equivalentFStop'] }}</b></td>
                </tr>
                <tr>
                    <td><a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/Aspect_ratio_(image)">Aspect ratio</a></td>
                    <td>
                        <span id="js-aspect-ratio" @if (!$results['aspectRatio']) class="hidden"@endif>
                            <b id="results_aspect_ratio">{{ $results['aspectRatio'] }}</b>
                            &nbsp;or&nbsp;
                        </span>

                        <b id="results_aspect_ratio_decimal">{{ $results['aspectRatioDecimal'] }}</b>
                    </td>
                </tr>
            </table>
        </fieldset>

        <button>Submit</button>
    </form>
</x-layout>
