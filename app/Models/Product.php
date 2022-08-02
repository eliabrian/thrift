<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'tag_id',
        'condition',
        'price',
        'discount',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
