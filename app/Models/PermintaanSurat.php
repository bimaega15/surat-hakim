<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanSurat extends Model
{
    use HasFactory;
    protected $table = 'permintaan_surat';
    protected $guarded = [];
    public $timestamps = true;

    public function formSurat()
    {
        return $this->belongsTo(FormSurat::class, 'form_surat_id', 'id');
    }
}
