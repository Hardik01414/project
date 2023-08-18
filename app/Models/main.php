<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    use HasFactory;

    public $table = 'main';

    public $primary_key = 'id';

    public $fillable =['date','month','year','hisab'];
}
