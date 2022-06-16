<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = ['title', 'domain'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
