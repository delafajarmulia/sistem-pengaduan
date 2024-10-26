<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'user_home_id',
        'user_away_id',
        'complaint_id',
        'message'
    ];

    public function userHome()
    {
        return $this->belongsTo(User::class, 'user_home_id');
    }

    public function userAway()
    {
        return $this->belongsTo(User::class, 'user_away_id');
    }

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
