<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username', 'password', 'fullname', 'avatar', 'email', 'contact', 'status', 'type', 'verification_code', 'verification_status'];
}
