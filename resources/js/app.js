import "./bootstrap";
import * as d3 from "d3";

const degToRad = (degrees) => {
    return degrees * (Math.PI / 180);
};

const angle = 39.6;

var svg = d3
    .select("#arc")
    .append("svg")
    .attr("width", 200)
    .attr("height", 200);

svg.append("path")
    .attr("transform", "translate(100,100)")
    .attr(
        "d",
        d3
            .arc()
            .innerRadius(0)
            .outerRadius(90)
            .startAngle(-degToRad(angle / 2) + degToRad(90))
            .endAngle(degToRad(angle / 2) + degToRad(90))
    )
    .attr("stroke", "transparent")
    .attr("fill", "dodgerblue");
