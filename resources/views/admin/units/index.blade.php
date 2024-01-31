@extends('admin.layouts')
@section('title')
    Data Units
@endsection

@section('style')
    <style>
        th,
        td {
            border: 10px solid black;
            border-radius: 10px;
        }

        th {
            text-transform: uppercase;
        }
    </style>
@endsection

@section('modal')
    <!-- Modal Add Data User -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVDCMasterModalLabel">Add Units</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_add_unit" method="POST" action="{{ route('units.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label>Unit Name</label>
                                <input type="text" id="unit_name" name="unit_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Maker/ Product</label>
                                <input type="text" id="product_maker" name="product_maker" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Unit Type</label>
                                <input type="text" id="unit_type" name="unit_type" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Unit Code Number</label>
                                <input type="text" id="unit_code_number" name="unit_code_number" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Unit Serial Number</label>
                                <input type="text" id="unit_serial_number" name="unit_serial_number" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Engine Model</label>
                                <input type="text" id="engine_model" name="engine_model" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Engine Model </label>
                                <input type="text" id="engine_model" name="engine_model" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Engine MNEMONIC</label>
                                <input type="text" id="engine_mnemonic" name="engine_mnemonic" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Engine Serial Number</label>
                                <input type="text" id="engine_serial_model" name="engine_serial_model"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Save Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_edit_User" method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit Units</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>Coming Soon After FIX Status on Units</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Image Modal -->
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
    </div> --}}
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Data Units </h1>
        </div>
        <div class="card card-danger ">
            <div class="card-header">
                <a href="#addUser" data-toggle="modal" data-target="#addUnitModal"
                    class="btn btn-icon icon-left btn-primary btn-lg"><i class="fas fa-plus-square"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover row-border col-border table-striped"
                        style="width:100%" id="table-1">
                        <thead class="">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Unit Name</th>
                                <th>Maker/ Product</th>
                                <th>Unit Type</th>
                                <th>Unit Code Number</th>
                                <th>Unit Serial Number</th>
                                <th>Engine Model</th>
                                <th>Engine MNEMONIC</th>
                                <th>Engine Serial Number</th>
                                <th>Action</th>

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
                    data: 'unit_name'
                },
                {
                    data: 'product_maker'
                },
                {
                    data: 'unit_type'
                },
                {
                    data: 'unit_code_number'
                },
                {
                    data: 'unit_serial_number'
                },
                {
                    data: 'engine_model'
                },
                {
                    data: 'engine_mnemonic'
                },
                {
                    data: 'engine_serial_model'
                },
                {
                    data: 'id'
                },

            ];
            console.log(dataColumns);
            var arrayParams = {
                idTable: '#table-1',
                urlAjax: "{{ route('get.units') }}",
                columns: dataColumns,
                defColumn: [{
                    targets: [9],
                    data: 'id',
                    render: function(data, type, full, meta) {
                        return `<div class="row w-100">
                           <div class="col-12 d-flex ">
                              <a class="btn btn-warning mr-1"
                                 href="#editData" data-toggle="modal" data-target="#editUserModal" data-id=${data}
                                 data-name="${full.name}" data-email="${full.email}" 
                                 title="Edit"><i class="fas fa-edit"></i></a>
                              <a class="btn btn-danger ml-1"
                                 href="#deleteData" data-delete-url="/units/${data}" 
                                 onclick="return deleteConfirm(this,'delete')"
                                 title="Delete"><i class="fas fa-trash"></i></a>
                           </div>
                     </div>`
                    },
                }]
            }
            loadAjaxDataTables(arrayParams);
            table.on('xhr', function() {
                jsonTables = table.ajax.json();
                // console.log( jsonTables.data[350]["id"] +' row(s) were loaded' );
            });

            //set table header to align center
            $('th').addClass('text-center')

            // $(document).on('click', `.showImageBtn`, function(e) {
            //     $('#modalImage').attr('src', $(this).data('tooltip'));
            // });

            $('#form_add_unit').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'POST',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#addUnitModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });

            $('#editUserModal').on('show.bs.modal', function(e) {
                const button = $(e.relatedTarget);
                // console.log(button.data('id'));
                $('#name_edit').val(button.data('name'))
                $('#email_edit').val(button.data('email'))
                $('#form_edit_User').attr('action', '/users/' + button.data('id'))
            });

            $('#form_edit_User').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                var arr_params = {
                    url: form.attr('action'),
                    method: 'PUT',
                    input: form.serialize(),
                    forms: form[0].reset(),
                    modal: $('#editUserModal').modal('hide'),
                    reload: false
                }
                ajaxSaveDatas(arr_params)
            });
        })
    </script>
@endsection
