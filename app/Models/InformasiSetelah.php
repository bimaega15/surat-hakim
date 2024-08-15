<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSetelah extends Model
{
    use HasFactory;
    protected $table = 'informasi_setelah';
    protected $guarded = [];
    public $timestamps = true;
}
