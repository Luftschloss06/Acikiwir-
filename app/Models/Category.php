<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];
 /**
 * Relasi ke model Post.
 * Satu kategori bisa memiliki banyak post.
 */
    public function posts()
 {
    return $this->hasMany(Post::class);
 }
 /**
 * Generate slug otomatis saat nama diisi.
 */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}
