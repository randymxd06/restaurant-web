<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductCategoryChangeStatusTrigger extends Migration
{

    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER statusProductCategories AFTER UPDATE ON product_categories FOR EACH ROW UPDATE products SET status=NEW.status WHERE products_categories_id = NEW.id
        ');
    }

    public function down()
    {

    }

}
