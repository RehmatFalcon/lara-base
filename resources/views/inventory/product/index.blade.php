@php use App\Modules\Inventory\Entity\Product; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Setup') }}
        </h2>
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route("inventory.product.add")  }}" class="btn btn-primary">
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
                        {{ __("Category")  }}
                    </th>
                    <th>
                        {{ __("Name")  }}
                    </th>
                    <th>
                        {{ __("Unit")  }}
                    </th>
                    <th>
                        {{ __("In Rate")  }}
                    </th>
                    <th>
                        {{ __("Out Rate")  }}
                    </th>
                    <th>
                        {{ __("Action")  }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sn = 1;
                /**
                 * @var Product[] $data
                 */
                ?>
                @foreach($data as $product)
                    <tr>
                        <td>
                            {{ $sn++  }}
                        </td>
                        <td>
                            {{ $product->category->name  }}
                        </td>
                        <td>
                            {{ $product->name  }}
                        </td>
                        <td>
                            {{ $product->unit  }}
                        </td>
                        <td>
                            {{ $product->inRate  }}
                        </td>
                        <td>
                            {{ $product->outRate  }}
                        </td>
                        <td>
                            <a href="{{ route("inventory.product.edit", [ 'id' => $product->id ])  }}"
                               class="btn btn-primary">
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
