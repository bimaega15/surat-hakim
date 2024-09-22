<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSurat extends Model
{
    use HasFactory;
    protected $table = 'form_surat';
    protected $guarded = [];
    public $timestamps = true;

    public function informasiSebelum()
    {
        return $this->hasMany(InformasiSebelum::class);
    }

    public function informasiSetelah()
    {
        return $this->hasMany(InformasiSetelah::class);
    }

    public function permintaanSurat()
    {
        return $this->hasMany(PermintaanSurat::class);
    }
}
