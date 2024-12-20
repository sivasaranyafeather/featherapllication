<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    use HasFactory;
     protected $fillable = [
    'reg_no',
    'working_type',
    'name_domain',
    'name',
    'date_of_birth',
    'mobile',
    'mail',
    'working_status',
    'parents_contact',
    'branch',
    'address',
    'reason',
    'college_id',
    'department_id',
    'year',
    'date_of_joining',
    'intern_days',
    'lead_source'

    ];
}
