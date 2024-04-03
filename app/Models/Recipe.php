<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'instructions',
        'serving',
        'category',
        'photo',
        'user_id'

    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            // first category is from the recipes table 
            // while the second category from the url request /?category=dinner
            $query->where('category', 'like', '%' . request('category') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%');
        }
    }

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ingredientStr(): Attribute
    {
        return Attribute::get(fn () => str($this->ingredients)->markdown());
    }
    public function instructionStr(): Attribute
    {
        return Attribute::get(fn () => str($this->instructions)->markdown());
    }
}
