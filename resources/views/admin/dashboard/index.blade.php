@extends('admin.layouts')
@section('title')
    Dashboard
@endsection

@section('style')
    <style>
        /* .highcharts-figure,
                                    .highcharts-data-table table {
                                        min-width: 310px;
                                        max-width: 800px;
                                        margin: 1em auto;
                                    }

                                    .highcharts-data-table table {
                                        font-family: Verdana, sans-serif;
                                        border-collapse: collapse;
                                        border: 1px solid #ebebeb;
                                        margin: 10px auto;
                                        text-align: center;
                                        width: 100%;
                                        max-width: 500px;
                                    }

                                    .highcharts-data-table caption {
                                        padding: 1em 0;
                                        font-size: 1.2em;
                                        color: #555;
                                    }

                                    .highcharts-data-table th {
                                        font-weight: 600;
                                        padding: 0.5em;
                                    }

                                    .highcharts-data-table td,
                                    .highcharts-data-table th,
                                    .highcharts-data-table caption {
                                        padding: 0.5em;
                                    }

                                    .highcharts-data-table thead tr,
                                    .highcharts-data-table tr:nth-child(even) {
                                        background: #f8f8f8;
                                    }

                                    .highcharts-data-table tr:hover {
                                        background: #f1f7ff;
                                    } */

        /* .highcharts-figure,
                        .highcharts-data-table table {
                            min-width: 310px;
                            margin: 1em auto;
                        }

                        #container {
                            height: 400px;
                        }

                        .highcharts-data-table table {
                            font-family: Verdana, sans-serif;
                            border-collapse: collapse;
                            border: 1px solid #ebebeb;
                            margin: 10px auto;
                            text-align: center;
                            width: 100%;
                            max-width: 500px;
                        }

                        .highcharts-data-table caption {
                            padding: 1em 0;
                            font-size: 1.2em;
                            color: #555;
                        }

                        .highcharts-data-table th {
                            font-weight: 600;
                            padding: 0.5em;
                        }

                        .highcharts-data-table td,
                        .highcharts-data-table th,
                        .highcharts-data-table caption {
                            padding: 0.5em;
                        }

                        .highcharts-data-table thead tr,
                        .highcharts-data-table tr:nth-child(even) {
                            background: #f8f8f8;
                        }

                        .highcharts-data-table tr:hover {
                            background: #f1f7ff;
                        } */
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                {{-- Quantity Claim Transaction --}}
                                Employee Accounts
                            </h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                {{-- Quantity Claim Outstanding --}}
                                VDC Catalogs
                            </h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                {{-- Quantity Claim Approved --}}
                                Units
                            </h4>
                        </div>
                        <div class="card-body">
                            1,201
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                {{-- Quantity Claim Rejected --}}
                                VDC Claims
                            </h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4>Claim Form</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Detail</a>
                   
                </div>
            </div>
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                 
                </figure>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Claim Form VDC Claim</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">Detail</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="donut_chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quantities VDC Claim</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">Detail</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="bar_chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/avatar-1.png') }}"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="text-primary float-right">Now</div>
                                    <div class="media-title">Farhan A Mujib</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                        Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/avatar-2.png') }}"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">12m</div>
                                    <div class="media-title">Ujang Maman</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                        Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/avatar-3.png') }}"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">17m</div>
                                    <div class="media-title">Rizal Fakhri</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                        Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/avatar-4.png') }}"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">21m</div>
                                    <div class="media-title">Alfa Zulkarnain</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                        Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                        </ul>
                        <div class="pt-1 pb-1 text-center">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>

    <script type="text/javascript">
        // Data retrieved from https://www.ssb.no/energi-og-industri/olje-og-gass/statistikk/sal-av-petroleumsprodukt/artikler/auka-sal-av-petroleumsprodukt-til-vegtrafikk
        // Highcharts.chart('container', {
        //     title: {
        //         text: 'Sales of petroleum products March, Norway',
        //         align: 'left'
        //     },
        //     xAxis: {
        //         categories: ['Jet fuel', 'Duty-free diesel', 'Petrol', 'Diesel', 'Gas oil']
        //     },
        //     yAxis: {
        //         title: {
        //             text: 'Million liters'
        //         }
        //     },
        //     tooltip: {
        //         valueSuffix: ' million liters'
        //     },
        //     plotOptions: {
        //         series: {
        //             borderRadius: '25%'
        //         }
        //     },
        //     series: [{
        //         type: 'column',
        //         name: '2020',
        //         data: [59, 83, 65, 228]
        //     }, {
        //         type: 'pie',
        //         name: 'Total',
        //         data: [{
        //             name: '2020',
        //             y: 619,
        //             color: Highcharts.getOptions().colors[0], // 2020 color
        //             dataLabels: {
        //                 enabled: true,
        //                 distance: -50,
        //                 format: '{point.total} M',
        //                 style: {
        //                     fontSize: '15px'
        //                 }
        //             }
        //         }, {
        //             name: '2021',
        //             y: 586,
        //             color: Highcharts.getOptions().colors[1] // 2021 color
        //         }],
        //         center: [75, 65],
        //         size: 100,
        //         innerSize: '70%',
        //         showInLegend: false,
        //         dataLabels: {
        //             enabled: false
        //         }
        //     }]
        // });
        Highcharts.setOptions({
            /*     colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'] */
            colors: ['#Ff0000', '#f3ca30']
        });
        Highcharts.chart('donut_chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Claim Form by Status',
                align: 'center',
                fontFamily: 'Poppins',
            },
            subtitle: {
                // text: '3D donut in Highcharts',
                // align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                },
                // colors: ["#2caffe", "#544fc5"],
            },
            series: [{
                name: 'Claim Form Status',
                data: [
                    ['CLOSE', 16],
                    ['OPEN', 12],
                    // ['USA', 8],
                    // ['Sweden', 8],
                    // ['Netherlands', 8],
                    // ['ROC', 6],
                    // ['Austria', 7],
                    // ['Canada', 4],
                    // ['Japan', 3]

                ]
            }]
        });

        // Highcharts.setOptions({
        //     /*     colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'] */
        //     colors: ['#247c38','#7c6424', '#7c2468', '#243c7c'] 
        // });
        var colors = ['#247c38', '#7c6424', '#7c2468', '#243c7c'];
        Highcharts.chart({
            chart: {
                renderTo: 'bar_chart',
                type: 'column',
                // marginLeft: 150
            },
            title: {
                text: 'All Quantities',
                fontFamily: 'Poppins',
            },
            xAxis: {
                categories: [
                    'Quantity Claim Transaction',
                    'Quantity Claim Outstanding',
                    'Quantity Claim Approved',
                    'Quantity Claim Rejected',
                ],
                // categories: angket,
                title: {
                    text: null
                },
                scrollbar: {
                    enabled: true
                },
            },
            yAxis: {
                min: 0,
                title: {
                    // text: 'request / sec',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
                scrollbar: {
                    enabled: true
                },
            },
            tooltip: {
                // valueSuffix: ' req / sec'
            },
            plotOptions: {
                columns: {
                    colorByPoint: true,
                    dataLabels: {
                        enabled: true
                    },
                    // colors: ['#247c38','#7c6424', '#7c2468', '#243c7c'],

                    // colors: Highcharts.map(new Array(10), function() {
                    //     return '#' + Math.floor(Math.random() * 16777215).toString(16);
                    // }),

                    // color: function() {
                    //     return '#' + Math.floor(Math.random() * 16777215).toString(16);
                    // }
                    // color: Highcharts.getOptions().colors[Math.floor(Math.random() * Highcharts.getOptions()
                    //     .colors.length)]
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                text: 'bkmtsngresik.com',
                href: 'https://bkmtsngresik.com/'
            },
            scrollbar: {
                barBackgroundColor: 'gray',
                barBorderRadius: 7,
                barBorderWidth: 0,
                buttonBackgroundColor: 'gray',
                buttonBorderWidth: 0,
                buttonArrowColor: 'yellow',
                buttonBorderRadius: 7,
                rifleColor: 'yellow',
                trackBackgroundColor: 'white',
                trackBorderWidth: 1,
                trackBorderColor: 'silver',
                trackBorderRadius: 7
            },
            series: [{
                name: 'Total Quantity',
                data: [90, 30, 20, 140],
                colorByPoint: true, // Enable colorByPoint
                colors: colors, // Set colors array

                point: {
                    events: {
                        update: function(event) {
                            this.graphic.attr({
                                fill: event.target.color
                            });
                        }
                    }
                }
                // color: colors,
                // color:'#243C7C',


            }],
        });
    </script>
@endsection
