<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('books_tables', function (Blueprint $table) {
        $table->decimal('price', 10, 2)->after('description');
    });
}

public function down()
{
    Schema::table('books_tables', function (Blueprint $table) {
        $table->dropColumn('price');
    });
}
};
