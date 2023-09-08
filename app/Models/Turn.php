<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'user_id', 'attended', 'team_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
