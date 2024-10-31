<x-layouts.admin title="Product">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Kelas</li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.product.create') }}">
                        Tambah Product
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>name</th>
                            <th>category</th>
                            <th>Slug</th>
                            <th>price</th>
                            <th>stock</th>
                            <th>thumbnail</th>
                            <th>Aktif</th>
                            <th>Produk Favorite</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->productCategory->name }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->title }}" width="500">
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckActive-{{ $product->id }}"
                                            {{ $product->is_active ? 'checked' : '' }}
                                            onclick="updateStatusActive('{{ $product->id }}', this)">
                                        <label class="form-check-label" for="flexSwitchCheckActive-{{ $product->id }}">Aktif</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckFavorite-{{ $product->id }}"
                                            {{ $product->is_favorite ? 'checked' : '' }}
                                            onclick="updateStatusFavorite('{{ $product->id }}', this)">
                                        <label class="form-check-label" for="flexSwitchCheckFavorite-{{ $product->id }}">Favorit</label>
                                    </div>
                                </td>
                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.product.show', $product->id) }}">
                                        Detail
                                    </x-ui.base-button>
                                    @can('product-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.product.edit', $product->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan
                                    @can('product-delete')
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.base-button color="danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </x-ui.base-button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-ui.datatables>
            </x-ui.base-card>
        </div>
    </div>

    @push('plugin-scripts')
    <script>
        function updateStatusActive(productId, checkbox) {
            const isActive = checkbox.checked ? 1 : 0;
            fetch(`/admin/product/${productId}/update-status-active`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_active: isActive
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Berhasil mengubah status aktif.');
                } else {
                    checkbox.checked = !isActive;
                    alert('Gagal mengupdate status aktif.');
                }
            })
            .catch(error => {
                checkbox.checked = !isActive;
                alert('Terjadi kesalahan.');
            });
        }

        function updateStatusFavorite(productId, checkbox) {
            const isFavorite = checkbox.checked ? 1 : 0;
            fetch(`/admin/product/${productId}/update-status-favorite`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_favorite: isFavorite
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Berhasil mengubah status favorit.');
                } else {
                    checkbox.checked = !isFavorite;
                    alert('Gagal mengupdate status favorit.');
                }
            })
            .catch(error => {
                checkbox.checked = !isFavorite;
                alert('Terjadi kesalahan.');
            });
        }
    </script>
    @endpush
</x-layouts.admin>
