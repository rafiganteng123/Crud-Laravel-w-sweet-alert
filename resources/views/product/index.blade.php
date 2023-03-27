@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h4>Data Produk RafiExpress</h4>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade-show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center" width="20px">#</th>
            <th class="text-center" width="280px">Kode Barang</th>
            <th class="text-center" width="280px">Nama Penerima</th>
            <th class="text-center" width="280px">Nama Barang</th>
            <th class="text-center" width="280px">Jenis Barang</th>
            <th class="text-center" width="280px">Aksi</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
            <td>{{ $product->kode_barang }}</td>
            <td>{{ $product->nama_penerima }}</td>
            <td>{{ $product->nama_barang }}</td>
            <td>{{ $product->jenis_barang }}</td>
            <td class="text-center">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm">Update</a>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-warning btn-sm">Tampil</a>
                <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{ $product->id }})">Hapus</button>
            </td>
        </tr>
        @endforeach
    </table>
        <div class="float-start">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="float-end">
            {!! $products->links() !!}
        </div>
    @endsection

    <script>
        function deleteConfirmation(id) {
            Swal.fire({
                title: 'Yakin Ingin Menghapus Data Barang?',
                text: "Data Barang Tidak Bisa Dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan request hapus data ke server
                    axios.post('/product/' + id, {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                    })
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'Data Barang Berhasil Dihapus.',
                                'success'
                            ).then((result) => location.reload());
                        })
                        .catch(error => {
                            console.log(error);
                            Swal.fire(
                                'Error!',
                                'Terjadi Kesalahan Menghapus Data Barang',
                                'error'
                            )
                        });
                }
            });
        }
    </script>