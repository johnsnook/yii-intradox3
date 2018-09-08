<?php
/** @var $this LogController */
/** @var $model Log */
?>

<script type="text/javascript" src="/js/d3/d3.js"></script>
<script type="text/javascript" src="/js/Please-compressed.js"></script>
<style type="text/css">
    .chart{
        border: 1px solid lightgray;
    }
    .chart rect {
        fill: lightblue;
    }

    .chart text {
        fill: black;
        font: 10px sans-serif;
        /*text-anchor: end;*/
    }
</style>
<svg class="chart"></svg>
<?php
//echo cal_days_in_month(CAL_GREGORIAN, 8, 2003);
?>
<script type="text/javascript">
    var theData = null;
    var theUrl = '<?= $this->createUrl('log/getAjax') ?>';
    var personId = '<?= $model->id ?>';
    var margin = {top: 20, right: 30, bottom: 30, left: 40};
//    var height = 500 - margin.top - margin.bottom;

    var width = $('svg.chart').parent().innerWidth() + margin.left + margin.right,
      barHeight = 20, height;
    var x, y;
    var chart;

    d3.json(theUrl + "&person_id=" + personId, function (data) {
        theData = data;
        plox(theData);
    });


    function plox(data) {
        height = barHeight * data.length;
        x = d3.scale.linear()
          .range([0, width - 60]);
        y = d3.scale.ordinal()
          .rangeRoundBands([0, height], .1);

        var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left");

        chart = d3.select(".chart")
          .attr("width", width);
        //console.log(data);
        x.domain([0, d3.max(data, function (d) {
                return d.data;
            })]);

        chart.attr("height", height);
        chart.selectAll("g").remove();

        var bar = chart.selectAll("g")
          .data(data)
          .enter().append("g")
          .attr("transform", function (d, i) {
              return "translate(0," + i * barHeight + ")";
          })
          .attr("class", "y axis")
          .call(yAxis);

        bar.append("text")
          .attr("y", barHeight / 2)
          .attr("dy", ".35em")
          .text(function (d) {
              return d.label + ':';
          });

        bar.append("rect")
          .attr("x", 61)
          .attr("width", function (d) {
              return x(d.data);
          })
          .attr("height", barHeight - 1);

        bar.append("text")
          .attr("x", function (d) {
              //return x(d[1]) + 45;
              return 65;
          })
          .attr("y", barHeight / 2)
          .attr("dy", ".35em")
          .text(function (d) {
              return d.data;
          });

        $('.chart rect').each(function (i, item) {
            $(item).css('fill', Please.make_color({
                saturation: .3, //set your saturation manually
            }));
        });
    }

    function type(d) {
        d.data = +d.data; // coerce to number
        return d;
    }

    function updateWindow() {
        width = $('svg.chart').parent().innerWidth();// - margin.left - margin.right,
        //chart.attr("width", $('svg.chart').parent().innerWidth());
        plox(theData);
    }
    window.onresize = updateWindow;

    $('a[href="#tabTimeline"]').click(function () {
        setTimeout(function () {
            updateWindow();
        }, 250);

    });

</script>