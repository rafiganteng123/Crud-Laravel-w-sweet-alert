@extends('template')

@section('content')
    
    <div class="row mt-5 mb-5 container mx-auto">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Data Produk</h4>
        </div>

    @if ($errors->any())
        <div class="alert alert-secondary">
            <strong>Yahh</strong> Data Barang Tidak Terupdate<br><br>
                <strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </strong>
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')

        <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">create</li></span>
                    <div class="form-floating">
                    <input type="number" name="kode_barang" class="form-control" id="floatingInputGroup1" placeholder="Kode Barang" value="{{ $product->kode_barang }}" aria-label="Disabled input example" disabled readonly>
                    <label for="floatingInputGroup1">Kode Barang</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">person</li></span>
                    <div class="form-floating">
                    <input type="text" name="nama_penerima" class="form-control" id="floatingInputGroup1" placeholder="Nama Penerima" value="{{ $product->nama_penerima }}">
                    <label for="floatingInputGroup1">Nama Penerima</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">add_box</li></span>
                    <div class="form-floating">
                    <input type="text" name="nama_barang" class="form-control" id="floatingInputGroup1" placeholder="Nama Barang" value="{{ $product->nama_barang }}">
                    <label for="floatingInputGroup1">Nama Barang</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><li class="small material-icons">bookmark</li></span>
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="jenis_barang" aria-label="Default select example">
                            <option @selected($product->jenis_barang == 'Elektronik') value="Elektronik">Elektronik</option>
                            <option @selected($product->jenis_barang == 'Pakaian') value="Pakaian">Pakaian</option>
                            <option @selected($product->jenis_barang == 'Kosmetik') value="Kosmetik">Kosmetik</option>
                            <option @selected($product->jenis_barang == 'Sayur & Buah') value="Sayur & Buah">Sayur & Buah</option>
                            <option @selected($product->jenis_barang == 'Makanan & Minuman') value="Makanan & Minuman">Makanan & Minuman</option>
                            <option @selected($product->jenis_barang == 'Interior') value="Interior">Interior</option>
                            <option @selected($product->jenis_barang == 'Bahan Makanan & Minuman') value="Bahan Makanan & Minuman">Bahan Makanan & Minuman</option>
                            <option @selected($product->jenis_barang == 'Perlengkapan Bayi') value="Perlengkapan Bayi">Perlengkapan Bayi</option>
                            <option @selected($product->jenis_barang == 'Perlengkapan Olahraga') value="Perlengkapan Olahraga">Perlengkapan Olahraga</option>
                        </select>
                        <label for="floatingSelect">Pilih Jenis Barang</label>
                    </div>
                </div>
                <div class="float-start mb-3">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
                <div class="float-end mb-3">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </div>
    </form>

@endsection