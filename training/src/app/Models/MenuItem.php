<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['title', 'link'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
