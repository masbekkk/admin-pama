@extends('admin.layouts')
@section('title')
    Data VDCMaster
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
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
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
            <h1>Data VDCMaster </h1>
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
                                <th class="text-center">
                                    No.
                                </th>
                                <th class="text-center">Stock Code VDC</th>
                                <th class="text-center">Stock Code VDC Claim</th>
                                <th class="text-center">Picture</th>
                                <th class="text-center">Item Description</th>
                                <th class="text-center">Mnemonic</th>
                                <th class="text-center">Part Number</th>
                                <th class="text-center">Type Of Item</th>
                                <th class="text-center">Supplier</th>
                                <th class="text-center">Supplier Address</th>
                                <th class="text-center">UOI</th>
                                <th class="text-center">Price Damage Core</th>
                                <th class="text-center">Price Product Genuine</th>
                                <th class="text-center">Price Total</th>
                                <th class="text-center">Warranty Time Guarantee</th>
                                <th class="text-center">Claim Method</th>
                                <th class="text-center">Claim Document</th>
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
            const dataColumns = [{
                    data: 'id'
                },
                {
                    data: 'stock_code_vdc'
                },
                {
                    data: 'stock_code_vdc_claim'
                },
                {
                    data: 'picture'
                },
                {
                    data: 'item_name'
                },
                {
                    data: 'mnemonic'
                },
                {
                    data: 'part_number'
                },
                {
                    data: 'type_of_item'
                },
                {
                    data: 'supplier'
                },
                {
                    data: 'supplier_address'
                },
                {
                    data: 'uoi'
                },
                {
                    data: 'price_damage_core'
                },
                {
                    data: 'price_product_genuine'
                },
                {
                    data: 'price_total'
                },
                {
                    data: 'warranty_time_guarantee'
                },
                {
                    data: 'claim_method'
                },
                {
                    data: 'claim_document'
                },
                {
                    data: 'updated_at'
                },
                {
                    data: 'id'
                },

            ];
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.vdc_master') }}",
                columns: dataColumns,
                defColumn: [{
                        targets: [3],
                        data: 'picture',
                        render: function(data) {
                            // console.log(data);
                            return `<a href="#" class="showImageBtn" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#imageModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                    {
                        targets: [11, 12, 13],
                        data: 'price_damage_core',
                        render: function(data) {
                            return 'IDR. ' + data.toLocaleString('en-US');
                        }
                    },
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
                        targets: [17],
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
                        targets: [18],
                        data: 'id',
                        render: function(data, type, full, meta) {
                            return `<div class="row w-100">
                           <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-warning mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editVDCMasterModal" data-id=${data}
                                 data-nama_mesin="${full.nama_mesin}" data-lokasi_mesin="${full.lokasi_mesin}" data-kondisi_mesin="${full.kondisi_mesin}" data-spec_mesin="${full.spesifikasi_mesin}"
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger ml-1"
                                 href="#deleteData" data-delete-url="/VDCMaster/${data}" 
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

            $(document).on('click', `.showImageBtn`, function(e) {
                $('#modalImage').attr('src', $(this).data('tooltip'));
            });
        })
    </script>
@endsection
