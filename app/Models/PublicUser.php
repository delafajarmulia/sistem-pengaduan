<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    use HasFactory;
    protected $table = 'publics';
    protected $fillable = ['name', 'nik', 'email', 'phone', 'email_verified_at', 'password', 'remember_token'];
}
