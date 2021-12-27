<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMaterial extends Model
{
    protected $table = 'post_material';
    protected $primaryKey = ['post_id', 'material_name'];
    protected $fillable = [
        'material_name',
        'post_id',
        'amount'
    ];
    public $timestamp = false;

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function material(){
        return $this->belongsTo('App\Material','material_id');
    }
}
