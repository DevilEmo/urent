<?php

namespace App;

use App\Filters\PostFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    //table name
    protected $table ='posts';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\user');
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new PostFilter($request))->filter($builder);
    }
}
