<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobCommentRequest;

class JobCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCommentRequest $request,Job $job)
    {
        $data = $request->validated();
        $data['job_id'] = $job->id;
        $data['user_id'] = Auth::user()->id;
        $jobcomment = JobComment::create($data);

        return redirect()->route('admin.job.show',$job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobComment  $jobComment
     * @return \Illuminate\Http\Response
     */
    public function show(JobComment $jobComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobComment  $jobComment
     * @return \Illuminate\Http\Response
     */
    public function edit(JobComment $jobComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobComment  $jobComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobComment $jobComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobComment  $jobComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobComment $jobComment)
    {
        //
    }
}
