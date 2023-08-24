<x-layout title="Crop Factor Calculator">
    <h1>Crop Factor Calculator</h1>

    @include('cropfactor-form')

    @push('scripts')
        <script>
            const angle = {{ $results['angleOfView'] }};
            const degToRad = degrees => degrees * (Math.PI / 180);
            const startAngle = angle => -degToRad(angle / 2) + degToRad(90);
            const endAngle = angle => degToRad(angle / 2) + degToRad(90);
            const currentAngle = () => document.getElementById('current-angle').innerHTML;

            const createArc = (angle) => {
                return d3
                    .arc()
                    .innerRadius(0)
                    .outerRadius(25)
                    .startAngle(startAngle(angle))
                    .endAngle(endAngle(angle));
            };

            const svg = d3
                .select('#d3')
                .append('svg')
                .attr('width', 50)
                .attr('height', 50);

            svg.append('circle')
                .attr('transform', 'translate(25,25)')
                .attr('cx', 0)
                .attr('xy', 0)
                .attr('r', 25)
                .attr('fill', 'var(--svg-fill)');

            const slice = svg.append('path')
                .attr('transform', 'translate(25,25)')
                .attr(
                    'd',
                    createArc(angle),
                )
                .attr('stroke', 'transparent')
                .attr('fill', 'var(--svg-wedge)');

            const angleOfView = (angle) => {
                svg.selectChild('path').attr('d', createArc(angle));
            }

            document.body.addEventListener('htmx:afterSwap', () => angleOfView(currentAngle()));

            document.body.addEventListener('htmx:configRequest', evt => {
                // Remove things from the querystring depending on what triggered the change.
                const triggeringElementName = evt.detail.triggeringEvent.target.name;

                if (triggeringElementName === 'preset') {
                    delete evt.detail.parameters.height;
                    delete evt.detail.parameters.width;
                } else {
                    if (triggeringElementName === 'height' || triggeringElementName === 'width') {
                        delete evt.detail.parameters.preset;
                    }
                    if (triggeringElementName !== 'height' && triggeringElementName !== 'width') {
                        delete evt.detail.parameters.height;
                        delete evt.detail.parameters.width;
                    }
                }
            });
        </script>
    @endpush
</x-layout>
