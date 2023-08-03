<x-layout title="Home Page">
    <h1>Hello, world!</h1>

    <canvas style="border: 3px solid #ccc;"></canvas>

    @push('scripts')
        <script>
            const canvas = document.querySelector("canvas");
            const ctx = canvas.getContext("2d");

            const arcValues = {
                x: 100,
                y: 75,
                radius: 50,
                startAngle: 0,
                endAngle: 39.6,
            };

            ctx.beginPath();
            ctx.arc(
                arcValues.x,
                arcValues.y,
                arcValues.radius,
                arcValues.startAngle,
                arcValues.endAngle * (Math.PI / 180)
            );
            ctx.stroke();
        </script>
    @endpush
</x-layout>
