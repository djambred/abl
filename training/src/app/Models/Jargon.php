<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jargon extends Model
{
    use HasFactory;
    protected $table = 'jargons';
    protected $fillable =[
    'slogan',
    ];
}
