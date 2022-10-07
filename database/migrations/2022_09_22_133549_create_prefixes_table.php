<?php

use App\Models\Prefix;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefixes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $names = ['+39', '+41', '+1', '+32', '+61', '+34', '+358', '+49'];

        foreach ($names as $name) {
            Prefix::create(['name' => $name]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefixes');
    }
};
