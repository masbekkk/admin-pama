@extends('admin.layouts')
@section('title')
    Add Data VDC Catalog
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
                    @foreach (['stock_code_vdc', 'stock_code_vdc_claim', 'picture', 'item_name', 'mnemonic', 'part_number', 'type_of_item', 'supplier', 'supplier_address', 'uoi', 'price_damage_core', 'price_product_genuine', 'price_total', 'warranty_time_guarantee', 'claim_method', 'claim_document'] as $inputName)
                        <div class="form-group">
                            <label>{{ ucfirst(str_replace('_', ' ', $inputName)) }}</label>

                            @if ($inputName === 'claim_method')
                                <select name="{{ $inputName }}" class="form-control">
                                    <option value=""> Select Claim Method...</option>
                                    <option value="WARRANTY" {{ old($inputName) === 'WARRANTY' ? 'selected' : '' }}>WARRANTY</option>
                                    <option value="BUY BACK" {{ old($inputName) === 'BUY BACK' ? 'selected' : '' }}>BUY BACK
                                    </option>
                                </select>
                            @else
                                <input type="{{ in_array($inputName, ['picture', 'claim_document']) ? 'file' : 'text' }}"
                                    id="{{ $inputName }}" name="{{ $inputName }}"
                                    class="form-control{{ in_array($inputName, ['price_damage_core', 'price_product_genuine', 'price_total']) ? ' thousand-separator' : '' }}"
                                    value="{{ old($inputName) }}"
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
