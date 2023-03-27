@extends('template')

@section('content')
    
    <div class="row mt-5 mb-5 mx-auto">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Tambah Data Produk</h4>
        </div>

    @if ($errors->any())
        <div class="alert alert-secondary">
            <strong>Yahh</strong> Data Barang Tidak Terinput<br><br>
                <strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </strong>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="post">
    @csrf

        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text"><li class="small material-icons">create</li></span>
                <div class="form-floating">
                    <input value="{{ old('kode_barang') }}" type="text" name="kode_barang" class="form-control" id="floatingInputGroup1" placeholder="Kode Barang">
                    <label for="floatingInputGroup1">Kode Barang</label>
                </div>
            </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">person</li></span>
                    <div class="form-floating">
                    <input value="{{ old('nama_penerima') }}" type="text" name="nama_penerima" class="form-control" id="floatingInputGroup1" placeholder="Nama Penerima">
                    <label for="floatingInputGroup1">Nama Penerima</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">add_box</li></span>
                    <div class="form-floating">
                    <input value="{{ old('nama_barang') }}" type="text" name="nama_barang" class="form-control" id="floatingInputGroup1" placeholder="Nama Barang">
                    <label for="floatingInputGroup1">Nama Barang</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">bookmark</li></span>
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="jenis_barang" aria-label="Default select example">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Kosmetik">Kosmetik</option>
                            <option value="Sayur & Buah">Sayur & Buah</option>
                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                            <option value="Interior">Interior</option>
                            <option value="Bahan Makanan & Minuman">Bahan Makanan & Minuman</option>
                            <option value="Perlengkapan Bayi">Perlengkapan Bayi</option>
                            <option value="Perlengkapan Olahraga">Perlengkapan Olahraga</option>
                        </select>
                        <label for="floatingSelect">Pilih Jenis Barang</label>
                    </div>
                </div>
                <div class="float-start mb-3">
                    <button type="submit" class="btn btn-primary" onclick="createConfirmation( $product->request )">Tambah Data</button>
                </div>
                <div class="float-end mb-3">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </div>
    </form>

@endsection