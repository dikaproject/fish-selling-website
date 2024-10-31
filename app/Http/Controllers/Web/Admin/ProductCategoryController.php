<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Interfaces\ProductCategoryRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;

        $this->middleware(['permission:product-category-list'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:product-category-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:product-category-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:product-category-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $productCategories = $this->productCategoryRepository->getAllProductCategory();

        return view('pages.admin.product-management.category.index', compact('productCategories'));
    }

    public function create()
    {
        return view('pages.admin.product-management.category.create');
    }

    public function store(ProductCategoryStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $this->productCategoryRepository->createProductCategory($data);

            Swal::toast('Kategori Produk berhasil ditambahkan', 'success');
        } catch (\Exception $e) {
            Swal::toast('Kategori Produk gagal ditambahkan', 'error');
        }

        return redirect()->route('admin.product-category.index');
    }

    public function edit(string $id)
    {
        $productCategory = $this->productCategoryRepository->getProductCategoryById($id);

        return view('pages.admin.product-management.category.edit', compact('productCategory'));
    }

    public function update(ProductCategoryUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            $this->productCategoryRepository->updateProductCategory($data, $id);

            Swal::toast('Kategori Produk berhasil diubah', 'success');
        } catch (\Exception $e) {
            Swal::toast('Kategori Produk gagal diubah', 'error');
        }

        return redirect()->route('admin.product-category.index');
    }

    public function destroy(string $id)
    {
        try {
            $this->productCategoryRepository->deleteProductCategory($id);

            Swal::toast('Kategori Produk berhasil dihapus', 'success');
        } catch (\Exception $e) {
            Swal::toast('Kategori Produk gagal dihapus', 'error');
        }

        return redirect()->route('admin.product-category.index');
    }
}
