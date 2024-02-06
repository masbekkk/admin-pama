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
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Lead Time (LT)</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="text-small font-weight-bold text-muted float-right text_lt_create_cwp">2,100</div>
                    <div class="font-weight-bold mb-1">LT Create Form Claim</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar prog_lt_create_cwp" role="progressbar" data-width="100%" aria-valuenow="1"
                            aria-valuemin="0" aria-valuemax="100000"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-small font-weight-bold text-muted float-right text_lt_delivery">1,880</div>
                    <div class="font-weight-bold mb-1">LT Delivery to Supplier</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar prog_lt_delivery" role="progressbar" data-width="67%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-small font-weight-bold text-muted float-right text_lt_feedback">1,521</div>
                    <div class="font-weight-bold mb-1">LT Feedback Supplier</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar prog_lt_feedback" role="progressbar" data-width="58%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-small font-weight-bold text-muted float-right text_lt_aging">884</div>
                    <div class="font-weight-bold mb-1">Aging</div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar prog_lt_feedback" role="progressbar" data-width="36%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
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
        function donutChart(pieChart = null) {
            Highcharts.setOptions({
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
                },
                credits: {
                    text: 'pamapersada.com',
                    href: 'https://pamapersada.com/'
                },
                series: [{
                    name: 'Claim Form Status',
                    data: pieChart
                }]
            });
        }

        function columnChart(columnChart = null) {
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
                    text: 'pamapersada.com',
                    href: 'https://pamapersada.com/'
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
                    data: columnChart,
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
        }

        function countBetweenTwoDates(firstDate, secondDate) {
            // console.log('from input: ' + firstDate + ' and ' + secondDate)
            const timeDifference = firstDate.getTime() - secondDate.getTime();
            // console.log('timedifference: ' + timeDifference)
            const daysDifference = Math.round(timeDifference / (1000 * 3600 * 24));
            return daysDifference;
        }

        function countLTCreateCWP(dateSend, dateReport) {
            let dateSendToSupplier;
            let reportDate = new Date(dateReport);
            // console.log('after new DATE datesendtosupp: ', dateSendToSupplier)
            if (dateSend != null) {

                dateSendToSupplier = new Date(dateSend)
            } else {
                dateSendToSupplier = new Date();
            }
            // console.log(countBetweenTwoDates(dateSendToSupplier, reportDate))
            return countBetweenTwoDates(dateSendToSupplier, reportDate);
        }

        function countLTDlvry(dateReceive, dateSend) {
            let dateReceivedSupplier;
            let dateSendToSupplier = new Date(dateSend);
            // console.log(dateSendToSupplier)
            if (dateReceive != null) {
                // alert("SOKSO")
                dateReceivedSupplier = new Date(dateReceive)
            } else if (isNaN(dateSendToSupplier)) {

                dateReceivedSupplier = new Date();
            } else {
                console.log("kksksksksk")
                dateSendToSupplier = new Date();
                dateReceivedSupplier = new Date();
            }
            // return data
            return countBetweenTwoDates(dateReceivedSupplier, dateSendToSupplier);
        }

        function countLTFeedback(dateClaim, dateReceive) {

            let dateClaimSupplier;
            let dateReceivedSupplier = new Date(dateReceive);
            if (dateClaim != null) {
                // console.log("ffff")
                dateClaimSupplier = new Date(dateClaim)
            } else if (isNaN(dateReceivedSupplier)) {
                // console.log("hshsh")
                // console.log(dateReceivedSupplier)
                // console.log("isi full: ", full.date_received_supplier)
                dateClaimSupplier = new Date();
            } else {
                dateReceivedSupplier = new Date();
                dateClaimSupplier = new Date();
            }
            // return data
            return countBetweenTwoDates(dateClaimSupplier, dateReceivedSupplier);
        }

        function countLTAging(dateClaim, dateReport) {
            let dateClaimStatus;
            let reportDate = new Date(dateReport);
            if (dateClaim != null) {
                dateClaimStatus = new Date(dateClaim)
            } else {
                dateClaimStatus = new Date();
            }
            // return data
            return countBetweenTwoDates(dateClaimStatus, reportDate);
        }

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('get.vdc_claim') }}",
                method: 'GET',
                dataType: 'json',
                error: function(error) {
                    columnChart([])
                },
                success: function(response) {
                    var qty_vdc_claim = 0,
                        qty_claim_approved = 0,
                        qty_claim_rejected = 0,
                        qty_outstanding = 0,
                        lt_create_cwp = 0,
                        lt_delivery = 0,
                        lt_feedback = 0,
                        lt_aging = 0, open_form_claim = 0, close_form_claim = 0;

                    $.each(response.data, function(index, value) {
                        qty_vdc_claim += value.qty_claim_approved;
                        qty_claim_approved += value.qty_claim_approved;
                        qty_claim_rejected += value.qty_claim_rejected;
                        qty_outstanding += (value.qty_vdc_claim - value.qty_claim_approved);
                        lt_create_cwp += countLTCreateCWP(value.date_send_to_supplier, value
                            .report_date);
                        lt_delivery += countLTDlvry(value.date_received_supplier, value
                            .date_send_to_supplier);
                        lt_feedback += countLTFeedback(value.date_claim_status, value
                            .date_received_supplier);
                        lt_aging += countLTAging(value.date_claim_status, value.report_date);

                        if (value.dept_head?.name === null)
                        {
                            open_form_claim++;
                        } else {
                            close_form_claim++;
                        }
                        // console.log(lt_delivery)

                    });
                    console.log(open_form_claim, close_form_claim);
                    var isi = [
                        ['CLOSE', close_form_claim],
                        ['OPEN', open_form_claim],

                    ];
                    donutChart(isi)
                    // console.log([qty_vdc_claim, qty_outstanding, qty_claim_approved, qty_claim_rejected])
                    columnChart([qty_vdc_claim, qty_outstanding, qty_claim_approved,
                        qty_claim_rejected
                    ]);
                    console.log((lt_create_cwp / 100) * 100 + '%');
                    $('.text_lt_create_cwp').text(lt_create_cwp);
                    $('.prog_lt_create_cwp').attr('data-width', (lt_create_cwp / 100) * 100 + '%');
                    $('.prog_lt_create_cwp').css('width', (lt_create_cwp / 100) * 100 + '%');
                    // console.log(0+0)
                    $('.text_lt_delivery').text(lt_delivery);
                    $('.prog_lt_delivery').attr('data-width', (lt_delivery / 100) * 100 + '%');
                    $('.prog_lt_delivery').css('width', (lt_delivery / 100) * 100 + '%');

                    $('.text_lt_feedback').text(lt_feedback);
                    $('.prog_lt_feedback').attr('data-width', (lt_feedback / 100) * 100 + '%');
                    $('.prog_lt_feedback').css('width', (lt_feedback / 100) * 100 + '%');

                    $('.text_lt_aging').text(lt_aging);
                    $('.prog_lt_aging').attr('data-width', (lt_aging / 100) * 100 + '%');
                    $('.prog_lt_aging').css('width', (lt_aging / 100) * 100 + '%');

                }

            })
            donutChart();
            // columnChart();
        });
    </script>
@endsection
