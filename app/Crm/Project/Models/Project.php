<?php

namespace Crm\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=["id","name","status","customer_id","Project_cost"];
    public $timestamps=false;


}
