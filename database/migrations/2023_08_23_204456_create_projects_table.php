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
    if (! Schema::hasTable('projects')) {

        Schema::create('projects', function (Blueprint $table) {
            $table->integer("id");
            $table->string("name");
            $table->integer("status");
            $table->integer("customer_id")->unsigned();
            $table->integer("Project_cost");
            //            $table->timestamps();
        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
