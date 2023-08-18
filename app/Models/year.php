<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    use HasFactory;

    public $table = 'year';

    public $primary_key = 'id';

    public $fillable = ['id','year'];

}
