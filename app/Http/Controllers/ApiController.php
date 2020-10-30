<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Traits\ControllerHelpers;
use App\Job;
use App\Party;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

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

        $job              = Job::find($job_id);
        $job->assigned_to = $party_id;
        $job->status      = "ONGOING";


        $job->update();
        $handyman = Party::find($party_id);

        // Send SMS
        $this->sendSMS($job->creator->phone_number, $handyman);

        return response($this->api_response(true, ["job" => $job], "Request completed"), 200);

    }

    public function sendSMS($phone_number, $handyman)
    {
        $username = 'Reaper45';
        $apiKey   = '7a93217759d5b3005a0d14af47e55f8d7e83eb9e0bcc95bd4462296631f74648';
        $AT       = new AfricasTalking($username, $apiKey);

        $sms      = $AT->sms();

        $result   = $sms->send([
            'to'      => $phone_number,
            'message' => 'Good News. ' .$handyman->name.' has picked your task. The handyman will make contact in a few, or feel free to reach out' .$handyman->phone_number,
        ]);

        Log::info($result);
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
        $geometry    = $request->input('geometry');

        $job = new Job();
        $job->service_id     = $service_id;
        $job->category_id    = $category_id;
        $job->location       = $location;
        $job->extra          = $info;
        $job->created_by     = $user_id;
        $job->lat            = $geometry['lat'];
        $job->lon            = $geometry['lng'];
        $job->scheduled_time = $time ;
        $job->scheduled_date = $date;

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
