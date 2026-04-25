<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = ['nama_pemesan', 'id_lapangan', 'jam_mulai', 'durasi'];

    public function user(): BelongsTo
    {
        
        return $this->belongsTo(User::class, 'id');
    }
}