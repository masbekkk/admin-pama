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
                        <input type="file" id="foto" name="foto" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" id="supplier" name="supplier" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Price Damage Core</label>
                        <input type="text" id="price_damage_core" name="price_damage_core" class="form-control" required>
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
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>
                
            </form>
            <div class="card-footer"></div>
        </div>
    </section>
@endsection

@section('script')

@endsection
