<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $fillable = ["title","code","author","publisher","publication_year","stock","synopsis","category","newCategory","pdf_file","cover_image"];
}

