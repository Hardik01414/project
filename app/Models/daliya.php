<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daliya extends Model
{
    use HasFactory;

    public $table = 'daliya';

    public $primary_key='id';

    public $fillable =['name','password','address','image','total_d','total_p','result','type'];
}
