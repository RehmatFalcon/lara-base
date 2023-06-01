<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\Dto\AddProductDto;
use App\Modules\Inventory\Dto\EditCategoryDto;
use App\Modules\Inventory\Entity\Category;
use App\Modules\Inventory\Entity\Product;
use App\Modules\Inventory\Services\CategoryService;
use App\Modules\Inventory\Services\ProductService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

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
        $request->validate([
            'name' => ['string', 'required', 'min:3'],
            'unit' => ['string', 'required', 'min:2'],
            'in_rate' => ['numeric', 'required'],
            'out_rate' => ['numeric', 'required'],
            'category_id' => ['numeric', 'required'],
        ]);

        $dto = new AddProductDto();
        $dto->name = $request->post('name');
        $dto->unit = $request->post('unit');
        $dto->inRate = $request->float('in_rate');
        $dto->outRate = $request->float('out_rate');
        $dto->category = Category::find($request->integer('category_id'));

        $this->productService->Create($dto);

        return redirect()->to(route("inventory.product.index"));
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
            return redirect()->to(route('inventory.product.index'));
        } catch (\Exception $e) {
            return redirect()->to(route('inventory.product.index'));
        }
    }


}