<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    // protected $fillable = ["title","code","author","publisher","publication_year","stock","synopsis","category_id","pdf_file","cover_image"];

    public function getCover()
    {
        return asset("uploads/book/".$this->cover_image);
    }

    public function getPdf()
    {
        return asset("uploads/book/".$this->pdf_file);
    }

    function Category(){
        return $this->belongsTo(Category::class);
    }
}

