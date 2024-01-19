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
    <!-- Modal Add Data VDCMaster -->
    <div class="modal fade" id="addVDCMasterModal" tabindex="-1" aria-labelledby="addVDCMasterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="form_add_VDCMaster" method="POST" action="{{ route('vdc_master.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVDCMasterModalLabel">Tambah Data VDCMaster</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Stock Code</label>
                            <input type="text" id="stock_code" name="stock_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stock Code PND</label>
                            <input type="text" id="stock_code_pnd" name="stock_code_pnd" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Stock Code PNW</label>
                            <input type="text" id="stock_code_pnw" name="stock_code_pnw" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" id="item_name" name="item_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Part Number</label>
                            <input type="text" id="part_number" name="part_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>MNEM ONIC</label>
                            <input type="text" id="mnem_onic" name="mnem_onic" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Foto </label>
                            <input type="file" id="foto" name="foto" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" id="supplier" name="supplier" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Price Damage Core</label>
                            <input type="text" id="price_damage_core" name="price_damage_core" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Waktu Klaim</label>
                            <input type="text" id="waktu_klaim" name="waktu_klaim" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Metode</label>
                            <select name="metode" class="form-control" required>
                                <option selected> Pilih Metode...</option>
                                <option value="warranty">Warranty</option>
                                <option value="buyback">Buy Back</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data VDCMaster -->
    <div class="modal fade" id="editVDCMasterModal" tabindex="-1" aria-labelledby="editVDCMasterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form_edit_VDCMaster" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="editVDCMasterModalLabel">Edit Data VDCMaster</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1>Coming Soon After FIX Status on VDC Master</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <a href="{{ route('vdc_master.create') }}" {{-- data-toggle="modal"  --}} data-target="#addVDCMasterModal"
                    class="btn btn-icon icon-left btn-primary btn-lg"><i class="fas fa-plus-square"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" style="width:100%"
                        id="table-1">
                        <thead style="background-color: #f3ca30;" class="text-nowrap">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th class="text-center">Stock Code VDC</th>
                                <th class="text-center">Stock Code VDC Claim</th>
                                <th class="text-center">Picture</th>
                                <th class="text-center">Item Description</th>
                                <th class="text-center">Mnemonic</th>
                                <th class="text-center">Part Number</th>
                                <th class="text-center">Type Of Item</th>
                                <th class="text-center">Supplier</th>
                                <th class="text-center">UOI</th>
                                <th class="text-center">Price Damage Core</th>
                                <th class="text-center">Price Product Genuine</th>
                                <th class="text-center">Price Total</th>
                                <th class="text-center">Warranty Time Guarantee</th>
                                <th class="text-center">Claim Method</th>
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
                    data: 'item_desc'
                },
                {
                    data: 'mnem_onic'
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
                        render: function(data, type, full, meta) {
                            // console.log(data);
                            return `<a href="#" class="showImageBtn" data-tooltip="${window.location.origin + '/' + data}" data-toggle="modal" data-target="#imageModal"><img src="${window.location.origin + '/' + data}" class="img-thumbnail"></a>`;
                        }
                    },
                    {
                        targets: [14],
                        data: 'claim_method',
                        render: function(data, type, full, meta) {
                            // console.log(data);
                            if (data == 'warranty') {
                                return `<span class="badge badge-primary" style="background-color: #f3ca30;">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        targets: [16],
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

            $('#form_add_VDCMaster').submit(function(e) {
                e.preventDefault();
                let form = $(this)[0];
                let formOri = $(this);
                var arr_params = {
                    url: formOri.attr('action'),
                    method: 'POST',
                    input: new FormData(form),
                    forms: form.reset(),
                    modal: $('#addVDCMasterModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });

            $('#editVDCMasterModal').on('show.bs.modal', function(e) {
                const button = $(e.relatedTarget);
                // console.log(button.data('id'));
                $('#nama_mesin_edit').val(button.data('nama_mesin'))
                $('#lokasi_mesin_edit').val(button.data('lokasi_mesin'))
                $('#kondisi_mesin_edit').val(button.data('kondisi_mesin'))
                $('#spesifikasi_mesin_edit').val(button.data('spesifikasi_mesin'))
                $('#form_edit_VDCMaster').attr('action', '/vdc_master/' + button.data('id'))
            });

            $('#form_edit_VDCMaster').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'PUT',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#editVDCMasterModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });
        })
    </script>
@endsection
