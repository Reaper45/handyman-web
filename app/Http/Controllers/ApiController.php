<?php

namespace App\Http\Controllers;

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
        $handyman = Party::find($party_id);

        $job->handyman()->update();

        return response($this->api_response(true, null, "Request completed"), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
