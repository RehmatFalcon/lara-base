<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Category Setup') }}
        </h2>
    </x-slot>

    <h4 class="dark:text-white">
        {{ __("Edit Product!")  }}
    </h4>

    <div class="row">
        <div class="col-4">
            <form method="post" action="{{ route("inventory.category.edit.post")  }}" class="card">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id  }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __("Name")  }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old("name", $category->name)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="form-group">
                        <label for="code">{{ __("Code")  }}</label>
                        <input id="code" type="text" class="form-control" name="code" value="{{ old("code", $category->code)  }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('code')" />
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
