<x-layout title="Home Page">
    <h1>Hello, world!</h1>

    <canvas style="border: 3px solid #ccc;"></canvas>

    <div id="arc" style="border: 3px solid green; margin-top: 2rem;"></div>

    @push('scripts')
        <script>
            const canvas = document.querySelector("canvas");
            const ctx = canvas.getContext("2d");

            const angle = 39.6;

            const degToRad = (degrees) => {
                return degrees * (Math.PI / 180);
            };

            const arcValues = {
                x: 100,
                y: 75,
                radius: 90,
                startAngle: -degToRad(angle / 2),
                endAngle: degToRad(angle / 2),
            };

            ctx.beginPath();
            ctx.arc(
                arcValues.x,
                arcValues.y,
                arcValues.radius,
                arcValues.startAngle,
                arcValues.endAngle,
            );
            ctx.stroke();
        </script>
    @endpush
</x-layout>
