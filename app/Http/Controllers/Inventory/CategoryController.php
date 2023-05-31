<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function Index()
    {
        return view("inventory.category.index");
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
        return redirect()->to(route("category.index"));
    }


}
