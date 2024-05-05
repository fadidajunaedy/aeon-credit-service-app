@extends('layouts.template-admin')
@section('title', "DASHBOARD AEON CREDIT SERVICE INDONESIA - EDIT VACANCY - ".$data->id)
@section('content')
    <div class="text-sm breadcrumbs px-0 mb-4">
        <ul class="mx-0 px-0 my-0">
            <li class="mx-0 px-0">
                <a href="{{ url('/admin/vacancy') }}">Vacancy</a>
            </li> 
            <li>{{ $data->id }}</li>
            <li>Edit</li>
        </ul>
    </div>
    <section class="w-full min-h-[90vh] bg-base-100 p-4 rounded-xl shadow-xl">
        <h2 class="font-semibold my-0 mb-4">Edit Vacancy</h2>
        <x-alert/>
        <form 
        method="POST"
        action="{{ url('/admin/vacancy/'.$data->id.'/update') }}"
        class="flex flex-col gap-2">
            @csrf
            @method('PATCH')
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Nama Posisi</span>
                </div>
                <input 
                type="text" 
                name="position_name"
                class="input input-bordered"
                value="{{ $data->position_name }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Tipe Rekrutmen</span>
                </div>
                <input 
                type="text" 
                name="recruitment_type"
                class="input input-bordered"
                value="{{ $data->recruitment_type }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Lokasi Kerja</span>
                </div>
                <input 
                type="text" 
                name="work_location"
                class="input input-bordered"
                value="{{ $data->work_location }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Waktu Kerja</span>
                </div>
                <input 
                type="text" 
                name="working_time"
                class="input input-bordered"
                value="{{ $data->working_time }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Status Pekerja</span>
                </div>
                <input 
                type="text" 
                name="worker_status"
                class="input input-bordered"
                value="{{ $data->worker_status }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Batas Lamaran</span>
                </div>
                <input 
                type="date" 
                name="application_deadline"
                class="input input-bordered"
                value="{{ $data->application_deadline }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Deskripsi</span>
                </div>
                <textarea 
                name="job_description"
                class="textarea textarea-bordered"
                required>{{ $data->job_description }}</textarea>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Persyaratan</span>
                </div>
                <textarea
                id="myeditorinstance"
                name="requirements"
                class="textarea textarea-bordered"
                required>{{ $data->requirements }}</textarea>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Level/Jabatan</span>
                </div>
                <input 
                type="text" 
                name="level"
                class="input input-bordered"
                value="{{ $data->level }}"
                required/>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Minimal Pengalaman</span>
                </div>
                <input 
                type="range" 
                name="minimum_experience"
                min="0" 
                max="6"
                class="range range-primary" 
                step="1"
                value="{{ $data->minimum_experience }}"
                required/>
                <div class="w-full flex justify-between text-sm font-semibold px-2 ">
                    <span>< 1 Tahun</span>
                    <span>1 Tahun</span>
                    <span>2 Tahun</span>
                    <span>3 Tahun</span>
                    <span>4 Tahun</span>
                    <span>5 Tahun</span>
                    <span>> 5 Tahun</span>
                </div>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Jenjang Pendidikan</span>
                </div>
                <select 
                name="education_level" 
                class="select select-bordered" 
                required>
                    <option disabled selected>Pilih salah satu</option>
                    <option value="SD" {{ $data->education_level === 'SD' ? 'selected' : '' }}>SD (Sederajat)</option>
                    <option value="SMP" {{ $data->education_level === 'SMP' ? 'selected' : '' }}>SMP (Sederajat)</option>
                    <option value="SMA" {{ $data->education_level === 'SMA' ? 'selected' : '' }}>SMA (Sederajat)</option>
                    <option value="Diploma" {{ $data->education_level === 'Diploma' ? 'selected' : '' }}>Diploma (D1/D2/D3)</option>
                    <option value="Sarjana" {{ $data->education_level === 'Sarjana' ? 'selected' : '' }}>Sarjana (S1)</option>
                    <option value="Magister" {{ $data->education_level === 'Magister' ? 'selected' : '' }}>Magister (S2)</option>
                    <option value="Doktor" {{ $data->education_level === 'Doktor' ? 'selected' : '' }}>Doktor (S3)</option>
                </select>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Jurusan</span>
                </div>
                <input 
                type="text" 
                name="major"
                class="input input-bordered"
                value="{{ $data->major }}"
                required/>
            </label>
            
            <div class="flex justify-end items-center gap-2 mt-4">
                <button
                type="submit"
                class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </section>
@endsection