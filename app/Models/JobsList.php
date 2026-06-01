<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsList extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'jobs_list';

    protected $fillable = ['title', 'description', 'salary', 'location', 'category', 'experience'];

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Sales', 'Marketing'];
}
