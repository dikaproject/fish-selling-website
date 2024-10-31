<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Interfaces\ProductRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use App\Interfaces\ProductCategoryRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;
    private $productCategoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;

        $this->middleware(['permission:product-list'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:product-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:product-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:product-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = $this->productRepository->getAllProduct();

        return view('pages.admin.product-management.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productCategoryRepository->getAllProductCategory();

        return view('pages.admin.product-management.product.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);
        $data['thumbnail'] = $request->file('thumbnail')->store('assets/product/thumbnail', 'public');
        $data['image'] = $request->file('image')->store('assets/product/image', 'public');

        $this->productRepository->createProduct($data);

        Swal::success('Success', 'Product has been created');

        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        $categories = $this->productCategoryRepository->getAllProductCategory();

        return view('pages.admin.product-management.product.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('assets/product/thumbnail', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/product/image', 'public');
        }

        $this->productRepository->updateProduct($data, $id);

        Swal::success('Success', 'Product has been updated');

        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $this->productRepository->deleteProduct($id);

        Swal::success('Success', 'Product has been deleted');

        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);

        return view('pages.admin.product-management.product.show', compact('product'));
    }

    public function updateStatusActive(Request $request, $id)
    {
        $isActive = $request->input('is_active');
        $this->productRepository->updateStatusActive($id, $isActive);

        return response()->json(['success' => true]);
    }

    public function updateStatusFavorite(Request $request, $id)
    {
        $isFavorite = $request->input('is_favorite');
        $this->productRepository->updateStatusFavorite($id, $isFavorite);

        return response()->json(['success' => true]);
    }
}
