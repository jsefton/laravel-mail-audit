<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_audits', function (Blueprint $table) {
            $table->id();
            $table->string('message_id')->nullable();
            $table->dateTime('email_at')->nullable();
            $table->string('subject')->nullable();
            $table->text('to')->nullable();
            $table->text('from')->nullable();
            $table->text('bcc')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->tinyInteger('sent')->nullable()->default(0);
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_audits');
    }
}
