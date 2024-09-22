<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSebelum extends Model
{
    use HasFactory;
    protected $table = 'informasi_sebelum';
    protected $guarded = [];
    public $timestamps = true;

    public function formSurat()
    {
        return $this->belongsTo(FormSurat::class);
    }
}
