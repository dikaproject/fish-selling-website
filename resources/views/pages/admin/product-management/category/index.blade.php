<x-layouts.admin title="Kategori Artikel">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Produk</li>
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.product-category.create') }}">
                        Tambah Kategori Produk
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($productCategories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @can('product-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.product-category.edit', $category->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan

                                    @can('product-delete')
                                        <form action="{{ route('admin.product-category.destroy', $category->id) }}"
                                            method="POST" class="d-inline">
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
</x-layouts.admin>
