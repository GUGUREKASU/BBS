<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BbsNmlPosts extends Model
{
  protected $table = 'BBS_NML_POSTS';
  // MassAssignment(INSERT/UPDATEで入力できるカラムを指定。$fillable=ホワイトリスト、$guarded=ブラックリスト)
  protected $guarded = array('id');

  // 投稿されたら親スレのレコードのupdated_atも更新する(touchesプロパティ)
  protected $touches = ['thread'];
  public function thread()
  {
    return $this->belongsTo('App\Models\BbsNmlTreads');
  }
}
