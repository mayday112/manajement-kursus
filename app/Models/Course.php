<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'durasi'
    ];


    /**
     * Get the materials for the blog post.
     */
    public function materials() : HasMany {
        return $this->hasMany(Material::class);
    }
}
