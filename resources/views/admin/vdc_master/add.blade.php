@extends('admin.layouts')
@section('title')
    Add Data VDC Master
@endsection

@section('content')
    <section class="section">
        <div class="section-header ">
            <h1>Add Data VDC Master </h1>
        </div>
        <div class="card card-warning ">
            <form id="form_add_VDCMaster" method="POST" action="{{ route('vdc_master.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Stock Code VDC</label>
                        <input type="text" id="stock_code_vdc" name="stock_code_vdc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock Code Claim</label>
                        <input type="text" id="stock_code_claim" name="stock_code_claim" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Item Description</label>
                        <input type="text" id="item_desc" name="item_desc" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Mnemonic</label>
                        <input type="text" id="mnem_onic" name="mnem_onic" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Part Number</label>
                        <input type="text" id="part_number" name="part_number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Type Of Item (Ini mau dropdown atau ngisi manual?) </label>
                        <input type="text" id="type_of_item" name="type_of_item" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" id="supplier" name="supplier" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>UOI (Ini mau dropdown atau ngisi manual?)</label>
                        <input type="text" id="uoi" name="uoi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Price Damage Core</label>
                        <input type="number" id="price_damage_core" name="price_damage_core" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price Product Genuine</label>
                        <input type="number" id="price_product_genuine" name="price_product_genuine" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price Total</label>
                        <input type="number" id="price_total" name="price_total" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Warranty Time Guarantee</label>
                        <input type="text" id="warranty_time_guarantee" name="warranty_time_guarantee" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Claim Method</label>
                        <select name="claim_method" class="form-control" required>
                            <option value=""> Select Claim Method...</option>
                            <option value="warranty">Warranty</option>
                            <option value="buyback">Buy Back</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>
                
            </form>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')

@endsection
