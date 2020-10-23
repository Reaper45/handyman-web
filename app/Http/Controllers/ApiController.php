<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traits\ControllerHelpers;
use App\Job;
use App\Party;
use App\Service;
use App\User;
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
        $jobs = Job::where('status', 'PENDING')->with('service')->latest()->get();

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
        $job_id   = $request->input('job_id');

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
        $jobs = Job::where('status', 'ONGOING')->where('assigned_to', $id)->with('service')->latest()->get();

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
        $job_id = $request->input('job_id');
        
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
     * categoryServices
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoryServices($id)
    {
        $services = Service::where("category_id", $id)->get();

        return response($this->api_response(true, ["services" => $services], "Request completed"), 200);
    }

    /**
     * jobRequest.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function jobRequest(Request $request)
    {
        $service_id  = $request->input('service_id');
        $category_id = $request->input('category_id');
        $location    = $request->input('location');
        $date        = $request->input('date');
        $time        = $request->input('time');
        $info        = $request->input('info');
        $user_id     = $request->input('user_id');

        $job = new Job();
        $job->service_id  = $service_id;
        $job->category_id = $category_id;
        $job->location    = $location;
        $job->extra       = $info;
        $job->created_by  = $user_id;

        $job->save();

        return response($this->api_response(true, ["job" => $job], "Request completed"), 200);
    }

    /**
     * clientsJobs
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientsJobs($id)
    {
        $jobs = Job::where('created_by', $id)->with('service')->latest()->get();

        return response($this->api_response(true, ["jobs" => $jobs], "Request completed"), 200);

    }
}
