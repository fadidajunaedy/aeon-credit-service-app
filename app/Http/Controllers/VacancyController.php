<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
    public function client () {
        $data = Vacancy::orderBy('created_at', 'asc')->get();
        return view('client.vacancy')->with('data', $data);
    }
    
    public function clientDetail (string $id) {
        $data = Vacancy::where('id', $id)->first();
        return view('client.vacancy-detail')->with('data', $data);
    }

    public function index () {
        $data = Vacancy::orderBy('created_at', 'asc')->get();
        return view('admin.vacancy.index')->with('data', $data);
    }

    public function create () {
        return view('admin.vacancy.create');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'position_name' => ['required', 'string', 'max:255'],
            'recruitment_type' => ['required', 'string', 'max:255'],
            'work_location' => ['required', 'string', 'max:255'],
            'working_time' => ['required', 'string', 'max:255'],
            'worker_status' => ['required', 'string', 'max:255'],
            'application_deadline' => ['required', 'string'],
            'job_description' => ['required', 'string'],
            'requirements' => ['required', 'string'],
            'level' => ['required', 'string', 'max:255'],
            'minimum_experience' => ['required', 'string', 'max:255'],
            'education_level' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Vacancy::create([
            'position_name' => $request->position_name,
            'recruitment_type' => $request->recruitment_type,
            'work_location' => $request->work_location,
            'working_time' => $request->working_time,
            'worker_status' => $request->worker_status,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'requirements' => $request->requirements,
            'level' => $request->level,
            'minimum_experience' => $request->minimum_experience,
            'education_level' => $request->education_level,
            'major' => $request->major,
        ]);

        return redirect()->back()->with('success', 'Success Create Data');
    }

    public function edit (string $id) {
        $data = Vacancy::where('id', $id)->first();
        return view('admin.vacancy.edit')->with('data', $data);
    }

    public function update (Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'position_name' => ['string', 'max:255'],
            'recruitment_type' => ['string', 'max:255'],
            'work_location' => ['string', 'max:255'],
            'working_time' => ['string', 'max:255'],
            'worker_status' => ['string', 'max:255'],
            'application_deadline' => ['string'],
            'job_description' => ['string'],
            'requirements' => ['string'],
            'level' => ['string', 'max:255'],
            'minimum_experience' => ['string', 'max:255'],
            'education_level' => ['string', 'max:255'],
            'major' => ['string', 'max:255'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Vacancy::where('id', $id)->update([
            'position_name' => $request->position_name,
            'recruitment_type' => $request->recruitment_type,
            'work_location' => $request->work_location,
            'working_time' => $request->working_time,
            'worker_status' => $request->worker_status,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'requirements' => $request->requirements,
            'level' => $request->level,
            'minimum_experience' => $request->minimum_experience,
            'education_level' => $request->education_level,
            'major' => $request->major,
        ]);

        return redirect()->back()->with('success', 'Success Update Data');
    }

    public function destroy (string $id) {
        Vacancy::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Success Delete Data');
    }
}
