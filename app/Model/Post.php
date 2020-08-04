<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
   * @todo 與模型關聯的資料表。
   * @todo The table which this model connected.
   * @var string
   */
  protected $table = 'post';
  
}
