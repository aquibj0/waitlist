<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = 'notifies';
    public $primarykey = 'id';
    public $timestamp = true;
}
