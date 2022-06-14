<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_titles', function (Blueprint $table) {
            $table->id();
            $table->string('job_title_name')->nullable();
            $table->timestamps();
        });

        DB::table('job_titles')->insert([
            
            ['job_title_name' => 'Менеджер'],
            ['job_title_name' => 'Специалист'],
            ['job_title_name' => 'Слесарь-механик'],
            ['job_title_name' => 'Слесарь-электрик'],
            ['job_title_name' => 'Слесарь-электромеханик'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_titles');
    }
}
