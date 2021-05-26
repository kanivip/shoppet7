<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('details_sale', function (Blueprint $table) {
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('receive_user_id')->references('id')->on('receive_users');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('details_bill', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('bill_id')->references('id')->on('bills');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('image_id')->references('id')->on('images');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('parent_categories');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constraints');
    }
}
