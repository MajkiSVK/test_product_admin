<?php


namespace App\Services;


use App\Models\Product;
use App\Repository\ProductRepository;

class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $validatedData
     * @return Product
     */
    public function StoreNewProduct(array $validatedData): Product
    {
        $unique_hash = substr(md5(now().$validatedData['name']), 0, 16);
        $product = $this->productRepository->CreateNewProduct($validatedData, $unique_hash);
        $product->categories()->sync($validatedData['categories']);
        return $product;
    }

    /**
     * @param array $validatedData
     * @param string $id
     * @return Product
     */
    public function UpdateExistingProduct(array $validatedData, string $id): Product
    {
        $product = $this->productRepository->UpdateProductByHash($validatedData,$id);
        $product->categories()->sync($validatedData['categories']);
        return $product;
    }
}
