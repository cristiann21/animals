<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('vet_id')->constrained('vets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['vet_id']);
            $table->dropColumn(['owner_id', 'vet_id']);
        });
    }
};

