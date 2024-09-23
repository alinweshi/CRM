<?php

namespace Crm\User\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=["name","email","password","phone","rememberToken"];
    protected $table="users";
    // protected $hidden=["password"];
}
