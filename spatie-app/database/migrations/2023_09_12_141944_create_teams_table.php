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
		Schema::create('teams', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->foreignId('department_id')->constrained('departments', 'id')->onDelete('cascade');
			$table->unsignedBigInteger('teamlead_id')->nullable();
			$table->timestamps();

			$table->foreign('teamlead_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('teams');
	}
};
