$(function () {
    // Create the chart
    $('#chart-categories').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: ''
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },
      colors: [
        '#fffccd',
        '#b4b4b4',
        '#666666',
        '#ff5960',
        '#e61e26',
        '#ac1619'
    ],

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Subjects',
            colorByPoint: true,
            data: [{
                name: 'Subject 1',
                y: 56.33,
                drilldown: 'Subject 1'
            }, {
                name: 'Subject 2',
                y: 24.03,
                drilldown: 'Subject 2'
            }, {
                name: 'Subject 3',
                y: 10.38,
                drilldown: 'Subject 3'
            }, {
                name: 'Subject 4',
                y: 4.77,
                drilldown: 'Subject 4'
            }, {
                name: 'Subject 5',
                y: 0.91,
                drilldown: 'Subject 5'
            }, {
                name: 'Subject 6',
                y: 0.2,
                drilldown: null
            }]
        }],
        drilldown: {
            series: [{
                name: 'Subject 1',
                id: 'Subject 1',
                data: [
                    [
                        'Sub 1.1',
                        24.13
                    ],
                    [
                        'Sub 1.2',
                        17.2
                    ],
                    [
                        'Sub 1.3',
                        8.11
                    ],
                    [
                        'Sub 1.4',
                        5.33
                    ],
                    [
                        'Sub 1.5',
                        1.06
                    ],
                    [
                        'Sub 1.6',
                        2.5
                    ]
                ]
            }, {
                name: 'Subject 2',
                id: 'Subject 2',
                data: [
                    [
                        'Sub 2.1',
                        5
                    ],
                    [
                        'Sub 2.2',
                        4.32
                    ],
                    [
                        'Sub 2.3',
                        3.68
                    ],
                    [
                        'Sub 2.4',
                        2.96
                    ],
                    [
                        'Sub 2.5',
                        2.53
                    ],
                    [
                        'Sub 2.6',
                        1.45
                    ],
                    [
                        'Sub 2.7',
                        1.24
                    ],
                    [
                        'Sub 2.8',
                        0.85
                    ],
                    [
                        'Sub 2.9',
                        0.6
                    ],
                    [
                        'Sub 3.0',
                        0.55
                    ],
                    [
                        'Sub 3.1',
                        0.38
                    ],
                    [
                        'Sub 3.2',
                        0.19
                    ],
                    [
                        'Sub 3.3',
                        0.14
                    ],
                    [
                        'Sub 3.4',
                        0.14
                    ]
                ]
            }, {
                name: 'Subject 3',
                id: 'Subject 3',
                data: [
                    [
                        'Sub 3.1',
                        2.76
                    ],
                    [
                        'Sub 3.2',
                        2.32
                    ],
                    [
                        'Sub 3.3',
                        2.31
                    ],
                    [
                        'Sub 3.4',
                        1.27
                    ],
                    [
                        'Sub 3.5',
                        1.02
                    ],
                    [
                        'Sub 3.6',
                        0.33
                    ],
                    [
                        'Sub 3.7',
                        0.22
                    ],
                    [
                        'Sub 3.8',
                        0.15
                    ]
                ]
            }, {
                name: 'Subject 4',
                id: 'Subject 4',
                data: [
                    [
                        'Sub 4.1',
                        2.56
                    ],
                    [
                        'Sub 4.2',
                        0.77
                    ],
                    [
                        'Sub 4.3',
                        0.42
                    ],
                    [
                        'Sub 4.4',
                        0.3
                    ],
                    [
                        'Sub 4.5',
                        0.29
                    ],
                    [
                        'Sub 4.6',
                        0.26
                    ],
                    [
                        'Sub 4.7',
                        0.17
                    ]
                ]
            }, {
                name: 'Subject 5',
                id: 'Subject 5',
                data: [
                    [
                        'Sub 5.1',
                        0.34
                    ],
                    [
                        'Sub 5.2',
                        0.24
                    ],
                    [
                        'Sub 5.3',
                        0.17
                    ],
                    [
                        'Sub 5.4',
                        0.16
                    ]
                ]
            }]
        }
    });
});