<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'teacher_id'];

    public function teacher(){
        return $this->belongsTo(User::class);
    }
}
