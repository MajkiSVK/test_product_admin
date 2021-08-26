<?php


namespace App\Services;


use App\Mail\SendNotificationToAdminMail;
use App\Models\Product;
use App\Repository\ProductRepository;
use Illuminate\Support\Facades\Mail;

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
        $this->SendNotificationMail('44mikulas.tomas@gmail.com',
            'new product',
            'new product was added',
            15);
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

    private function SendNotificationMail(string $mailTo,
                                          string $subject,
                                          string $report,
                                          int $minuteDelay){
        return Mail::to($mailTo)
            ->later(now()->addMinutes($minuteDelay), new SendNotificationToAdminMail($subject, $report));
    }
}
