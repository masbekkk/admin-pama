@extends('admin.layouts')
@section('title')
    Edit Data Claim
@endsection

@section('style')
    <style>
        input {
            text-transform: uppercase;
        }
    </style>
    <!-- select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support theme select2 -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Edit Data VDC Claim </h1>
            <div class="section-header-breadcrumb breadcrumb-lg">
                <div class="breadcrumb-item active"> <a href="{{ route('vdc_claim.index') }}"> Data VDC Claim</a></div>
                <div class="breadcrumb-item active">Edit VDC Claim</div>
            </div>
        </div>
        <div class="card card-warning ">
            <form id="form_edit_VDCClaim" method="POST" action="{{ route('vdc_claim.update', ['vdc_claim' => $vDCClaim->id ]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Report No</label><label class="text-danger">*</label>
                        <input type="text" id="report_no" name="report_no" class="form-control" required
                            placeholder="03/PLT2/XII/2023" value="{{ $vDCClaim['report_no']}}">
                    </div>
                    <div class="form-group">
                        <label>Report Date</label><label class="text-danger">*</label>
                        <input type="date" id="report_date" name="report_date" class="form-control" required value="{{ $vDCClaim['report_date']}}">
                    </div>
                    <div class="form-group">
                        <label>WR/MR</label><label class="text-danger">*</label>
                        <input type="text" id="wr_mr" name="wr_mr" class="form-control" required value="{{ $vDCClaim['wr_mr']}}">
                    </div>
                    <div class="form-group">
                        <label>Stock Code VDC </label><label class="text-danger">*</label>
                        <select name="v_d_c_master_id" class="form-control select2" id="vdc_master">
                            <option value="">Select Stock Code VDC..</option>
                            @foreach ($catalogVDC as $value)
                                <option {{ ($vDCClaim['v_d_c_master_id'] == $value->id ? "selected":"") }} value="{{ $value->id }}">{{ $value->stock_code_vdc }} - {{ $value->part_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quantity to Claim</label><label class="text-danger">*</label>
                        <input type="number" id="qty_vdc_claim" name="qty_vdc_claim" class="form-control" required value="{{ $vDCClaim['qty_vdc_claim']}}">
                    </div>
                    {{-- <div class="form-group">
                        <label>User </label>
                        <select name="user_id" class="form-control" id="user">
                            <option value="">Select User..</option>
                            @foreach ($users as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label>Unit </label><label class="text-danger">*</label>
                        <select name="unit_id" class="form-control select2" id="unit">
                            <option value="">Select Unit..</option>
                            @foreach ($units as $value)
                                <option value="{{ $value->id }}" {{ ($vDCClaim['unit_id'] == $value->id ? "selected":"") }}>{{ $value->unit_code_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Picture</label><label class="text-danger">*</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*" value="{{ $vDCClaim['picture']}}">
                    </div>

                    <div class="form-group">
                        <label>Installation Date</label><label class="text-danger">*</label>
                        <input type="date" id="installation_date" name="installation_date" class="form-control" required value="{{ $vDCClaim['installation_date']}}">
                    </div>
                    <div class="form-group">
                        <label>Failure Date</label><label class="text-danger">*</label>
                        <input type="date" id="failure_date" name="failure_date" class="form-control" required value="{{ $vDCClaim['failure_date']}}">
                    </div>
                    <div class="form-group">
                        <label>HM Install</label><label class="text-danger">*</label>
                        <input type="text" id="hm_install" name="hm_install" class="form-control" required value="{{ $vDCClaim['hm_install']}}">
                    </div>
                    <div class="form-group">
                        <label>HM Failure</label><label class="text-danger">*</label>
                        <input type="text" id="hm_failure" name="hm_failure" class="form-control" required value="{{ $vDCClaim['hm_failure']}}">
                    </div>
                    <div class="form-group">
                        <label>Failure Info</label><label class="text-danger">*</label>
                        <input type="text" id="failure_info" name="failure_info" class="form-control" required value="{{ $vDCClaim['failure_info']}}">
                    </div>
                    <div class="form-group">
                        <label>Approval DeptHead</label>
                        <select name="approval_depthead" class="form-control" >
                            <option value=""> Select Approval Status...</option>
                            <option {{ ($vDCClaim['approval_depthead'] == 'approve' ? "selected":"") }} value="approve">Approve</option>
                            <option {{ ($vDCClaim['approval_depthead'] == 'reject' ? "selected":"") }} value="reject">Reject</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks DeptHead</label>
                        <input type="text" id="remarks" name="remarks_depthead" class="form-control" value="{{ $vDCClaim['remarks_depthead']}}">
                    </div>
                    <div class="form-group">
                        <label>PDF VDC Claim</label>
                        <input type="file" id="pdf_vdc_claim" name="pdf_vdc_claim" class="form-control" value="{{ $vDCClaim['pdf_vdc_claim']}}">
                    </div>

                    <div class="form-group">
                        <label>Purchase Order</label>
                        <input type="text" id="purchase_order" name="purchase_order" class="form-control" value="{{ $vDCClaim['purchase_order']}}">
                    </div>
                    <div class="form-group">
                        <label>Date Send to Supplier</label>
                        <input type="date" id="date_send_to_supplier" name="date_send_to_supplier"
                            class="form-control" value="{{ $vDCClaim['date_send_to_supplier']}}">
                    </div>
                    <div class="form-group">
                        <label>Date Received By Supplier</label>
                        <input type="date" id="date_received_supplier" name="date_received_supplier"
                            class="form-control" value="{{$vDCClaim['date_received_supplier']}}">
                    </div>
                    <div class="form-group">
                        <label>Supplier Analysis</label>
                        <input type="text" id="supplier_analysis" name="supplier_analysis" class="form-control" value="{{ $vDCClaim['supplier_analysis']}}">
                    </div>
                    <div class="form-group">
                        <label>Claim Status</label>
                        <select name="status_claim" class="form-control" >
                            <option value=""> Select Claim Status...</option>
                            <option {{ ($vDCClaim['status_claim'] == 'approve' ? "selected":"") }} value="approve">Approve</option>
                            <option {{ ($vDCClaim['status_claim'] == 'reject' ? "selected":"") }} value="reject">Reject</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Date Claim Status </label>
                        <input type="date" id="date_claim_status" name="date_claim_status" class="form-control" value="{{ $vDCClaim['date_claim_status']}}">
                    </div>

                    <div class="form-group">
                        <label>Quantity Claim Approved</label>
                        <input type="number" id="qty_claim_approved" name="qty_claim_approved" class="form-control" value="{{ $vDCClaim['qty_claim_approved']}}">
                    </div>

                    <div class="form-group">
                        <label>Quantity Claim Rejected</label>
                        <input type="number" id="qty_claim_rejected" name="qty_claim_rejected" class="form-control" value="{{ $vDCClaim['qty_claim_rejected']}}">
                    </div>

                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" id="remarks" name="remarks" class="form-control" value="{{ $vDCClaim['remarks']}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Save Data</button>
                </div>

            </form>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/thousand-separator.js') }}"></script>
    <!-- select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('Pilih Nama Peserta Didik'),
                // selectionCssClass: "select2--small",
                // dropdownCssClass: "select2--small",
            });
        })
    </script>
@endsection
