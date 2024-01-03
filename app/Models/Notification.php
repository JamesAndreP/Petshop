<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'reference_user_id', 'pet_id', 'content', 'type', 'status', 'created_at', 'updated_at'];
}
