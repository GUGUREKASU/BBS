<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BbsNmlTreads extends Model
{
  protected $table = 'BBS_NML_THREADS';
  // MassAssignment(INSERT/UPDATEで入力できるカラムを指定。$fillable=ホワイトリスト、$guarded=ブラックリスト)
  protected $guarded = array('id');

  // このスレの発言を取得
  public function post_list()
  {
    return $this->hasMany('App\Models\BbsNmlPosts', 'thread_id','id')
    ->orderBy('created_at');
  }
}
