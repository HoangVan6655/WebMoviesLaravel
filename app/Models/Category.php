<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, $slug)
 */
class Category extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function movie(){
        return $this->hasMany(Movie::class)->orderBy('id', 'DESC');
    }
}
