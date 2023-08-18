<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    use HasFactory;
    public $table = "user";

    public $primary_key = "id";

    public $fillable = ['name','money'];
}
