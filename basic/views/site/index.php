<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<script>
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
    };

    window.randomScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    }
</script>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div style="width: 75%">
                <canvas id="canvas"></canvas>
            </div>
            <button id="randomizeData">Randomize Data</button>
            <script>
                var chartData = {
                    labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль"],
                    datasets: [{
                        type: 'line',
                        label: 'Значение',
                        borderColor: window.chartColors.blue,
                        borderWidth: 2,
                        fill: false,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }, {
                        type: 'bar',
                        label: 'Среднее значение',
                        backgroundColor: window.chartColors.red,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ],
                        borderColor: 'white',
                        borderWidth: 2
                    }, ]

                };
                window.onload = function() {
                    var ctx = document.getElementById("canvas").getContext("2d");
                    window.myMixedChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'График выполнения'
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: true
                            }
                        }
                    });
                };

                document.getElementById('randomizeData').addEventListener('click', function() {
                    chartData.datasets.forEach(function(dataset) {
                        dataset.data = dataset.data.map(function() {
                            return randomScalingFactor();
                        });
                    });
                    window.myMixedChart.update();
                });
            </script>
        </div>

    </div>
</div>
