<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsGroup extends Model
{
    use HasFactory;


    protected $table = 'ms_settings_group';
    protected $primaryKey = 'group_id';
    protected $guarded = [];
    public $timestamps = false;

}
