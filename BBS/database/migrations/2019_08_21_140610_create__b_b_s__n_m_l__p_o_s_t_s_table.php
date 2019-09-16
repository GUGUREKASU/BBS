<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBBSNMLPOSTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('BBS_NML_POSTS', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name')->default('名無し')->comment('投稿者名');
        $table->text('content')->comment('投稿内容');
        $table->integer('thread_id')->unsigned()->comment('スレッドID');
        // 作成日時と更新日時が、自動で入るようにしておく
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        // どのスレの投稿か？
        $table->foreign('thread_id')
        ->references('id')
        ->on('BBS_NML_THREADS')
        ->onDelete('cascade');// 参照先の親レコードが削除されたら、同時に子レコードも削除する
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BBS_NML_POSTS');
    }
}
