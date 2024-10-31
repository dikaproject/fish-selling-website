<x-layouts.admin title="Detail Produk">
    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Manajemen Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Produk: {{ $product->name }}</h4>
                </x-slot>

                <div class="card-body">
                    <div class="row">
                        <!-- Bagian Gambar Produk -->
                        <div class="col-md-6">
                            @if($product->thumbnail)
                                <div class="mb-4">
                                    <label><strong>Thumbnail</strong></label>
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="Thumbnail Produk" class="img-fluid rounded" />
                                </div>
                            @else
                                <p class="text-muted">Tidak ada thumbnail</p>
                            @endif

                            @if($product->image)
                                <div class="mb-4">
                                    <label><strong>Gambar Produk</strong></label>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" class="img-fluid rounded" />
                                </div>
                            @else
                                <p class="text-muted">Tidak ada gambar produk</p>
                            @endif
                        </div>

                        <!-- Bagian Detail Produk -->
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Kategori Produk</th>
                                        <td>{{ $product->category->name ?? 'Tidak ada kategori' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Produk</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Slug</th>
                                        <td>{{ $product->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Harga</th>
                                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stok</th>
                                        <td>{{ $product->stock }} KG</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Deskripsi</th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Favorit</th>
                                        <td>{{ $product->is_favorite ? 'Ya' : 'Tidak' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-4 text-right">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-pencil"></i> Edit Produk
                        </a>
                    </div>
                </div>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
