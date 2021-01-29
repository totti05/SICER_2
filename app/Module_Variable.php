<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module_Variable extends Model
{
       /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'module_variable';

    /**
     * @var array
     */
    protected $fillable = ['module_id','variable_id','descripcion'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = true;

    protected $connection = 'sicerl5';
}
