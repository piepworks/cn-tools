<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    <ul>
    @foreach ($presets as $preset)
        <li>
        {{ $preset['name'] }}
        @if (@isset($preset['items']))
            <ul>
            @foreach ($preset['items'] as $item)
                <li>{{ $item['name'] }}</li>
            @endforeach
            </ul>
        @endif
        </li>
    @endforeach
    </ul>

    <form action="">
        <button>Submit</button>
    </form>
</x-layout>
