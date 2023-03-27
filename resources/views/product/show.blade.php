@extends('template')

@section('content')

    <div class="row mt-5 mb-5 container mx-auto">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Rincian Data Produk</h4>
                </div>

                <form action="{{ route('product.show', $product->id) }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><li class="small material-icons">create</li></span>
                        <div class="form-floating">
                        <input type="number" name="kode_barang" class="form-control" id="floatingInputGroup1" placeholder="Kode Barang" value="{{ $product->kode_barang }}" disabled readonly>
                        <label for="floatingInputGroup1">Kode Barang</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><li class="small material-icons">person</li></span>
                        <div class="form-floating">
                        <input type="text" name="nama_penerima" class="form-control" id="floatingInputGroup1" placeholder="Nama Penerima" value="{{ $product->nama_penerima }}" disabled readonly>
                        <label for="floatingInputGroup1">Nama Penerima</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><li class="small material-icons">add_box</li></span>
                        <div class="form-floating">
                        <input type="text" name="nama_barang" class="form-control" id="floatingInputGroup1" placeholder="Nama Barang" value="{{ $product->nama_barang }}" disabled readonly>
                        <label for="floatingInputGroup1">Nama Barang</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-3 mx-auto">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

                </form>
    
@endsection