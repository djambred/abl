<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'seos'; // Use the table name if it's not the plural form of the model name

    // Mass assignable attributes
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'canonical_url',
        'robots',
        'og_image',
    ];

    // Define default values for certain fields (optional)
    protected $attributes = [
        'robots' => 'index, follow', // Default value for the 'robots' field
    ];

    // Optionally, you can define the cast type for certain attributes
    protected $casts = [
        'og_image' => 'string', // Ensure the 'og_image' is cast to a string
    ];
}
