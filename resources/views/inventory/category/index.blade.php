<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Category Setup') }}
        </h2>
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route("inventory.category.add")  }}" class="btn btn-primary">
            ➕ Add Product
        </a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            {{ __("SN")  }}
                        </th>
                        <th>
                            {{ __("Name")  }}
                        </th>
                        <th>
                            {{ __("Code")  }}
                        </th>
                        <th>
                            {{ __("Action")  }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sn = 1;
                ?>
                @foreach($data as $category)
                    <tr>
                        <td>
                            {{ $sn++  }}
                        </td>
                        <td>
                            {{ $category->name  }}
                        </td>
                        <td>
                            {{ $category->code  }}
                        </td>
                        <td>
                            <a href="{{ route("inventory.category.edit", [ 'id' => $category->id ])  }}" class="btn btn-primary">
                                {{ __("Edit")  }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
