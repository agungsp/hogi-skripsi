<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosNegColToFullTextClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('full_text_classes', function (Blueprint $table) {
            $table->double('positif')->nullable();
            $table->double('negatif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('full_text_classes', function (Blueprint $table) {
            $table->dropColumn(['positif', 'negatif']);
        });
    }
}
