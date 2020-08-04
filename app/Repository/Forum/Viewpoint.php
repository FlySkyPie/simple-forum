<?php

namespace App\Repository\Forum;

abstract class Viewpoint
{
  public $Id;
  public $AuthorId;
  public $AuthorName;
  public $Message;
  public $Posted;
  public $Edited;
}
