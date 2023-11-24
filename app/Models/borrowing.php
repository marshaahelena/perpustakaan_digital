<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected $fillable = [
        'name',
       'title',
       'loan_date',
       'return_date',
       'due_date',
       'code',
       'status',
       'fine'



    ];


}
