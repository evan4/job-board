<?php

namespace App\Http\Controllers;

use App\Models\JobsList;
use Illuminate\Http\Request;

class JobsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = JobsList::query();
        $search = $request->input('search');
        $min_salary = $request->input('min_salary');
        $max_salary = $request->input('max_salary');

        $jobs->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when($min_salary, function ($query) use ($min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($max_salary, function ($query) use ($max_salary) {
            $query->where('salary', '<=', $max_salary);
        });

        return view('job.index', ['jobs' => $jobs->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobsList $job)
    {
        return  view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
