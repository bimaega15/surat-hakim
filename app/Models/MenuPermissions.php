<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermissions extends Model
{
    use HasFactory;
    protected $table = 'menu_permissions';
    protected $guarded = [];
    public $timestamps = true;
}
