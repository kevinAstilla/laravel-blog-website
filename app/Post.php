<?php

namespace App;
use Carbon\Carbon;


class Post extends Model
{
	//delete after DEMO
    // protected $fillable = ['title', 'body'];
    // protected $guarded = [];//variables that you want to be protected

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user() // this post belongs to a user $Post->user
    {
        return $this->belongsTo(User::class);
    }


    public function addComment($body)
    {
        $user_id = \Auth::user()->id;
    	$this->comments()->create(compact('user_id','body'));

    	// DELETE AFTER DEMO
    	//long method
    	//  Comment::create([
    	// 	'body' => request('body'),
    	// 	'post_id' => $this->id
    	// ]);
    }
     public function scopeFilter($query, $filters)
    {
        if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
	