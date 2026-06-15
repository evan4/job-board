<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class JobsList extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'jobs_list';

    protected $fillable = ['title', 'description', 'salary', 'location', 'category', 'experience'];

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        $search = $filters['search'] ? $filters['search'] : null;
        $min_salary = $filters['min_salary'] ? (int) $filters['min_salary'] : null;
        $max_salary = $filters['max_salary'] ? (int) $filters['max_salary'] : null;
        $experience = $filters['experience'] ? $filters['experience'] : null;
        $category = $filters['category'] ? $filters['category'] : null;


        return $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });
            });
        })->when($min_salary, function ($query, $min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($max_salary, function ($query, $max_salary) {
            $query->where('salary', '<=', $max_salary);
        })->when($experience, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($category, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
