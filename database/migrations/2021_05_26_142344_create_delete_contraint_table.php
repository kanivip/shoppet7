<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeleteContraintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        return true;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
        });
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('bills_receive_user_id_foreign');
            $table->dropForeign('bills_user_id_foreign');
        });
        Schema::table('details_sale', function (Blueprint $table) {
            $table->dropForeign('details_sale_bill_id_foreign');
            $table->dropForeign('details_sale_sale_id_foreign');
        });
        Schema::table('details_bill', function (Blueprint $table) {
            $table->dropForeign('details_bill_bill_id_foreign');
            $table->dropForeign('details_bill_product_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_image_id_foreign');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_parent_id_foreign');
        });

/*         Schema::dropIfExists('delete_contraint'); */
    }
}
