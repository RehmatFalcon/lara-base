<?php

namespace App\Http\Controllers\Inventory;

use App\Helpers\FlashMessage;
use App\Http\Controllers\Controller;
use App\Modules\Inventory\Dto\AddProductDto;
use App\Modules\Inventory\Dto\EditCategoryDto;
use App\Modules\Inventory\Entity\Category;
use App\Modules\Inventory\Entity\Product;
use App\Modules\Inventory\Services\CategoryService;
use App\Modules\Inventory\Services\ProductService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private CategoryService $categoryService;
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function Index()
    {
        $products = Product::all();
        return view("inventory.product.index", [
            'data' => $products
        ]);
    }

    public function Add()
    {
        $categoryList = Category::all();
        return view("inventory.product.add", [
            'categoryList' => $categoryList
        ]);
    }

    public function AddPost(FormRequest $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['string', 'required', 'min:3'],
                'unit' => ['string', 'required', 'min:2'],
                'in_rate' => ['numeric', 'required'],
                'out_rate' => ['numeric', 'required'],
                'category_id' => ['numeric', 'required']
            ]);

            $dto = new AddProductDto();
            $dto->name = $request->post('name');
            $dto->unit = $request->post('unit');
            $dto->inRate = $request->float('in_rate');
            $dto->outRate = $request->float('out_rate');
            $dto->category = Category::find($request->integer('category_id'));
            if(!$dto->category) throw new \Exception("Category not found");

            $file = $request->file('image');
            if($file) {
                $fileName = $file->hashName();
//                Storage::put("uploads/" . $fileName, $file);
                $file->storePubliclyAs("public/uploads", $fileName);
                $dto->fileName = $fileName;
            }

            $this->productService->Create($dto);
            FlashMessage::SetSuccessMessage("Product created");
            return redirect()->to(route("inventory.product.index"));
        }
        catch (\Exception $e) {
            FlashMessage::SetErrorMessage($e->getMessage());
            return redirect()->to(route('inventory.product.index'));
        }
    }

    public function Edit(int $id)
    {
        try {
            $item = Product::find($id);
            if (!$item) throw new \Exception("Product not found");
            $categoryList = Category::all();
            return view("inventory.product.edit", [
                'item' => $item,
                'categoryList' => $categoryList
            ]);
        } catch (\Exception $e) {
            FlashMessage::SetErrorMessage($e->getMessage());
            return redirect()->to(route('inventory.product.index'));
        }
    }

    public function EditPost(FormRequest $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'name' => ['string', 'required', 'min:3'],
                'unit' => ['string', 'required', 'min:2'],
                'in_rate' => ['numeric', 'required'],
                'out_rate' => ['numeric', 'required'],
                'category_id' => ['numeric', 'required'],
            ]);
            $item = Product::find($request->integer('id'));
            if (!$item) throw new \Exception("Product not found");
            $category = Category::find($request->post('category_id'));
            if (!$category) throw new \Exception("Category not found");
            $dto = new AddProductDto();
            $dto->name = $request->post('name');
            $dto->unit = $request->post('unit');
            $dto->inRate = $request->float('in_rate');
            $dto->outRate = $request->float('out_rate');
            $dto->category = $category;
            $this->productService->edit($item, $dto);
            FlashMessage::SetSuccessMessage("Product updated");
            return redirect()->to(route('inventory.product.index'));
        } catch (\Exception $e) {
            FlashMessage::SetErrorMessage($e->getMessage());
            return redirect()->to(route('inventory.product.index'));
        }
    }


}
