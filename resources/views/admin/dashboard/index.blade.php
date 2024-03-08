@extends('admin.layouts')
@section('title')
    Dashboard
@endsection

@section('style')
    <style>

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
                            {{ $users }}
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
                            {{ $vdcCatalog }}
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
                            {{ $unit }}
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
                            {{ $vdcClaim }}
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
                            <a href="{{ route('vdc_claim.index') }}" class="btn btn-primary">Detail</a>

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
                            <a href="{{ route('vdc_claim.index') }}" class="btn btn-primary">Detail</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="qty_chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Status VDC Claim By PLANT 1</h4>
                        {{-- <div class="card-header-action">
                            <a href="{{ route('vdc_claim.index') }}" class="btn btn-primary">Detail</a>

                        </div> --}}
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="plant1_chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Status VDC Claim By PLANT 2</h4>
                        {{-- <div class="card-header-action">
                            <a href="{{ route('vdc_claim.index') }}" class="btn btn-primary">Detail</a>

                        </div> --}}
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="plant2_chart"></div>

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
                        <div class="progress-bar prog_lt_feedback" role="progressbar" data-width="36%"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                colors: ['#00ff00', '#Ff0000']
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
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                color: "#ffffff",
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                credits: {
                    text: 'pamapersada.com',
                    href: 'https://pamapersada.com/'
                },
                series: [{
                        name: 'Claim Form Status',
                        data: pieChart,
                    },

                ]
            });
        }

        function columnChart(content) {
            Highcharts.chart(content.idContainer, {
                chart: {
                    type: 'column'
                },
                title: {
                    text: content.title,
                    fontFamily: 'Poppins',
                },
                subtitle: {
                    // text: 'Source: <a href="https://worldpopulationreview.com/world-cities" target="_blank">World Population Review</a>'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        autoRotation: [-45, -90],
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Poppins'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: `Total ${content.unitName} (Summed)`
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    text: 'pamapersada.com',
                    href: 'https://pamapersada.com/'
                },
                tooltip: {
                    pointFormat: 'Total Quantity: <b>{point.y:.1f} </b>'
                },
                series: [{
                    name: 'Total Quantity',
                    colors: content.colors,
                    colorByPoint: true,
                    groupPadding: 0,
                    data: content.data,
                    dataLabels: {
                        enabled: true,
                        rotation: 0,
                        color: '#FFFFFF',
                        align: 'center',
                        // format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Poppins'
                        }
                    }
                }]
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
                        lt_aging = 0,
                        avg_lt_create_cwp = 0,
                        avg_lt_delivery = 0,
                        avg_lt_feedback = 0,
                        avg_lt_aging = 0,
                        open_form_claim = 0,
                        close_form_claim = 0,
                        totalData = 0,
                        openPlant1 = 0,
                        closePlant1 = 0,
                        openPlant2 = 0,
                        closePlant2 = 0;

                    $.each(response.data, function(index, value) {
                        qty_vdc_claim += value.qty_vdc_claim;
                        qty_claim_approved += value.qty_claim_approved;
                        qty_claim_rejected += value.qty_claim_rejected;
                        qty_outstanding += (value.qty_vdc_claim - (value.qty_claim_approved + value.qty_claim_rejected));
                        lt_create_cwp += countLTCreateCWP(value.date_send_to_supplier, value
                            .report_date);
                        lt_delivery += countLTDlvry(value.date_received_supplier, value
                            .date_send_to_supplier);
                        lt_feedback += countLTFeedback(value.date_claim_status, value
                            .date_received_supplier);
                        lt_aging += countLTAging(value.date_claim_status, value.report_date);

                        if (value.approval_depthead === null || value.remarks_depthead === null) {
                            open_form_claim++;
                        } else {
                            close_form_claim++;
                        }

                        if (value.dept_head.as_a === 'plant1' &&  (value.approval_depthead === null && value.remarks_depthead === null)) {
                            openPlant1++;
                        } else if (value.dept_head.as_a === 'plant1' && (value.approval_depthead !== null || value.remarks_depthead !== null)) {
                            closePlant1++;
                        }

                        if (value.dept_head.as_a === 'plant2' && (value.approval_depthead === null && value.remarks_depthead === null)) {
                            openPlant2++;
                        } else if (value.dept_head.as_a === 'plant2' &&  (value.approval_depthead !== null || value.remarks_depthead !== null)) {
                            closePlant2++;
                        }

                        totalData++;
                        // console.log(lt_delivery)

                    });
                    console.log(open_form_claim, close_form_claim);
                    var contentDonut = [
                        ['CLOSE', close_form_claim],
                        ['OPEN', open_form_claim],

                    ];
                    // console.log([qty_vdc_claim, qty_outstanding, qty_claim_approved, qty_claim_rejected])
                    var contentQty = {
                        idContainer: 'qty_chart',
                        title: 'All Quantities',
                        unitName: 'Quantity',
                        colors: ['#247c38', '#7c6424', '#7c2468', '#243c7c'],
                        data: [
                            ['Quantity Claim Transaction', qty_vdc_claim],
                            ['Quantity Claim Outstanding', qty_outstanding],
                            ['Quantity Claim Approved', qty_claim_approved],
                            ['Quantity Claim Rejected', qty_claim_rejected],
                        ],
                    };
                    donutChart(contentDonut)
                    columnChart(contentQty);

                    var contentP1 = {
                        idContainer: 'plant1_chart',
                        title: 'All Form Claim Status Handled By PLANT 1',
                        unitName: 'Total',
                        colors: ['#247c38', '#7c6424'],
                        data: [
                            ['OPEN', openPlant1],
                            ['CLOSE', closePlant1],
                        ],
                    };
                    columnChart(contentP1)

                    var contentP2 = {
                        idContainer: 'plant2_chart',
                        title: 'All Form Claim Status Handled By PLANT 2',
                        unitName: 'Total',
                        colors: ['#247c38', '#7c6424'],
                        data: [
                            ['OPEN', openPlant2],
                            ['CLOSE', closePlant2],
                        ],
                    };
                    columnChart(contentP2)
                    // console.log((avg_lt_create_cwp / 100) * 100 + '%');
                    avg_lt_create_cwp = lt_create_cwp / totalData;
                    avg_lt_delivery = lt_delivery / totalData;
                    avg_lt_feedback = lt_feedback / totalData;
                    avg_lt_aging = lt_aging / totalData;
                    // console.log(lt_create_cwp, avg_lt_create_cwp, totalData)
                    $('.text_lt_create_cwp').text(avg_lt_create_cwp);
                    $('.prog_lt_create_cwp').attr('data-width', (avg_lt_create_cwp / 100) * 100 + '%');
                    $('.prog_lt_create_cwp').css('width', (avg_lt_create_cwp / 100) * 100 + '%');
                    // console.log(0+0)
                    $('.text_lt_delivery').text(avg_lt_delivery);
                    $('.prog_lt_delivery').attr('data-width', (avg_lt_delivery / 100) * 100 + '%');
                    $('.prog_lt_delivery').css('width', (avg_lt_delivery / 100) * 100 + '%');

                    $('.text_lt_feedback').text(avg_lt_feedback);
                    $('.prog_lt_feedback').attr('data-width', (avg_lt_feedback / 100) * 100 + '%');
                    $('.prog_lt_feedback').css('width', (avg_lt_feedback / 100) * 100 + '%');

                    $('.text_lt_aging').text(avg_lt_aging);
                    $('.prog_lt_aging').attr('data-width', (avg_lt_aging / 100) * 100 + '%');
                    $('.prog_lt_aging').css('width', (avg_lt_aging / 100) * 100 + '%');

                }

            })
            // donutChart();
            // columnChart();
        });
    </script>
@endsection
