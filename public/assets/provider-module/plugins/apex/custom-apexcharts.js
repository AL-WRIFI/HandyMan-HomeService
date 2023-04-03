/*---------------------------------------------
Template name :  Dashmin
Version       :  1.0
Author        :  ThemeLooks
Author url    :  http://themelooks.com


** Apex Chart

----------------------------------------------*/

$(function() {
    'use strict';
    
  /*==================================
    01: Apex Area Chart
    ====================================*/
    var area_options = {
        chart: {
            type:"area",
            height: 112,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            opacity: .05
        },
        series:[ {
            data: [10, 12, 5, 18, 11, 16]
        }
        ],
        yaxis: {
            min: 0
        },
        colors:["#E580FD"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            padding: {
                top: 5,
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area_Chart = new ApexCharts( document.querySelector("#apex_area-chart"), area_options );
    area_Chart.render();

    /*==================================
    02: Apex Area2 Chart
    ====================================*/
    var area2_options = {
        chart: {
            type:"area",
            height: 112,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            opacity: .05
        },
        series:[ {
            data: [17, 12, 10, 18, 11, 16]
        }
        ],
        yaxis: {
            min: 0
        },
        colors:["#4F9DF8"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            padding: {
                top: 5,
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area2_Chart = new ApexCharts( document.querySelector("#apex_area2-chart"), area2_options );
    area2_Chart.render();

    /*==================================
    03: Apex Area3 Chart
    ====================================*/
    var area3_options = {
        chart: {
            type:"area",
            height: 112,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            opacity: .05
        },
        series:[ {
            data: [5, 12, 10, 18, 11, 16]
        }
        ],
        yaxis: {
            min: 0
        },
        colors:["#FF81A3"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            padding: {
                top: 5,
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area3_Chart = new ApexCharts( document.querySelector("#apex_area3-chart"), area3_options );
    area3_Chart.render();

    /*==================================
    04: Apex Area4 Chart
    ====================================*/
    var area4_options = {
        chart: {
            type:"area",
            height: 112,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            opacity: .05
        },
        series: [{
            name: 'series1',
            data: [17, 12, 10, 18, 11, 16]
          }, {
            name: 'series2',
            data: [12, 17, 13, 15, 16, 14]
        }],
        yaxis: {
            min: 0
        },
        colors:["#09D1DE", "#E580FD"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            padding: {
                top: 5,
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area4_Chart = new ApexCharts( document.querySelector("#apex_area4-chart"), area4_options);
    area4_Chart.render();

    /*==================================
    02: Apex Area5 Chart
    ====================================*/
    var area5_options = {
        chart: {
            type:"area",
            height: 200,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 2
        },
        fill: {
            opacity: .05
        },
        series:[ {
            data: [17, 12, 10, 18, 11, 16]
        }
        ],
        yaxis: {
            min: 0
        },
        colors:["#4F9DF8"],
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            padding: {
                top: 5,
            },
            borderColor: 'transparent'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area5_Chart = new ApexCharts( document.querySelector("#apex_area5-chart"), area5_options );
    area5_Chart.render();

    /*==================================
    02: Apex Area6 Chart
    ====================================*/
    var area6_options = {
        chart: {
            type:"area",
            height: 375,
            offsetY:0,
            sparkline: {
                enabled: true
            }
        },
        stroke: {
            curve: "smooth",
            width: 3
        },
        fill: {
            opacity: .05
        },
        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'right',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 0,
            height: 0,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 5,
                vertical: 20
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
                offsetY: 2
            },
        },
        series: [{
            name: 'Net Profit',
            data: [9, 8, 8.5, 10, 7.5, 9]
          }, {
            name: 'Revenue',
            data: [5.5, 7.5, 5.5, 6.5, 7, 6]
        }, {
            name: 'Cashflow',
            data: [4, 3, 5, 2.5, 3.5, 5.5]
        }],
        yaxis: {
            tickAmount: 5,
            min: 0,
            max: 10,
        },
        colors:["#09D1DE", "#E580FD", "#73AFFF"],
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back',
            padding: {
                top: 106,
            }, 
            yaxis: {
                lines: {
                    show: true
                }
            },
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var area6_Chart = new ApexCharts( document.querySelector("#apex_area6-chart"), area6_options );
    area6_Chart.render();

    
   /*==================================
    05: Apex Column Chart
    ====================================*/
    var column_options = {
        series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 50, 40]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 90, 70]
        }, {
            name: 'Cashflow',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 40, 60]
        }],
        chart: {
            type: 'bar',
            height: 389,
            toolbar: {
                show: false,
            },
        },
        colors: ['#76B0FF', '#67CF94', '#0AD1DE'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#76B0FF', '#67CF94', '#0AD1DE'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.6,
                stops: [0, 80],
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
            tickAmount: 4,
            title: {
                text: '$ (thousands)'
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 0,
            height: 60,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 5,
                vertical: 20
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands";
                }
            }
        }, 
        responsive: [{
            breakpoint: 576,
                options: {
                    legend: {
                        position: "top",
                        horizontalAlign: 'left',
                        height: 0,
                        itemMargin: {
                            horizontal: 5,
                            vertical: 10
                        },
                    }
                }
            }
        ],
    };

    var columnChart = new ApexCharts(document.querySelector("#apex_column-chart"), column_options);
    columnChart.render();


   /*==================================
    06: Apex Column2 Chart
    ====================================*/
    var column2_options = {
        series: [{
            name: 'Inflation',
            data: [2.3, 3.1, 4.0, 7.1, 4.0, 6.0, 5.2, 3.3, 2.4, 1.8]
        }],
        chart: {
            height: 65,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        colors: ['#15CEDB'],
    };

    var column2_chart = new ApexCharts(document.querySelector("#apex_column2-chart"), column2_options);
    column2_chart.render();

    /*==================================
    07: Apex Column3 Chart
    ====================================*/
    var column3_options = {
        series: [{
            name: 'Inflation',
            data: [2.3, 3.1, 4.0, 7.1, 4.0, 6.0, 5.2, 3.3, 2.4, 1.8]
        }],
        chart: {
            height: 65,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        colors: ['#E580FD'],
    };

    var column3_chart = new ApexCharts(document.querySelector("#apex_column3-chart"), column3_options);
    column3_chart.render();

    /*==================================
    08: Apex Column4 Chart
    ====================================*/
    var column4_options = {
        series: [{
            name: 'Inflation',
            data: [2.3, 3.1, 4.0, 7.1, 4.0, 6.0, 5.2, 3.3, 2.4, 1.8]
        }],
        chart: {
            height: 65,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        colors: ['#67CFA2'],
    };

    var column4_chart = new ApexCharts(document.querySelector("#apex_column4-chart"), column4_options);
    column4_chart.render();


    /*==================================
    08: Apex Column5 Chart
    ====================================*/
    var column5_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 10.9, 4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 11.2, 4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 10.2, ]
        }],
        chart: {
            height: 206,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            }, 
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#73AFFF'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#73AFFF'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.5,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column5_chart = new ApexCharts(document.querySelector("#apex_column5-chart"), column5_options);
    column5_chart.render();


    /*==================================
    08: Apex Column6 Chart
    ====================================*/
    var column6_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 8.9, 4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 9.2, 4.0, 3.4 ]
        }],
        chart: {
            height: 173,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            }, 
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#FF81A3'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#FF81A3'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.5,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column6_chart = new ApexCharts(document.querySelector("#apex_column6-chart"), column6_options);
    column6_chart.render();


    /*==================================
    08: Apex Column7 Chart
    ====================================*/
    var column7_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 8.9, 4.0, 3.4, 7.0, 5.5, 6.7, 4.6, 3.2, 4.6, 7.0, 5.5, 6.7, 9.2, 4.0, 3.4 ]
        }],
        chart: {
            height: 173,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            }, 
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#73AFFF'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#73AFFF'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.5,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column7_chart = new ApexCharts(document.querySelector("#apex_column7-chart"), column7_options);
    column7_chart.render();


    /*==================================
    08: Apex Column8 Chart
    ====================================*/
    var column8_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7]
        }],
        chart: {
            height: 118,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#FFB959'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#FFB959'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.7,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column8_chart = new ApexCharts(document.querySelector("#apex_column8-chart"), column8_options);
    column8_chart.render();


    /*==================================
    08: Apex Column9 Chart
    ====================================*/
    var column9_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7]
        }],
        chart: {
            height: 118,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#C491FF'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#C491FF'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.7,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column9_chart = new ApexCharts(document.querySelector("#apex_column9-chart"), column9_options);
    column9_chart.render();


    /*==================================
    08: Apex Column10 Chart
    ====================================*/
    var column10_options = {
        series: [{
            name: 'Inflation',
            data: [4.0, 3.4, 7.0, 5.5, 6.7]
        }],
        chart: {
            height: 118,
            type: 'bar',
            sparkline: {
                enabled: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ['#FC8BAC'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#FC8BAC'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.7,
                stops: [0, 100],
            },
            pattern: {
                style: 'verticalLines',
                width: 6,
                height: 6,
                strokeWidth: 2,
            },
        },
    };

    var column10_chart = new ApexCharts(document.querySelector("#apex_column10-chart"), column10_options);
    column10_chart.render();


   /*==================================
    09: Apex Line Chart
    ====================================*/
    var line_options = {
        series: [{
            name: 'Series',
            data: [4, 3, 10, 9, 29, 19, 22]
        }],
        chart: {
            height: 170,
            type: 'line',
            sparkline: {
                enabled: true,
            }
        },
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            },
            padding: {
                right: 5,
                left: 5
            }, 
        },
        colors:["#09D1DE"],
        xaxis: {
            type: 'datetime',
            categories: ['1/11/2020', '2/11/2020', '3/11/2020', '4/11/2020', '5/11/2020', '6/11/2020', '7/11/2020'],
        },
        markers: {
            size: 4,
            colors: ["#FFA41B"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
              size: 7,
            }
        },
        fill: {
            type: 'solid',
        },
        yaxis: {
            tickAmount: 4,
            min: 0,
            max: 30,
        },
    };

    var line_Chart = new ApexCharts(document.querySelector("#apex_line-chart"), line_options);
    line_Chart.render();


   /*==================================
    10: Apex Line Chart
    ====================================*/
    var line2_options = {
        series: [{
            name: 'Series',
            data: [16, 14, 15, 18, 12, 14, 17]
        }],
        chart: {
            height: 170,
            type: 'line',
            sparkline: {
                enabled: true,
            }
        },
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            },
            padding: {
                right: 5,
                left: 5
            }, 
        },
        colors:["#8280FD"],
        xaxis: {
            type: 'datetime',
            categories: ['1/11/2020', '2/11/2020', '3/11/2020', '4/11/2020', '5/11/2020', '6/11/2020', '7/11/2020'],
        },
        markers: {
            size: 4,
            colors: ["#E580FD"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
              size: 7,
            }
        },
        fill: {
            type: 'solid',
        },
        yaxis: {
            tickAmount: 4,
            min: 0,
            max: 30,
        },
    };

    var line2_Chart = new ApexCharts(document.querySelector("#apex_line2-chart"), line2_options);
    line2_Chart.render();

    /*==================================
    10: Apex Line3 Chart
    ====================================*/
    var line3_options = {
        series: [{
            name: "Desktops",
            data: [40, 56, 35, 30, 20, 40, 102, 50, 70, 60, 80, 62]
        }],
        chart: {
            height: 350,
            type: 'line',
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3,
            dashArray: 3
        },
        colors: ['#FFBA5A', '#8381FD'],
        grid: {
            borderColor: '#f5f5f5',
        },
        markers: {
            size: 8,
            colors: ["#67CF94"],
            hover: {
                size: 10,
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
            tickAmount: 4,
        },
        responsive: [
          {
            breakpoint: 576,
            options: {
                markers: {
                    size: 5,
                    colors: ["#67CF94"],
                    hover: {
                        size: 5,
                    }
                },
            }
          }
        ],
    };

    var line3_chart = new ApexCharts(document.querySelector("#apex_line3-chart"), line3_options);
    line3_chart.render();

    /*==================================
    11: Apex Line4 Chart
    ====================================*/
    var line4_options = {
        series: [{
            name: "Desktops",
            data: [40, 56, 35, 30, 20, 40, 102, 50, 70, 60, 80, 62]
        }],
        chart: {
            height: 311,
            type: 'line',
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3,
            dashArray: 3
        },
        colors: ['#FFBA5A', '#8381FD'],
        grid: {
            borderColor: '#f5f5f5',
        },
        markers: {
            size: 7,
            colors: ["#67CF94"],
            hover: {
                size: 8,
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
            tickAmount: 4,
        },
        responsive: [
          {
            breakpoint: 576,
            options: {
                markers: {
                    size: 5,
                    colors: ["#67CF94"],
                    hover: {
                        size: 5,
                    }
                },
            }
          }
        ],
    };

    var line4_chart = new ApexCharts(document.querySelector("#apex_line4-chart"), line4_options);
    line4_chart.render();


    /*==================================
    09: Apex Line Chart
    ====================================*/
    var line5_options = {
        series: [{
            name: 'Series',
            data: [4, 3, 10, 9, 29, 19, 22]
        }],
        chart: {
            height: 286,
            type: 'line',
            sparkline: {
                enabled: true,
            }
        },
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        grid: {
            show: true,
            borderColor: '#f5f5f5',
            strokeDashArray: 0,
            position: 'back', 
            yaxis: {
                lines: {
                    show: true
                }
            },
            padding: {
                right: 5,
                left: 5
            }, 
        },
        colors:["#09D1DE"],
        xaxis: {
            type: 'datetime',
            categories: ['1/11/2020', '2/11/2020', '3/11/2020', '4/11/2020', '5/11/2020', '6/11/2020', '7/11/2020'],
        },
        markers: {
            size: 4,
            colors: ["#FFA41B"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
              size: 7,
            }
        },
        fill: {
            type: 'solid',
        },
        yaxis: {
            tickAmount: 4,
            min: 0,
            max: 30,
        },
    };

    var line5_Chart = new ApexCharts(document.querySelector("#apex_line5-chart"), line5_options);
    line5_Chart.render();


   /*==================================
    12: Apex Radar Chart
    ====================================*/
    var radar_options = {
        series: [{
            name: 'Net Profit',
            data: [80, 50, 30, 40, 100, 20],
        }, {
            name: 'Revenue',
            data: [20, 30, 40, 80, 20, 80],
        }, {
            name: 'Cashflow',
            data: [44, 76, 78, 13, 43, 10],
        }],
        chart: {
            height: 408,
            type: 'radar',
            toolbar: {
                show: false,
            },
            dropShadow: {
                enabled: true,
                blur: 1,
                left: 1,
                top: 1
            }
        },
        colors: ['#09D1DE', '#FFB959', '#E580FD'],
        stroke: {
            width: 0
        },
        fill: {
            opacity: 0.4
        },
        markers: {
            size: 0
        },
        title: {
            text: 'Cloud Storage',
            margin: 0,
            style: {
                fontSize:  '17px',
                fontWeight: 'bold',
                fontFamily: '"PT Sans", sans-serif',
                color: '#333333'
            },
        },
        subtitle: {
            text: '72% space used',
            margin: 0,
            offsetY: 25,
            style: {
              fontSize:  '14px',
              fontFamily: '"PT Sans", sans-serif',
              color:  '#727272'
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: -62,
            height: 78,
            width: 100,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 0,
                vertical: 0
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
            },
        },
        xaxis: {
            categories: ['2014', '2015', '2016', '2017', '2018', '2019']
        },
        yaxis: {
            tickAmount: 4,
        },
        responsive: [{
            breakpoint: 768,
            options: {
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'left',
                    offsetY: -16,
                    height: 30,
                    width: '100%',
                    itemMargin: {
                        vertical: 5
                    },
                },
            },
        }]
    };

    var radar_chart = new ApexCharts(document.querySelector("#apex_radar-chart"), radar_options);
    radar_chart.render();

   /*==================================
    13: Apex Bar Chart
    ====================================*/
    var bar_options = {
        series: [{
            data: [44, 55, 41, 64, 22]
        }, {
            data: [53, 32, 33, 52, 13]
        }],
        chart: {
            type: 'bar',
            height: 389,
            toolbar: {
                show: false,
            },
        },
        colors: ['#FFBA5A', '#8381FD'],
        plotOptions: {
            bar: {
                horizontal: true,
                endingShape: 'rounded',
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: [2003, 2004, 2005, 2006, 2007],
        },
        yaxis: {
            tickAmount: 4,
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 13,
            offsetX: 8,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 5,
                vertical: 15
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
            },
        }
    };

    var bar_chart = new ApexCharts(document.querySelector("#apex_bar-chart"), bar_options);
    bar_chart.render();
    
   /*==================================
    14: Apex PIE Chart
    ====================================*/
    var pie_options = {
        series: [60, 10, 15, 25],
        chart: {
            width: 100 + "%",
            height: 330,
            type: 'pie',
            offsetY: -35,
            offsetX: 5,
        },
        colors: ["#CCF5F8", "#efaeff","#E9E7FF","#FFF4E6"],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '11px',
                colors:['#000000'],
            },
            background: {
                enabled: false,
            },
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.80,
                }
            },
        },
        legend: {
            position: 'left',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 30,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 4,
                //vertical: 20
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
            },
        },
        plotOptions: {
            pie: {
              customScale: 1.12,
              offsetY: 25,
              offsetX: 25,
            }
        },
        labels: ['USA', 'UK', 'Spain', 'France'],
        responsive: [{
            breakpoint: 1760,
            options: {
                chart: {
                    height: 300,
                },
                plotOptions: {
                    pie: {
                      customScale: 1,
                      offsetX: 0,
                    }
                },
                legend: {
                    position: 'bottom',
                    offsetY: -10,
                },
            }
        }],
    };

    var pie_chart = new ApexCharts(document.querySelector("#apex_pie-chart"), pie_options);
    pie_chart.render();

    /*==================================
    14: Apex PIE2 Chart
    ====================================*/
    var pie2_options = {
        series: [60, 10, 15, 25],
        chart: {
            width: 100 + "%",
            height: 330,
            type: 'pie',
            offsetY: -7,
            offsetX: 5,
        },
        colors: ["#E580FD", "#C491FF","#4C9EFE","#09D1DE"],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
                colors:['#ffffff'],
            },
            background: {
                enabled: false,
            },
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.80,
                }
            },
        },
        legend: {
            position: 'left',
            fontSize: '14px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 0,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 4,
                //vertical: 10
            },
            markers: {
                width: 5,
                height: 11,
                radius: 0,
            },
        },
        plotOptions: {
            pie: {
              //customScale: 1.12,
              offsetY: 25,
              offsetX: 85,
            }
        },
        labels: ['Facebook <span class="bold">$15</span>', 'Twitter  <span class="bold">$15</span>', 'Pinterest  <span class="bold">$15</span>', 'Instagram  <span class="bold">$15</span>'],
        responsive: [{
            breakpoint: 1900,
            options: {
                plotOptions: {
                    pie: {
                      offsetX: 50,
                    }
                },
            }
        },{
            breakpoint: 1700,
            options: {
                chart: {
                    height: 300,
                },
                plotOptions: {
                    pie: {
                      offsetX: 30,
                    }
                },
            }
        },{
            breakpoint: 1500,
            options: {
                plotOptions: {
                    pie: {
                      offsetX: 0,
                    }
                },
            }
        },{
            breakpoint: 1200,
            options: {
                chart: {
                    offsetY: 0,
                    offsetX: 0,
                },
                legend: {
                    position: 'bottom',
                    fontSize: '10px',
                    offsetY: -15,
                },
            }
        }],
    };

    var pie2_chart = new ApexCharts(document.querySelector("#apex_pie2-chart"), pie2_options);
    pie2_chart.render();

    /*==================================
    14: Apex PIE3 Chart
    ====================================*/
    var pie3_options = {
        series: [60, 10, 15, 25],
        chart: {
            width: 100 + "%",
            height: 350,
            type: 'pie',
            offsetY: -14,
            offsetX: 0,
        },
        colors: ["#CCF5F8", "#F1B4FF","#E9E7FF","#FFF4E6"],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
                colors:['#000000'],
            },
            background: {
                enabled: false,
            },
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.80,
                }
            },
        },
        legend: {
            show: false,
        },
        labels: ['United States', 'Australia', 'Canada', 'China'],
    };

    var pie3_chart = new ApexCharts(document.querySelector("#apex_pie3-chart"), pie3_options);
    pie3_chart.render();


    /*==================================
    14: Apex Domut Chart
    ====================================*/
    var donut_options = {
        series: [10, 12, 20, 18, 16],
        chart: {
            height: 290,
            type: 'donut',
        },
        labels: ["USA", "UK", "Spain", "France", "China", "Japan"],
        colors: ["#FFBE9C", "#FF9C9F", "#D19CFF", "#8ADBFF", "#B2F378", "#FFD971"],
        legend: {
            position: 'left',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 0,
            offsetX: -35,
            labels: {
                colors: "#727272"
            },
            itemMargin: {
                horizontal: 4,
                //vertical: 10
            },
            markers: {
                width: 17,
                height: 11,
                radius: 0,
            },
        },
        plotOptions: {
            pie: {
              offsetY: 0,
              offsetX: -10,
            }
        },
        responsive: [{
            breakpoint: 1900,
            options: {
                chart: {
                    height: 250
                },
            }
        }, {
            breakpoint: 1700,
            options: {
                legend: {
                    position: 'bottom',
                    offsetY: -10,
                },
                plotOptions: {
                    pie: {
                      offsetX: 0,
                    }
                },
            }
        }]
    };

    var donut_chart = new ApexCharts(document.querySelector("#apex_donut-chart"), donut_options);
    donut_chart.render();

});