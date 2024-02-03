@extends('admin.layouts')
@section('title')
    Edit Data VDC Catalog
@endsection

@section('style')
    <style>
        /* input {
                    text-transform: uppercase;
                } */
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Edit Data VDC Master </h1>
            <div class="section-header-breadcrumb breadcrumb-lg">
                <div class="breadcrumb-item active"> <a href="{{ route('vdc_master.index') }}"> Data VDC Master</a></div>
                <div class="breadcrumb-item active">Edit VDC Catalog</div>
            </div>
        </div>
        <div class="card card-warning ">
            <form id="form_Edit_VDCMaster" method="POST"
                action="{{ route('vdc_master.update', ['vdc_master' => $vDCMaster->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <div class="card-body">
                    <div class="form-group">
                        <label>Stock Code VDC</label>
                        <input type="text" id="stock_code_vdc" name="stock_code_vdc" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Stock Code Claim</label>
                        <input type="text" id="stock_code_vdc_claim" name="stock_code_vdc_claim" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*" >
                    </div>

                    <div class="form-group">
                        <label>Item Description</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Mnemonic</label>
                        <input type="text" id="mnemonic" name="mnemonic" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Part Number</label>
                        <input type="text" id="part_number" name="part_number" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Type Of Item </label>
                        <input type="text" id="type_of_item" name="type_of_item" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" id="supplier" name="supplier" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Supplier Address</label>
                        <input type="text" id="supplier_address" name="supplier_address" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>UOI</label>
                        <input type="text" id="uoi" name="uoi" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Price Damage Core</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_damage_core" name="price_damage_core"
                                class="form-control thousand-separator" maxlength="30" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price Product Genuine</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_product_genuine" name="price_product_genuine"
                                class="form-control thousand-separator"  maxlength="30">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price Total</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light" id="basic-addon1">IDR. </span>
                            </div>
                            <input type="text" id="price_total" name="price_total"
                                class="form-control thousand-separator" maxlength="30" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Time Guarantee</label>
                        <input type="text" id="warranty_time_guarantee" name="warranty_time_guarantee"
                            class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Claim Method</label>
                        <select name="claim_method" class="form-control" >
                            <option value=""> Select Claim Method...</option>
                            <option value="CWP">CWP</option>
                            <option value="BUY BACK">BUY BACK</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Claim Document</label>
                        <input type="file" id="claim_document" name="claim_document" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Save Data</button>
                </div> --}}
                <div class="card-body">
                    @foreach (['stock_code_vdc', 'stock_code_vdc_claim', 'picture', 'item_name', 'mnemonic', 'part_number', 'type_of_item', 'supplier', 'supplier_address', 'uoi', 'price_damage_core', 'price_product_genuine', 'price_total', 'warranty_time_guarantee', 'claim_method', 'claim_document'] as $inputName)
                        <div class="form-group">
                            <label>{{ ucfirst(str_replace('_', ' ', $inputName)) }}</label>

                            @if ($inputName === 'claim_method')
                                <select name="{{ $inputName }}" class="form-control">
                                    <option value=""> Select Claim Method...</option>
                                    <option value="CWP"
                                        {{ old($inputName, isset($vDCMaster->$inputName) ? $vDCMaster->$inputName : null) === 'CWP' ? 'selected' : '' }}>
                                        CWP</option>
                                    <option value="BUY BACK"
                                        {{ old($inputName, isset($vDCMaster->$inputName) ? $vDCMaster->$inputName : null) === 'BUY BACK' ? 'selected' : '' }}>
                                        BUY BACK</option>
                                </select>
                            @else
                                <input type="{{ in_array($inputName, ['picture', 'claim_document']) ? 'file' : 'text' }}"
                                    id="{{ $inputName }}" name="{{ $inputName }}"
                                    class="form-control{{ in_array($inputName, ['price_damage_core', 'price_product_genuine', 'price_total']) ? ' thousand-separator' : '' }}"
                                    value="{{ old($inputName, isset($vDCMaster->$inputName) ? $vDCMaster->$inputName : null) }}"
                                    {{ in_array($inputName, ['picture', 'claim_document']) ? 'accept="image/*"' : '' }}
                                    {{ in_array($inputName, ['price_damage_core', 'price_product_genuine', 'price_total']) ? 'maxlength=30' : '' }}>
                            @endif
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary btn-lg">Save Data</button>
                </div>



            </form>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/thousand-separator.js') }}"></script>
    <script src="{{ asset('js/uppercase-input.js')}}"></script>
@endsection
