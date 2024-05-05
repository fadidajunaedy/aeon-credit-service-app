<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index () {
        $jumlahUser = User::count();
        $jumlahVacancy = Vacancy::count();
        $jumlahVacancyActive = Vacancy::where('application_deadline', '>', Carbon::now()->toDateString())->count();
        $jumlahApplication = Application::count();
        $data = User::orderBy('created_at', 'asc')->get();
        return view('admin.dashboard',compact('jumlahUser', 'jumlahVacancy', 'jumlahVacancyActive', 'jumlahApplication'));
    }
}
