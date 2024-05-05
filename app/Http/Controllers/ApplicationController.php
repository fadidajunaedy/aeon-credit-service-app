<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotPassedReviewMail;
use App\Mail\PassedReviewMail;
use App\Mail\PassedInterviewMail;
use App\Mail\PassedReferenceContactMail;

class ApplicationController extends Controller
{
    public function index () {
        $data = Application::join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->join('users', 'applications.user_id', '=', 'users.id')
        ->orderBy('applications.created_at', 'asc')
        ->get([
            'users.*',
            'vacancies.*',
            'applications.*',
            'vacancies.id as vacancy_id',
            'applications.id as application_id',
            'applications.created_at as application_created_at',
            'applications.updated_at as application_updated_at',
            'vacancies.created_at as vacancy_created_at',
            'vacancies.updated_at as vacancy_updated_at',]);

        return view('admin.application.index')->with('data', $data);
    }

    public function edit (string $id) {
        $data = Application::join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->join('users', 'applications.user_id', '=', 'users.id')
        ->where('applications.id', $id)
        ->orderBy('applications.created_at', 'asc')
        ->first([
            'users.*',
            'vacancies.*',
            'applications.*',
            'users.id as user_id',
            'vacancies.id as vacancy_id',
            'applications.id as application_id',
            'applications.created_at as application_created_at',
            'applications.updated_at as application_updated_at',
            'vacancies.created_at as vacancy_created_at',
            'vacancies.updated_at as vacancy_updated_at',]);

        return view('admin.application.edit')->with('data', $data);
    }

    public function update (Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => ['string', 'max:255'],
            'nik' => ['string', 'max:16'],
            'tempat_lahir' => ['string', 'max:255'],
            'tanggal_lahir' => ['string', 'max:255'],
            'usia' => ['integer', 'max:255'],
            'alamat_lengkap' => ['string'],
            'nomor_hp' => ['string', 'max:13'],
            'nomor_kontak_darurat' => ['string', 'max:13'],
            'skck' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'surat_keterangan_sehat' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'ktp' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'surat_lamaran_kerja' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'npwp' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'paklaring' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'cv' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'status' => ['string', 'max:255'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $application = Application::where('id', $id)->first();
        if (!$application) {
            return redirect()->back()->withErrors("Application Not Found")->withInput();
        }

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'nomor_kontak_darurat' => $request->nomor_kontak_darurat,
            'status' => $request->status
        ];

        if ($request->hasFile('skck')) {
            $skck = $request->file('skck');
            $skck_extension = $skck->extension();
            $skck_name = date('ymdhis').".".$skck_extension;
            $skck->move(public_path('skck'), $skck_name);

            File::delete(public_path('skck').'/'.$application->skck);
            $data['skck'] = $skck_name;
        } else {
            unset($data['skck']);
        }
        
        if ($request->hasFile('surat_keterangan_sehat')) {
            $surat_keterangan_sehat = $request->file('surat_keterangan_sehat');
            $surat_keterangan_sehat_extension = $surat_keterangan_sehat->extension();
            $surat_keterangan_sehat_name = date('ymdhis').".".$surat_keterangan_sehat_extension;
            $surat_keterangan_sehat->move(public_path('surat_keterangan_sehat'), $surat_keterangan_sehat_name);

            File::delete(public_path('surat_keterangan_sehat').'/'.$application->surat_keterangan_sehat);
            $data['surat_keterangan_sehat'] = $surat_keterangan_sehat_name;
        } else {
            unset($data['surat_keterangan_sehat']);
        }
        
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktp_extension = $ktp->extension();
            $ktp_name = date('ymdhis').".".$ktp_extension;
            $ktp->move(public_path('ktp'), $ktp_name);

            File::delete(public_path('ktp').'/'.$application->ktp);
            $data['ktp'] = $ktp_name;
        } else {
            unset($data['ktp']);
        }
        
        if ($request->hasFile('surat_lamaran_kerja')) {
            $surat_lamaran_kerja = $request->file('surat_lamaran_kerja');
            $surat_lamaran_kerja_extension = $surat_lamaran_kerja->extension();
            $surat_lamaran_kerja_name = date('ymdhis').".".$surat_lamaran_kerja_extension;
            $surat_lamaran_kerja->move(public_path('surat_lamaran_kerja'), $surat_lamaran_kerja_name);

            File::delete(public_path('surat_lamaran_kerja').'/'.$application->surat_lamaran_kerja);
            $data['surat_lamaran_kerja'] = $surat_lamaran_kerja_name;
        } else {
            unset($data['surat_lamaran_kerja']);
        }
        
        if ($request->hasFile('npwp')) {
            $npwp = $request->file('npwp');
            $npwp_extension = $npwp->extension();
            $npwp_name = date('ymdhis').".".$npwp_extension;
            $npwp->move(public_path('npwp'), $npwp_name);

            File::delete(public_path('npwp').'/'.$application->npwp);
            $data['npwp'] = $npwp_name;
        } else {
            unset($data['npwp']);
        }
        
        if ($request->hasFile('paklaring')) {
            $paklaring = $request->file('paklaring');
            $paklaring_extension = $paklaring->extension();
            $paklaring_name = date('ymdhis').".".$paklaring_extension;
            $paklaring->move(public_path('paklaring'), $paklaring_name);

            File::delete(public_path('paklaring').'/'.$application->paklaring);
            $data['paklaring'] = $paklaring_name;
        } else {
            unset($data['paklaring']);
        }
        
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cv_extension = $cv->extension();
            $cv_name = date('ymdhis').".".$cv_extension;
            $cv->move(public_path('cv'), $cv_name);

            File::delete(public_path('cv').'/'.$application->cv);
            $data['cv'] = $cv_name;
        } else {
            unset($data['cv']);
        }

        Application::where('id', $id)->update($data);

        $user = User::where('id', $application->user_id)->first();
        if (!$user) {
            return redirect()->back()->withErrors("User Not Found")->withInput();
        }

        $data = [
            'name' => $user->name,
        ];

        if ($application->status !== $request->status) {
            if ($request->status === "Tidak Lolos Review") {
                Mail::to($user->email)->send(new NotPassedReviewMail($data));
            } else if ($request->status === "Lolos Review") {
                Mail::to($user->email)->send(new PassedReviewMail($data));
            } else if ($request->status === "Lolos Interview") {
                Mail::to($user->email)->send(new PassedInterviewMail($data));
            } else if ($request->status === "Lolos Kontak Referensi") {
                Mail::to($user->email)->send(new PassedReferenceContactMail($data));
            }
        }


        return redirect()->back()->with('success', 'Success Update Data');
    }

    public function client () {
        $data = Application::join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->where('applications.user_id', auth()->user()->id)
        ->orderBy('applications.created_at', 'asc')
        ->get([
            'vacancies.*',
            'applications.*',
            'vacancies.id as vacancy_id',
            'applications.id as application_id',
            'applications.created_at as application_created_at',
            'applications.updated_at as application_updated_at',
            'vacancies.created_at as vacancy_created_at',
            'vacancies.updated_at as vacancy_updated_at',]);
        return view('client.application')->with('data', $data);
    }

    public function detail (string $id) {
        $data = Application::join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->join('users', 'applications.user_id', '=', 'users.id')
        ->where('applications.user_id', auth()->user()->id)
        ->orWhere('applications.id', $id)
        ->orderBy('applications.created_at', 'asc')
        ->first([
            'users.*',
            'vacancies.*',
            'applications.*',
            'users.id as user_id',
            'vacancies.id as vacancy_id',
            'applications.id as application_id',
            'applications.created_at as application_created_at',
            'applications.updated_at as application_updated_at',
            'vacancies.created_at as vacancy_created_at',
            'vacancies.updated_at as vacancy_updated_at',]);

        return view('client.application-detail')->with('data', $data);
    }

    public function apply (Request $request) {
        $validator = Validator::make($request->all(), [
            'vacancy_id' => ['required', 'integer'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:16'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'usia' => ['required', 'integer', 'max:255'],
            'alamat_lengkap' => ['required', 'string'],
            'nomor_hp' => ['required', 'string', 'max:13'],
            'nomor_kontak_darurat' => ['required', 'string', 'max:13'],
            'skck' => ['required', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'surat_keterangan_sehat' => ['required', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'ktp' => ['required', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'surat_lamaran_kerja' => ['required', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'npwp' => ['mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'paklaring' => ['mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
            'cv' => ['mimes:jpeg,jpg,png,pdf,doc,docx', 'max:5120'],
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'mimes' => 'hanya tipe file jpeg, jpg, png, pdf, doc, docx yang diperbolehkan',
            'skck.max' => 'Ukuran files SKCK tidak boleh melebihi 5MB.',
            'surat_keterangan_sehat.max' => 'Ukuran files Surat Keterangan Sehat tidak boleh melebihi 5MB.',
            'ktp.max' => 'Ukuran files KTP tidak boleh melebihi 5MB.',
            'surat_lamaran_kerja.max' => 'Ukuran files Surat Lamaran Kerja tidak boleh melebihi 5MB.',
            'npwp.max' => 'Ukuran files NPWP tidak boleh melebihi 5MB.',
            'paklaring.max' => 'Ukuran files Paklaring tidak boleh melebihi 5MB.',
            'cv.max' => 'Ukuran files tidak boleh melebihi 5MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vacancy = Vacancy::where('id', $request->vacancy_id)->first();
        if (!$vacancy) {
            return redirect()->back()->withErrors("Vacancy is not found")->withInput();
        }

        // SKCK
        $skck_name = null;
        if ($request->hasFile('skck')) {
            $skck = $request->file('skck');
            $skck_extension = $skck->extension();
            $skck_name = date('ymdhis').".".$skck_extension;
            $skck->move(public_path('skck'), $skck_name);

        } else {
            $skck_name = null;
        }
        
        // Surat Keterangan Sehat
        $surat_keterangan_sehat_name = null;
        if ($request->hasFile('surat_keterangan_sehat')) {
            $surat_keterangan_sehat = $request->file('surat_keterangan_sehat');
            $surat_keterangan_sehat_extension = $surat_keterangan_sehat->extension();
            $surat_keterangan_sehat_name = date('ymdhis').".".$surat_keterangan_sehat_extension;
            $surat_keterangan_sehat->move(public_path('surat_keterangan_sehat'), $surat_keterangan_sehat_name);

        } else {
            $surat_keterangan_sehat_name = null;
        }
       
        // KTP
        $ktp_name = null;
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktp_extension = $ktp->extension();
            $ktp_name = date('ymdhis').".".$ktp_extension;
            $ktp->move(public_path('ktp'), $ktp_name);

        } else {
            $ktp_name = null;
        }
        
        // Surat Lamaran Kerja
        $surat_lamaran_kerja_name = null;
        if ($request->hasFile('surat_lamaran_kerja')) {
            $surat_lamaran_kerja = $request->file('surat_lamaran_kerja');
            $surat_lamaran_kerja_extension = $surat_lamaran_kerja->extension();
            $surat_lamaran_kerja_name = date('ymdhis').".".$surat_lamaran_kerja_extension;
            $surat_lamaran_kerja->move(public_path('surat_lamaran_kerja'), $surat_lamaran_kerja_name);

        } else {
            $surat_lamaran_kerja_name = null;
        }
        
        // NPWP
        $npwp_name = null;
        if ($request->hasFile('npwp')) {
            $npwp = $request->file('npwp');
            $npwp_extension = $npwp->extension();
            $npwp_name = date('ymdhis').".".$npwp_extension;
            $npwp->move(public_path('npwp'), $npwp_name);

        } else {
            $npwp_name = null;
        }
        
        // Paklaring
        $paklaring_name = null;
        if ($request->hasFile('paklaring')) {
            $paklaring = $request->file('paklaring');
            $paklaring_extension = $paklaring->extension();
            $paklaring_name = date('ymdhis').".".$paklaring_extension;
            $paklaring->move(public_path('paklaring'), $paklaring_name);

        } else {
            $paklaring_name = null;
        }

        // CV
        $cv_name = null;
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cv_extension = $cv->extension();
            $cv_name = date('ymdhis').".".$cv_extension;
            $cv->move(public_path('cv'), $cv_name);

        } else {
            $cv_name = null;
        }

        Application::create([
            'vacancy_id' => $request->vacancy_id,
            'user_id' =>auth()->user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'nomor_kontak_darurat' => $request->nomor_kontak_darurat,
            'skck' => $skck_name,
            'surat_keterangan_sehat' => $surat_keterangan_sehat_name,
            'ktp' => $ktp_name,
            'surat_lamaran_kerja' => $surat_lamaran_kerja_name,
            'npwp' => $npwp_name,
            'paklaring' => $paklaring_name,
            'cv' => $cv_name,
        ]);

        return redirect()->back()->with('success', 'Success apply, wait for further information');
    }

    public function destroy (string $id) {
        $application = Application::where('id', $id)->first();

        if (!$application) {
            return redirect()->back()->withErrors("Application not found")->withInput();
        }

        if ($application->cv) {
            File::delete(public_path('cv').'/'.$application->cv);
        }
        
        Application::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Success delete data!');
    }

    public function downloadFile (string $folder, string $filename) {
        $file = public_path($folder) . "/" . $filename;
        $headers = array('Content-Type: application/pdf');
        return Response::download($file, $filename, $headers);
    }
}
