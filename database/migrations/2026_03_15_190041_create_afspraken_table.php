<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('afspraken', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('naam');
            $table->string('kenteken');
            $table->date('datum');
            $table->string('status')->default('in afwachting');
            $table->text('opmerkingen')->nullable();
            $table->text('taken')->nullable();
            $table->text('materialen')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('afspraken');
    }
};