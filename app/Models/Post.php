<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'judul', 
        'isi',
        'slug',
        'thumbnail',
        'status', //draft,, published, archived
        'user_id',
        'category_id',
        'published_at',
        'views',
    ];

    protected $casts = [
        'published_at'=>'datetime',
    ];

    protected $dates = [
        'deleted_at',
    ];
     /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
    * Penulis post (relasi ke user)
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
    * Kategori utama post.
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS & MUTATORS
    |--------------------------------------------------------------------------
    */
    public function getPublishedAtFormattedAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y H:i') : '-';
    }
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 150);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!isset($this->attributes['slug']) || $this->isDirty('title')) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}

