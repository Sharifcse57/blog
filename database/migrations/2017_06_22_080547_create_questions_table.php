<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('questions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('blogorforum');
			$table->string('thumb_image', 100);
			$table->string('thumb_image_alt', 150);
			$table->string('title', 400);
			$table->text('question');
			$table->integer('close');
			$table->string('tag_ids', 200);
			$table->integer('duplicate');
			$table->integer('total_views');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('questions');
	}
}
