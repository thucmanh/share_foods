<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    public $timestamp = false;
    protected $fillable = [
        'material_id',
        'material_name',
        'material_price'
    ];

    public function post(){
        return $this->belongstoMany('App\Post');
    }
}
