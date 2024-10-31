<x-layouts.admin title="Tambah Product">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.product.index') }}">Manajemen Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Product</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Product</h6>
                </x-slot>
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf
                    <x-forms.select label="Kategori Produk" name="product_category_id" id="product_category_id"
                        :options="$categories" key="id" value="name" :selected="old('product_category_id')" />

                    <x-forms.input label="Nama Product" name="name" id="name" value="{{ old('name') }}" />

                    <x-forms.input label="Slug" name="slug" id="slug" value="{{ old('slug') }}" />

                    <x-forms.input label="Harga" name="price" id="price" value="{{ old('price') }}" />

                    <x-forms.input label="Stok" name="stock" id="stock" value="{{ old('stock') }}" />

                    <x-forms.textarea label="Deskripsi" name="description" id="description">
                        {{ old('description') }}
                    </x-forms.textarea>

                    <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                        style="display:none; max-width: 500px; margin-top: 10px; margin-bottom: 10px;" />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file"
                        value="{{ old('thumbnail') }}" />

                    <img id="image-preview" src="#" alt="image Preview"
                        style="display:none; max-width: 500px; margin-top: 10px; margin-bottom: 10px;" />

                    <x-forms.input type="file" label="Gambar" name="image" id="image"
                        value="{{ old('image') }}" />

                        <div class="mb-3">
                            <input type="hidden" name="is_favorite" value="0">
                            <x-forms.checkbox label="Product favorite" id="is_favorite" name="is_favorite"
                                :checked="old('is_favorite')" />
                        </div>

                    <x-ui.base-button color="danger" href="{{ route('admin.product.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Tambah Product
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('plugin-scripts')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('keyup', function() {
            const nameValue = name.value;
            slug.value = nameValue.toLowerCase().split(' ').join('-');
        });

        const thumbnail = document.querySelector('#thumbnail');
        const thumbnailPreview = document.querySelector('#thumbnail-preview');

        thumbnail.addEventListener('change', function() {
            const file = thumbnail.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                thumbnailPreview.src = reader.result;
                thumbnailPreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });

        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('#image-preview');

        image.addEventListener('change', function() {
            const file = image.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>
     <script>
        $('#is_favorite').change(function() {
            $(this).val(this.checked ? 1 : 0);
        });
    </script>
    @endpush
</x-layouts.admin>
