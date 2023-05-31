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
        Schema::create('activities_responses', function (Blueprint $table) {
            $table->id();
            $table->enum("check", ["0", "1"]);
            $table->float("note");
            $table->string("filepath");
            $table->text("description");
            $table->foreignId("activity_id")
            ->constrained("activities", "id");
            $table->foreignId("student_id")
            ->constrained("students", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_responses');
    }
};
