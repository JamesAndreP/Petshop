<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailVerification extends Model
{
    protected $fillable = ['email', 'user_data'];
}
