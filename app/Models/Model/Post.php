<?php

namespace App\Models\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [

        'title' , 'body', 'user->id', 'category->id', 'is_published'
    ];
    protected static function boot(){
        parent::boot();
        static::creating(function ($post){
            if(is_null($post->user_id)){
                $post->user_id = auth()->user()->id;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }
    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'YES' : 'NO';
    }
}