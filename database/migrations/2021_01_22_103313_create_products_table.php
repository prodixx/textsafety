<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('code', 20)->index();
            $table->string('title_ro')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_es')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('title_it')->nullable();
            $table->string('title_de')->nullable();

            $table->longText('details_ro')->nullable();
            $table->longText('details_en')->nullable();
            $table->longText('details_es')->nullable();
            $table->longText('details_fr')->nullable();
            $table->longText('details_it')->nullable();
            $table->longText('details_de')->nullable();

            $table->longText('technic_ro')->nullable();
            $table->longText('technic_en')->nullable();
            $table->longText('technic_es')->nullable();
            $table->longText('technic_fr')->nullable();
            $table->longText('technic_it')->nullable();
            $table->longText('technic_de')->nullable();

            $table->longText('colors_ro')->nullable();
            $table->longText('colors_en')->nullable();
            $table->longText('colors_es')->nullable();
            $table->longText('colors_fr')->nullable();
            $table->longText('colors_it')->nullable();
            $table->longText('colors_de')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
