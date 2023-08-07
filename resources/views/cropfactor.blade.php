<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    @push('scripts')
        <script>
            const angle = {{ $results['angleOfView'] }};
            const degToRad = (degrees) => degrees * (Math.PI / 180);
            const startAngle = (angle) => -degToRad(angle / 2) + degToRad(90);
            const endAngle = (angle) => degToRad(angle / 2) + degToRad(90);

            const createArc = (angle) => {
                return d3
                    .arc()
                    .innerRadius(0)
                    .outerRadius(25)
                    .startAngle(startAngle(angle))
                    .endAngle(endAngle(angle));
            };

            const svg = d3
                .select('#angle_of_view')
                .append('svg')
                .attr('width', 50)
                .attr('height', 50);

            svg.append('circle')
                .attr('transform', 'translate(25,25)')
                .attr('cx', 0)
                .attr('xy', 0)
                .attr('r', 25)
                .attr('fill', 'papayawhip');

            const slice = svg.append('path')
                .attr('transform', 'translate(25,25)')
                .attr(
                    'd',
                    createArc(angle),
                )
                .attr('stroke', 'transparent')
                .attr('fill', 'dodgerblue');

            const angleOfView = (angle) => {
                svg.selectChild('path').attr('d', createArc(angle));
            }
        </script>
    @endpush

    @include('cropfactor-form')
</x-layout>
