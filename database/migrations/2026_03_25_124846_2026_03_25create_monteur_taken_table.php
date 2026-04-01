<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monteur_taken', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afspraak_id')->constrained('afspraken')->onDelete('cascade');
            $table->decimal('uren', 5, 2);
            $table->text('materialen');
            $table->decimal('kosten', 10, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('monteur_taken');
    }
};