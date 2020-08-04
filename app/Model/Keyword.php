<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  /**
   * @todo 與模型關聯的資料表。
   * @todo The table which this model connected.
   * @var string
   */
  protected $table = 'keyword';
  
  /**
   * @todo 可以被批量賦值
   * @var Array
   */
  protected $fillable = ['word'];
}
