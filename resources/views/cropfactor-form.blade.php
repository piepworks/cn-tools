<form hx-push-url="true" hx-ext="morph" hx-swap="morph" hx-target="this" hx-trigger="change" hx-get="/cropfactor">
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
                <input type="text" name="f_stop" size="4" value="{{ $results['fStop'] }}">
            </label>
        </div>
    </fieldset>
    <fieldset style="padding-bottom: 0;">
        <legend>3</legend>
        <table>
            <tr>
                <td><a target="_blank" href="https://www.bhphotovideo.com/explora/photography/tips-and-solutions/understanding-crop-factor">Crop factor</a></td>
                <td>&times; <b id="results_cropfactor">{{ $results['cropFactor'] }}</b></td>
            </tr>
            <tr>
                <td><a target="_blank" href="https://en.wikipedia.org/wiki/135_film#Image_format">8-perf 35mm</a> equivalent focal length</td>
                <td><b id="results_equivalent_focal_length">{{ $results['equivalentFocalLength'] }}</b>mm</td>
            </tr>
            <tr>
                <td>
                    <a target="_blank" href="https://en.wikipedia.org/wiki/135_film#Image_format">8-perf 35mm</a>
                    equivalent ƒ/stop (same <a target="_blank" href="http://yedlin.net/lens_blur.html">blur circles</a>)
                </td>
                <td>ƒ/<b id="results_equivalent_f_stop">{{ $results['equivalentFStop'] }}</b></td>
            </tr>
            <tr>
                <td><a target="_blank" href="https://en.wikipedia.org/wiki/Aspect_ratio_(image)">Aspect ratio</a></td>
                <td>
                    <span id="js-aspect-ratio" @if (!$results['aspectRatio']) class="hidden"@endif>
                        <b id="results_aspect_ratio">{{ $results['aspectRatio'] }}</b>
                        or
                    </span>

                    <b id="results_aspect_ratio_decimal">{{ $results['aspectRatioDecimal'] }}</b>
                </td>
            </tr>
            <tr>
                <td style="display: flex; justify-content: space-between; align-items: center">
                    <div><a target="_blank" href="https://shuttermuse.com/calculate-field-of-view-camera-lens/">Angle of view</a></div>
                    <div id="angle_of_view" style="margin: 0;"></div>
                </td>
                <td>
                    <b>{{ $results['angleOfView'] }}</b>º
                </td>
            </tr>
        </table>
    </fieldset>

    <div>
        <button class="no-js">Submit</button>
        @if(count(Request::query()))
        <a href="/cropfactor" hx-target="form" hx-get="/cropfactor">Reset form</a>
        @endif
    </div>
    <script>
        window.degToRad = (degrees) => {
            return degrees * (Math.PI / 180);
        };

        window.angleOfView = (angle) => {
            console.log('angle', angle);
            let svg = d3
            .select("#angle_of_view")
            .append("svg")
            .attr("width", 50)
            .attr("height", 50);

            svg.append("circle")
                .attr("transform", "translate(25,25)")
                .attr("cx", 0)
                .attr("xy", 0)
                .attr("r", 25)
                .attr("fill", "papayawhip");

            svg.append("path")
                .attr("transform", "translate(25,25)")
                .attr(
                    "d",
                    d3
                        .arc()
                        .innerRadius(0)
                        .outerRadius(25)
                        .startAngle(-degToRad(angle / 2) + degToRad(90))
                        .endAngle(degToRad(angle / 2) + degToRad(90))
                )
                .attr("stroke", "transparent")
                .attr("fill", "dodgerblue");
        };

        angleOfView({{ $results['angleOfView'] }});
    </script>
</form>
