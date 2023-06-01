<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\Dto\AddCategoryDto;
use App\Modules\Inventory\Dto\EditCategoryDto;
use App\Modules\Inventory\Entity\Category;
use App\Modules\Inventory\Services\CategoryService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {

        $this->categoryService = $categoryService;
    }

    public function Index()
    {
        $categories = Category::all();
        return view("inventory.category.index", [
            'data' => $categories
        ]);
    }

    public function Add()
    {
        return view("inventory.category.add");
    }

    public function AddPost(FormRequest $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['string', 'required', 'min:3'],
            'code' => ['string', 'required', 'min:2']
        ]);

        $dto = new AddCategoryDto();
        $dto->name = $request->post('name');
        $dto->code = $request->post('code');

        $this->categoryService->Create($dto);

        return redirect()->to(route("inventory.category.index"));
    }

    public function Edit(int $id)
    {
        try {
            $category = Category::find($id);
            if(!$category) throw new \Exception("Category not found");
            return view("inventory.category.edit", [
                'category' => $category
            ]);
        }
        catch (\Exception $e) {
            return redirect()->to(route('inventory.category.index'));
        }
    }

    public function EditPost(FormRequest $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'name' => ['string', 'required', 'min:3'],
                'code' => ['string', 'required', 'min:2']
            ]);
            $category = Category::find($request->post('id'));
            if(!$category) throw new \Exception("Category not found");
            $categoryEditDto = new EditCategoryDto();
            $categoryEditDto->name = $request->post('name');
            $categoryEditDto->code = $request->post('code');
            $this->categoryService->Edit($category, $categoryEditDto);
            return redirect()->to(route('inventory.category.index'));
        }
        catch (\Exception $e) {
            return redirect()->to(route('inventory.category.index'));
        }
    }


}
