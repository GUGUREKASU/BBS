<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBBSNMLTHREADSTable extends Migration
{
    /**
     * スレッドタイトルテーブル作成
     *
     * @return void
     */
    public function up()
    {
      Schema::create('BBS_NML_THREADS', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title')->comment('スレッドタイトル');
        // 作成日時と更新日時が、自動で入るようにしておく
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BBS_NML_THREADS');
    }
}
