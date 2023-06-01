<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("inv_category", function (Blueprint $builder) {
            $builder->id();
            $builder->timestamps();
            $builder->string("name", "250");
            $builder->string("code", "100");
            $builder->softDeletes();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("inv_category");
    }
};
