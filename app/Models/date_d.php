<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class date_d extends Model
{
    use HasFactory;

    public $table = 'date_d';
    public $primary_key = 'id';

    public $fillable = ['date','month','year','daliya','total_d','hisab','result'];
}
