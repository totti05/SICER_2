<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    protected $connection = 'reduccionl5';
    protected $table = 'diariocelda';
    protected $primaryKey = ['celda','dia'];
    public $incrementing = false;
    protected $keyType = ['smallint', 'date'];
    public $timestamps = false;
    //$table->primary(['id', 'parent_id']);`  |  Adds composite keys.
}
