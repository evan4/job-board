<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobFilterRequest;
use App\Models\JobsList;
use Illuminate\Http\Request;

class JobsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobFilterRequest $request)
    {
        $validated = $request->validated();

        $filters = [
            'search' => $request->input('search'),
            'min_salary' => $request->input('min_salary'),
            'max_salary' => $request->input('max_salary'),
            'experience' => $request->input('experience'),
            'category' => $request->input('category'),
        ];
        $jobs = JobsList::with('employer')->filter($filters);

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
        return  view('job.show', ['job' => $job->load('employer')]);
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
