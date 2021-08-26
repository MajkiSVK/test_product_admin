<?php


namespace App\Repository;


use App\Models\Product;

class ProductRepository
{

    /**
     * @param array $validatedData
     * @param string $hash
     * @return Product
     */
    public function CreateNewProduct(array $validatedData,
                                     string $hash): Product
    {
        $product = new Product();
        $product->fill($validatedData);
        $product->unique_hash = $hash;
        $product->save();
        return $product;
    }

    /**
     * @param string $unique_hash
     * @return Product
     */
    public function GetProductByHash(string $unique_hash):Product
    {
        return Product::where('unique_hash', $unique_hash)->firstOrFail();
    }

    /**
     * @param array $validatedData
     * @param string $unique_hash
     * @return Product
     */
    public function UpdateProductByHash(array $validatedData, string $unique_hash):Product
    {
        $product = Product::where('unique_hash', $unique_hash)->firstOrFail();
        $product->fill($validatedData);
        $product->save();
        return $product;

    }
}
