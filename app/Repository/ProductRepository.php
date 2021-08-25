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
}
