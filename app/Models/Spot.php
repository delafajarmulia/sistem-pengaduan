<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;
    protected $table = 'spots';
    protected $fillable = [
        'name',
        'image',
        'description',
        'address',
        'html_address'
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
