<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("inv_product", function (Blueprint $builder) {
            $builder->id();
            $builder->timestamps();
            $builder->softDeletes();
            $builder->string("name", '200');
            $builder->string("unit", '200');
            $builder->decimal("inRate");
            $builder->decimal("outRate");
            $builder->integer("category_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("inv_product");
    }
};
