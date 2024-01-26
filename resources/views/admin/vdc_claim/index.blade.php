@extends('admin.layouts')
@section('title')
    Data VDC Claim
@endsection

@section('style')
    <style>
        /* th {
                            border: 10px solid black;
                            border-radius: 10px;
                            align: center;
                        }

                        ,
                        td {
                            border: 10px solid black;
                            border-radius: 10px;
                        } */
        /* table,
                        th,
                        td {
                            border: 1px solid black;
                            border-collapse: collapse;
                        } */
        /* setting the text-align property to center*/
        /* th,
                        td {
                            padding: 5px;
                            text-align: center;
                        } */
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
                    <table class="table table-bordered table-hover table-striped" style="width:100%" id="table-1">
                        <thead style="background-color: #f3ca30; text-transform: uppercase;" class="text-nowrap">
                            <tr>
                                <th class="text-center"> No.</th>
                                <th class="text-center">Report No</th>
                                <th class="text-center">Report Date</th>
                                <th class="text-center">WR/MR</th>
                                <th class="text-center">Stock code vdc</th>
                                <th class="text-center">quantity to claim</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Unit name</th>
                                <th class="text-center">Picture</th>
                                <th class="text-center">Install Date</th>
                                <th class="text-center">Failure date</th>
                                <th class="text-center">hm install</th>
                                <th class="text-center">hm failure</th>
                                <th class="text-center">failure info</th>
                                <th class="text-center">Pdf vdc claim</th>
                                <th class="text-center">purchase order</th>
                                <th class="text-center">date send to supplier</th>
                                <th class="text-center">date received by supplier</th>
                                <th class="text-center">supplier analysis</th>
                                <th class="text-center">status claim</th>
                                <th class="text-center">date claim status</th>
                                <th class="text-center">quantity claim approved</th>
                                <th class="text-center">quantity claim rejected</th>
                                <th class="text-center">remarks</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center">Action</th>

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
        $(document).ready(function() {
            const dataColumns = [
                'id',
                'report_no',
                'report_date',
                'wr_mr',
                'v_d_c_master_id',
                'qty_vdc_claim',
                'user_id',
                'unit_id',
                'picture',
                'installation_date',
                'failure_date',
                'hm_install',
                'hm_failure',
                'failure_info',
                'pdf_vdc_claim',
                'purchase_order',
                'date_send_to_supplier',
                'date_received_supplier',
                'supplier_analysis',
                'status_claim',
                'date_claim_status',
                'qty_claim_approved',
                'qty_claim_rejected',
                'remarks',
                'updated_at',
                'id',
            ].map(data => ({
                data
            }));
            console.log(dataColumns);
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.vdc_claim') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [8],
                        data: 'picture',
                        render: function(data) {
                            // console.log(data);
                            return `<a href="#" class="showImageBtn" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#imageModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                    // {
                    //     targets: [11, 12, 13],
                    //     data: 'price_damage_core',
                    //     render: function(data) {
                    //         return 'IDR. ' + data.toLocaleString('en-US');
                    //     }
                    // },
                    {
                        targets: [15],
                        data: 'claim_method',
                        render: function(data) {
                            // console.log(data);
                            if (data == 'CWP') {
                                return `<span class="badge badge-primary" style="background-color: #f3ca30;">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        targets: [16],
                        data: 'claim_document',
                        render: function(data) {
                            // console.log(data);
                            return `<a href="${window.location.origin + '/' + data}" target="_blank" class="btn btn-lg btn-primary"><i class="fas fa-file-download"></i></a>`;
                        }
                    },
                    {
                        targets: [9,10,16,17,20,24],
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
                        targets: [25],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editVDC ClaimModal" data-id=${data}
                                 data-nama_mesin="${full.nama_mesin}" data-lokasi_mesin="${full.lokasi_mesin}" data-kondisi_mesin="${full.kondisi_mesin}" data-spec_mesin="${full.spesifikasi_mesin}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger ml-1"
                                 href="#deleteData" data-delete-url="/VDC Claim/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                        },
                    }
                ]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            //set table header to align center
            $('th').addClass('text-center')
            
            $(document).on('click', `.showImageBtn`, function(e) {
                $('#modalImage').attr('src', $(this).data('tooltip'));
            });

            $('#form_add_VDC Claim').submit(function(e) {
                e.preventDefault();
                let form = $(this)[0];
                let formOri = $(this);
                var arr_params = {
                    url: formOri.attr('action'),
                    method: 'POST',
                    input: new FormData(form),
                    forms: form.reset(),
                    modal: $('#addVDC ClaimModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });

            $('#editVDC ClaimModal').on('show.bs.modal', function(e) {
                const button = $(e.relatedTarget);
                // console.log(button.data('id'));
                $('#nama_mesin_edit').val(button.data('nama_mesin'))
                $('#lokasi_mesin_edit').val(button.data('lokasi_mesin'))
                $('#kondisi_mesin_edit').val(button.data('kondisi_mesin'))
                $('#spesifikasi_mesin_edit').val(button.data('spesifikasi_mesin'))
                $('#form_edit_VDC Claim').attr('action', '/vdc_master/' + button.data('id'))
            });

            $('#form_edit_VDC Claim').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'PUT',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#editVDC ClaimModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });
        })
    </script>
@endsection
