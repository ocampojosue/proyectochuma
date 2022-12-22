<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    public function teacher(){
        return $this->belongsTo(User::class);
    }
}
