<?php
/**
 * @var \App\Modules\Inventory\Entity\Product $item
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Setup') }}
        </h2>
    </x-slot>

    <h4 class="dark:text-white">
        {{ __("Edit Product!")  }}
    </h4>

    <div class="row">
        <div class="col-4">
            <form method="post" action="{{ route("inventory.product.edit.post")  }}" class="card">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id  }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">{{ __("Category")  }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <?php
                                $selectedId = old('category_id', $item->category_id);
                            ?>
                            @foreach($categoryList as $category)
                                <option value="{{ $category->id  }}" <?= $category->id == $selectedId ? 'selected' : '' ?>>
                                    {{ $category->name }} [ {{ $category->code  }} ]
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __("Name")  }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old("name", $item->name)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="form-group">
                        <label for="unit">{{ __("Unit")  }}</label>
                        <input id="unit" type="text" class="form-control" name="unit" value="{{ old("unit", $item->unit)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
                    </div>

                    <div class="form-group">
                        <label for="in_rate">{{ __("In Rate")  }}</label>
                        <input id="in_rate" type="number" step="0.01" class="form-control" name="in_rate" value="{{ old("in_rate", $item->inRate)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('in_rate')" />
                    </div>
                    <div class="form-group">
                        <label for="out_rate">{{ __("Out Rate")  }}</label>
                        <input id="out_rate" type="number" step="0.01" class="form-control" name="out_rate" value="{{ old("out_rate", $item->outRate)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('out_rate')" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">
                        {{ __("Save")  }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
