<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;


    protected $table = 'ms_user';
    protected $primaryKey = 'user_id';
    protected $guarded = ['id','username','email'];
    public $timestamps = false;

}
