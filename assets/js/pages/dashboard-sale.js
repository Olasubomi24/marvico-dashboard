'use strict';
$(document).ready(function() {
    setTimeout(function() {
        floatchart()
    }, 700);
    // [ campaign-scroll ] start
    var px = new PerfectScrollbar('.feed-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    var px = new PerfectScrollbar('.pro-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    // [ campaign-scroll ] end
});

function floatchart() {
    // [ support-chart ] start
    $(function() {
        var options1 = {
            chart: {
                type: 'area',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                data: [0, 20, 10, 45, 30, 55, 20, 30, 0]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Ticket '
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart"), options1).render();
        var options2 = {
            chart: {
                type: 'bar',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            plotOptions: {
                bar: {
                    columnWidth: '70%'
                }
            },
            series: [{
                data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 25, 44, 12, 36, 9, 54]
            }],
            xaxis: {
                crosshairs: {
                    width: 1
                },
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart1"), options2).render();
    });
    // [ support-chart ] end
    // [ account-chart ] start
    $(function() {
        const transactionAmount = "["+document.getElementById('transactionAmount').value+"]";
        const parsedTransactionAmount = JSON.parse(transactionAmount);
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0, 3],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                    
                },
                colors: ['#1b856a'],
                series: [{
                    name: 'Amount',
                    type: 'column',
                    data: parsedTransactionAmount
                }
                
            ],
                fill: {
                    opacity: [0.85, 1],
                },
                labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov','Dec'],
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'date'
                },
                yaxis: {
                    tickAmount: 7,
                    labels: {
                      formatter: function(value) {
                        if (value >= 1000) {
                          return "#" + (value / 1000).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ",000";
                        }
                        return "#" + value + ",000";
                      }
                    }
                  },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "# " + y.toLocaleString('en');
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#account-chart"),
                options
            );
            chart.render();
        });
    });
    $(function() {
        const transactionCount = "["+document.getElementById('transactionCount').value+"]";
        const parsedTransactionCount = JSON.parse(transactionCount);
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0, 3],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#6610F2'],
                series: [ {
                    name: 'Count',
                    type: 'column',
                    data: parsedTransactionCount,
                }
                
            ],
                fill: {
                    opacity: [0.85, 1],
                },
                labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov','Dec'],
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'date'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toLocaleString('en');
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#account-charts"),
                options
            );
            chart.render();
        });
    });
    // [ account-chart ] end
    // [ satisfaction-chart ] start
    $(function() {
        var options = {
            chart: {
                height: 260,
                type: 'pie',
            },
            series: [66, 50, 40, 30],
            labels: ["extremely Satisfied", "Satisfied", "Poor", "Very Poor"],
            legend: {
                show: true,
                offsetY: 50,
            },
            dataLabels: {
                enabled: true,
                dropShadow: {
                    enabled: false,
                }
            },
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#7267EF',
                }
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 320,

                    },
                    legend: {
                        position: 'bottom',
                        offsetY: 0,
                    }
                }
            }]
        }
        var chart = new ApexCharts(document.querySelector("#satisfaction-chart"), options);
        chart.render();
    });
    // [ satisfaction-chart ] end
}