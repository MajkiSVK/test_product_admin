<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repository\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductService $productService,
                                ProductRepository $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest $request
     * @return RedirectResponse
     */
    public function store(CreateProductRequest $request): RedirectResponse
    {
        $this->productService->StoreNewProduct($request->validated());

        return back()->with('message', trans('product.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

        return \view('products.show')
                 ->with('product', $this->productRepository->GetProductByHash($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return View
     */
    public function edit(string $id): View
    {
        return \view('products.edit')
            ->with('product', $this->productRepository->GetProductByHash($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id):RedirectResponse
    {
       $product = $this->productRepository->UpdateProductByHash($request->validated(),$id);
        return redirect(route('product.show', $product->unique_hash));
    }


    /**
     * Delete the specified resource
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = $this->productRepository->GetProductByHash($id);
        $product->delete();

        return redirect(route('home'))
            ->with('message', __('product.deleted'));
    }
}
