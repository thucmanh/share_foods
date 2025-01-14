<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model implements Searchable
{

    protected $table = "posts";
    protected $primaryKey = 'post_id';
    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'post_id',
        'user_id',
        'title',
        'content',
        'description',
        'date_create',
        'post_url'
    ];

    public function format() {
        return [
            'id' => $this->id,
            'post_url' => $this->post_url,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->images()->first()->url,
            'category_name' => $this->category()->first()->name,
        ];
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function material()
    {
        return $this->belongstoMany('App\Material');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('post.show', $this->post_id);
        // $UserId = DB::table('users')->where('user_id','=', this->user_id);

        return new SearchResult(
            $this,
            $this->title,
            $this->post_url,
            $url
        );
    }
}
