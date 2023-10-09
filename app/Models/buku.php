<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $quarded = ["id"];

    protected $fillables = ["name","email","password","gender","phone_number","address"];
}
