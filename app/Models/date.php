<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class date extends Model
{
    use HasFactory;

    public $table = 'date';

    public $primary_key = 'id';

    public $fillable = ['date'];
}
