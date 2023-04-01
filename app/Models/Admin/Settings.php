<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'ms_settings';
    protected $primaryKey = 'settings_id';
    protected $guarded = [];
    public $timestamps = false;


}
