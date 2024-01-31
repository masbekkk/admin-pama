@extends('admin.layouts')
@section('title')
    Data VDC Claim
@endsection

@section('style')
    <style>
        td {
            text-transform: uppercase;
        }
        button.dt-button span {
            text-transform: uppercase;
        }
    </style>
@endsection

@section('modal')
    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="#" id="modalImage" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Data VDC Claim </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#exportExcel" class="btn btn-icon icon-left btn-success btn-lg mr-1"><i
                        class="fas fa-file-excel"></i> Export
                    Excel</a>

                <a href="#exportCSV" class="btn btn-icon icon-left btn-light btn-lg ml-1"><i class="fas fa-file-csv"></i>
                    Export CSV</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-striped" style="width:100%" id="table-1">
                        <thead style="background-color: #243c7c; text-transform: uppercase;" class="text-nowrap">
                            <tr>
                                <th class="text-center" data-priority="1"> No.</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Report No</th>
                                <th class="text-center">Report Date</th>
                                <th class="text-center">WR/MR</th>
                                <th class="text-center">Stock code vdc</th>
                                <th class="text-center">quantity to claim</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Unit name</th>
                                <th class="text-center">Maker/ Product</th>
                                <th class="text-center">Unit type</th>
                                <th class="text-center">Unit code number</th>
                                <th class="text-center">Unit serial number</th>
                                <th class="text-center">engine model</th>
                                <th class="text-center">engine mnemonic</th>
                                <th class="text-center">engine serial number</th>
                                <th class="text-center" data-priority="3">Picture</th>
                                <th class="text-center">Install Date</th>
                                <th class="text-center">Failure date</th>
                                <th class="text-center">hm install</th>
                                <th class="text-center">hm failure</th>
                                <th class="text-center">failure info</th>
                                <th class="text-center">User DeptHead</th>
                                <th class="text-center">Approval DeptHead</th>
                                <th class="text-center">Remarks DeptHead</th>
                                <th class="text-center">supplier</th>
                                <th class="text-center">Supplier Address</th>
                                <th class="text-center">Stock Code VDC Claim</th>
                                <th class="text-center">Part Number</th>
                                <th class="text-center">Item Description</th>
                                <th class="text-center">Mnemonic</th>
                                <th class="text-center">Price VDC</th>
                                <th class="text-center" data-priority="4">Pdf vdc claim</th>
                                <th class="text-center">purchase order</th>
                                <th class="text-center">date send to supplier</th>
                                <th class="text-center">date received by supplier</th>
                                <th class="text-center">supplier analysis</th>
                                <th class="text-center" data-priority="5">status claim</th>
                                <th class="text-center">date claim status</th>
                                <th class="text-center">Quantity Outstanding</th>
                                <th class="text-center">quantity claim approved</th>
                                <th class="text-center">quantity claim rejected</th>
                                <th class="text-center">remarks</th>
                                <th class="text-center">LT Create CWP</th>
                                <th class="text-center">LT Delivery To Supplier</th>
                                <th class="text-center">LT FB Supplier</th>
                                <th class="text-center">Aging</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center" data-priority="2">Action</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function countBetweenTwoDates(firstDate, secondDate) {
            // console.log('from input: ' + firstDate + ' and ' + secondDate)
            const timeDifference = firstDate.getTime() - secondDate.getTime();
            // console.log('timedifference: ' + timeDifference)
            const daysDifference = Math.round(timeDifference / (1000 * 3600 * 24));
            return daysDifference;
        }
        var qtyOutstanding;

        $(document).ready(function() {
            const dataColumns = [
                'id',
                'id',
                'report_no',
                'report_date',
                'wr_mr',
                'vdc_catalog.stock_code_vdc',
                'qty_vdc_claim',
                'user.name',
                'unit.unit_name',
                'unit.product_maker',
                'unit.unit_type',
                'unit.unit_code_number',
                'unit.unit_serial_number',
                'unit.engine_model',
                'unit.engine_mnemonic',
                'unit.engine_serial_model',
                'picture',
                'installation_date',
                'failure_date',
                'hm_install',
                'hm_failure',
                'failure_info',
                'dept_head.name',
                'approval_depthead',
                'remarks_depthead',
                'vdc_catalog.supplier',
                'vdc_catalog.supplier_address',
                'vdc_catalog.stock_code_vdc_claim',
                'vdc_catalog.part_number',
                'vdc_catalog.item_name',
                'vdc_catalog.mnemonic',
                'vdc_catalog.price_damage_core',
                'pdf_vdc_claim',
                'purchase_order',
                'date_send_to_supplier',
                'date_received_supplier',
                'supplier_analysis',
                'status_claim',
                'date_claim_status',
                'id',
                'qty_claim_approved',
                'qty_claim_rejected',
                'remarks',
                'id',
                'id',
                'id',
                'id',
                'updated_at',
                'id',
            ].map(data => ({
                data
            }));
            // console.log(dataColumns);
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.vdc_claim') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [1],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            // return "arrghh"
                            let qtyVdcClaim = full.qty_vdc_claim;
                            let qtyClaimApproved = full.qty_claim_approved;
                            qtyOutstanding = qtyVdcClaim - qtyClaimApproved;
                            // return qtyOutstanding;
                            if (qtyOutstanding > 0) {
                                return `<span class="badge badge-primary" style="background-color: #f3ca30;">OPEN</span>`;
                            } else {
                                return `<span class="badge badge-success">CLOSE</span>`;
                            }
                        }
                    },
                    {
                        targets: [16],
                        data: 'picture',
                        render: function(data) {
                            // console.log(data);
                            return `<a href="#" class="showImageBtn" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#imageModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                    {
                        targets: [23],
                        data: 'approval_depthead',
                        render: function(data) {
                            // console.log(data);
                            if (data == 'reject') {
                                return `<span class="badge badge-primary" style="background-color: #f3ca30;">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        targets: [31],
                        data: 'vdc_catalog.price_total',
                        render: function(data) {
                            return 'Rp. ' + data.toLocaleString('en-US');
                        }
                    },
                    {
                        targets: [37],
                        data: 'status_claim',
                        render: function(data) {
                            // console.log(data);
                            if (data == 'reject') {
                                return `<span class="badge badge-primary" style="background-color: #f3ca30;">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        targets: [32], // 22++ are need to increment while vdc master included
                        data: 'pdf_vdc_claim',
                        render: function(data) {
                            // console.log(data);
                            return `<a href="${window.location.origin + '/' + data}" target="_blank" class="btn btn-lg btn-primary"><i class="fas fa-file-download"></i></a>`;
                        }
                    },
                    {
                        targets: [3, 17, 18, 47],
                        data: 'updated_at',
                        render: function(data) {
                            var date = new Date(data);
                            var formattedDate = date.toLocaleString('en-US', {
                                day: 'numeric',
                                month: 'short',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                second: '2-digit'
                            });

                            return formattedDate;

                        }
                    },
                    {
                        targets: [34, 35, 38],
                        data: 'updated_at',
                        render: function(data) {
                            if (data != null) {
                                var date = new Date(data);
                                var formattedDate = date.toLocaleString('en-US', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    second: '2-digit'
                                });

                                return formattedDate;
                            } else return null;
                        }
                    },
                    {
                        targets: [39],
                        data: 'qty_claim_approved',
                        render: function(data, type, full, meta) {
                            let qtyVdcClaim = full.qty_vdc_claim;
                            let qtyClaimApproved = full.qty_claim_approved;
                            qtyOutstanding = qtyVdcClaim - qtyClaimApproved;
                            return qtyOutstanding;
                            // return "hshshshs";
                        }
                    },
                    {
                        targets: [43], //base on target
                        data: 'date_send_to_supplier', // not work, the data in the function always returning data based on index targets
                        render: function(data, type, full, meta) {
                            //this targeted to column LT CREATE CWP
                            
                            let dateSendToSupplier;
                            let reportDate = new Date(full.report_date);
                            // console.log('after new DATE datesendtosupp: ', dateSendToSupplier)
                            if (full.date_send_to_supplier != null) {
                                
                                dateSendToSupplier = new Date(full.date_send_to_supplier)
                            } else {
                                dateSendToSupplier = new Date();
                            }

                            return countBetweenTwoDates(dateSendToSupplier, reportDate);
                        }
                    },
                    {
                        targets: [44], //base on target
                        data: 'date_received_supplier', // not work, the data in the function always returning data based on index targets
                        render: function(data, type, full, meta) {
                            // this targeted to column LT DELIVERY TO SUPPLIER
                            
                            let dateReceivedSupplier;
                            let dateSendToSupplier = new Date(full.date_send_to_supplier);
                            // console.log(dateSendToSupplier)
                            if (full.date_received_supplier != null) {
                                // alert("SOKSO")
                                dateReceivedSupplier = new Date(full.date_received_supplier)
                            } else if (isNaN(dateSendToSupplier)) {
                                
                                dateReceivedSupplier = new Date();
                            } else {
                                dateSendToSupplier = new Date();
                                dateReceivedSupplier = new Date();
                            }
                            // return data
                            return countBetweenTwoDates(dateReceivedSupplier, dateSendToSupplier);
                        }
                    },
                    {
                        targets: [45], //base on target
                        data: 'id', // not work, the data in the function always returning data based on index targets
                        render: function(data, type, full, meta) {
                            // this targeted to column LT FB Supplier
                            
                            let dateClaimSupplier;
                            let dateReceivedSupplier = new Date(full.date_received_supplier);
                            if (full.date_claim_status != null) {
                                // console.log("ffff")
                                dateClaimSupplier = new Date(full.date_claim_status)
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
                    },
                    {
                        targets: [46], //base on target
                        data: 'date_claim_status', // not work, the data in the function always returning data based on index targets
                        render: function(data, type, full, meta) {
                            // this targeted to column AGING
                            let dateClaimStatus;
                            let reportDate = new Date(full.report_date);
                            if (full.date_claim_status != null) {
                                dateClaimStatus = new Date(full.date_claim_status)
                            } else {
                                dateClaimStatus = new Date();
                            }
                            // return data
                            return countBetweenTwoDates(dateClaimStatus, reportDate);
                        }
                    },
                    {
                        targets: [48],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning mr-1"
                                 href="/vdc_claim/${data}/edit" title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger ml-1"
                                 href="#deleteData" data-delete-url="/vdc_claim/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                        },
                    },

                ]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            //set table header to align center
            $('th').addClass('text-center text-white')

            $(document).on('click', `.showImageBtn`, function(e) {
                $('#modalImage').attr('src', $(this).data('tooltip'));
            });
        })
    </script>
@endsection
