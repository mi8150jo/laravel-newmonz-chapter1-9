<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->unsignedInteger('issue_count')->default(0);
            $table->unsignedInteger('total_issue_count')->default(0);
            $table->float('remaining_length')->default(6400);
            $table->timestamps();

            // unsignedBigInteger:これは符号なしのビッグ整数
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
