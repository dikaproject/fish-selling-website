<x-layouts.admin title="Edit Product">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Manajemen Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Product</h6>
                </x-slot>
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')

                    <x-forms.select label="Kategori Produk" name="product_category_id" id="product_category_id"
                        :options="$categories" key="id" value="name"
                        :selected="$product->product_category_id ?? old('product_category_id')" />

                    <x-forms.input label="Nama Product" name="name" id="name" value="{{ $product->name ?? old('name') }}" />

                    <x-forms.input label="Slug" name="slug" id="slug" value="{{ $product->slug ?? old('slug') }}" />

                    <x-forms.input label="Harga" name="price" id="price" value="{{ $product->price ?? old('price') }}" />

                    <x-forms.input label="Stok" name="stock" id="stock" value="{{ $product->stock ?? old('stock') }}" />

                    <x-forms.textarea label="Deskripsi" name="description" id="description">
                        {{ $product->description ?? old('description') }}
                    </x-forms.textarea>

                    <img id="thumbnail-preview" src="{{ $product->thumbnail_url ?? '#' }}" alt="Thumbnail Preview"
                        style="display: {{ $product->thumbnail ? 'block' : 'none' }}; max-width: 500px; margin-top: 10px; margin-bottom: 10px;" />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />

                    <img id="image-preview" src="{{ $product->image_url ?? '#' }}" alt="Image Preview"
                        style="display: {{ $product->image ? 'block' : 'none' }}; max-width: 500px; margin-top: 10px; margin-bottom: 10px;" />

                    <x-forms.input type="file" label="Gambar" name="image" id="image" />

                    <div class="mb-3">
                        <input type="hidden" name="is_favorite" value="0">
                        <x-forms.checkbox label="Product Favorite" id="is_favorite" name="is_favorite"
                            :checked="$product->is_favorite ?? old('is_favorite')" />
                    </div>

                    <x-ui.base-button color="danger" href="{{ route('admin.product.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Update Product
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

        $('#is_favorite').change(function() {
            $(this).val(this.checked ? 1 : 0);
        });
    </script>
    @endpush
</x-layouts.admin>
