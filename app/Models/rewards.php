<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rewards extends Model
{
    protected $fillable = ['nama_hadiah', 'harga_poin', 'icon', 'stok'];
}
