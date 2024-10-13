<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    use HasFactory;
    protected $table = 'responses';
    // protected $fillable = [
    //     'complaint_id',
    //     'user_id',
    //     'content',
    //     'date_of_response'
    // ];
    protected $primaryKey = 'id';

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
