<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    use HasFactory;

    public $table = 'month';

    public $primary_key = 'id';

    public $fillable =['month'];

}
