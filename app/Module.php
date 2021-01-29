<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Variable;

class Module extends Model
{
        /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modules';

    /**
     * @var array
     */
    protected $fillable = ['id','nombre'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = true;

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sicerl5';


    public function Variables()
    {
        return $this->belongsToMany('App\Variable');
    }
}
