@extends('admin.layouts')
@section('title')
    Add Data VDC Catalog
@endsection

@section('style')
    <style>
        input {
            text-transform: uppercase;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Add Data VDC Master </h1>
            <div class="section-header-breadcrumb breadcrumb-lg">
                <div class="breadcrumb-item active"> <a href="{{ route('vdc_master.index') }}"> Data VDC Master</a></div>
                <div class="breadcrumb-item active">Add VDC Catalog</div>
            </div>
        </div>
        <div class="card card-warning ">
            <form id="form_add_VDCMaster" method="POST" action="{{ route('vdc_master.store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label>Stock Code VDC</label>
                        <input type="text" id="stock_code_vdc" name="stock_code_vdc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock Code Claim</label>
                        <input type="text" id="stock_code_vdc_claim" name="stock_code_vdc_claim" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label>Item Description</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Mnemonic</label>
                        <input type="text" id="mnemonic" name="mnemonic" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Part Number</label>
                        <input type="text" id="part_number" name="part_number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Type Of Item </label>
                        <input type="text" id="type_of_item" name="type_of_item" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" id="supplier" name="supplier" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Supplier Address</label>
                        <input type="text" id="supplier_address" name="supplier_address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>UOI</label>
                        <input type="text" id="uoi" name="uoi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Price Damage Core</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_damage_core" name="price_damage_core"
                                class="form-control thousand-separator" maxlength="30" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price Product Genuine</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_product_genuine" name="price_product_genuine"
                                class="form-control thousand-separator" required maxlength="30">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price Total</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_total" name="price_total"
                                class="form-control thousand-separator" maxlength="30" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Time Guarantee</label>
                        <input type="text" id="warranty_time_guarantee" name="warranty_time_guarantee"
                            class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Claim Method</label>
                        <select name="claim_method" class="form-control" required>
                            <option value=""> Select Claim Method...</option>
                            <option value="CWP">CWP</option>
                            <option value="BUY BACK">BUY BACK</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Claim Document</label>
                        <input type="file" id="claim_document" name="claim_document" class="form-control" required>
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
@endsection
