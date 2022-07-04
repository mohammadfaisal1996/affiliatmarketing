<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_Referral_Link extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }
}
