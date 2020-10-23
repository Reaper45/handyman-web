<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traits\ControllerHelpers;
use App\Job;
use App\Party;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ControllerHelpers;

    /**
     * Get dashboard stats.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobs()
    {
        $jobs = Job::where('status', 'PENDING')->get();

        return response($this->api_response(true, ["jobs" => $jobs], "Request completed"), 200);
    }

    /**
     * Accept job.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptJob(Request $request)
    {
        $party_id = $request->input('party_id');
        $job_id  = $request->input('job_id');

        $job = Job::find($job_id);
        $job->assigned_to = $party_id;
        $job->status = "ONGOING";

        $job->update();

        return response($this->api_response(true, ["job" => $job], "Request completed"), 200);

    }

    /**
     * ongoingJobs
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ongoingJobs($id)
    {
        $jobs = Job::where('status', 'ONGOING')->where('assigned_to', $id)->get();

        return response($this->api_response(true, ["jobs" => $jobs], "Request completed"), 200);
    }

    /**
     * completeJob
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completeJob(Request $request)
    {
        $job_id  = $request->input('job_id');
        
        $job = Job::find($job_id);
        $job->status = "COMPLETE";

        $job->update();

        return response($this->api_response(true, ["job" => $job], "Request completed"), 200);

    }

    /**
     * categories
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function categories(Request $request)
    {
        $categories = Category::all();

        return response($this->api_response(true, ["categories" => $categories], "Request completed"), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
