<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointRedeem extends Model
{
    use HasFactory;

    protected $table = 'point_redeems';

    protected $fillable = [
        'user_id',
        'nama_hadiah',
        'point_cost',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}