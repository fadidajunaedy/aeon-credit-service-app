@extends('layouts.template-client')
@section('title', "AEON CREDIT SERVICE INDONESIA - VACANCY - ".$data->position_name)
@section('content')
<section class="w-full bg-base-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0">
        <div class="text-sm breadcrumbs px-0 mb-4">
            <ul class="mx-0 px-0 my-0">
                <li class="mx-0 px-0">
                    <a href="{{ url('/vacancy') }}">Vacancy</a>
                </li> 
                <li>{{ $data->id }}</li>
            </ul>
        </div>
        <x-alert/>
        <h2 class="font-bold text-primary">Informasi Posisi</h2>
        <table class="table table-fixed text-lg">
            <tr>
                <th>Nama Posisi</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->position_name }}
                </td>
            </tr>
            <tr>
                <th>Tipe Rekrutmen</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->recruitment_type }}
                </td>
            </tr>
            <tr>
                <th>Lokasi Kerja</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->work_location }}
                </td>
            </tr>
            <tr>
                <th>Waktu Kerja</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->working_time }}
                </td>
            </tr>
            <tr>
                <th>Status Kerja</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->worker_status }}
                </td>
            </tr>
            <tr>
                <th>Level/Jabatan</th>
                <td>
                    :&nbsp;&nbsp;
                    {{ $data->level }}
                </td>
            </tr>
        </table>

        <h2 class="font-bold text-primary">Deskripsi Pekerjaan</h2>
        <p class="text-lg">{{ $data->job_description }}</p>

        <h2 class="font-bold text-primary">Persyaratan</h2>
        <div class="requirements-container text-lg">{!! $data->requirements !!}</div>
        @if (auth()->user())
            @if (auth()->user()->role === "user" )
                <h2 class="font-bold text-primary">Application</h2>
                @if ($data->application_deadline > \Carbon\Carbon::now()->toDateString())
                    <form
                    method="POST" 
                    action="{{ url('/vacancy/apply') }}"
                    enctype="multipart/form-data" 
                    class="w-full flex flex-col gap-4"
                    >
                        @csrf
                        @method('POST')
                        <input type="hidden" name="vacancy_id" value="{{ $data->id }}">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Nama Lengkap</span>
                            </div>
                            <input 
                            type="text" 
                            class="input input-bordered"
                            name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">NIK</span>
                            </div>
                            <input 
                            type="text" 
                            class="input input-bordered"
                            name="nik"
                            value="{{ old('nik') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Tempat Lahir</span>
                            </div>
                            <input 
                            type="text" 
                            class="input input-bordered"
                            name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Tanggal Lahir</span>
                            </div>
                            <input 
                            type="date" 
                            id="input_tanggal_lahir"
                            class="input input-bordered"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Usia</span>
                            </div>
                            <input 
                            type="number" 
                            id="input_usia"
                            class="input input-bordered"
                            name="usia"
                            value="{{ old('usia') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Alamat Lengkap</span>
                            </div>
                            <textarea 
                            name="alamat_lengkap"
                            class="textarea textarea-bordered"
                            required>{{old('alamat_lengkap')}}</textarea>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Nomor Handphone</span>
                            </div>
                            <input 
                            type="number" 
                            class="input input-bordered"
                            name="nomor_hp"
                            value="{{ old('nomor_hp') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Nomor Kontak Darurat</span>
                            </div>
                            <input 
                            type="number" 
                            class="input input-bordered"
                            name="nomor_kontak_darurat"
                            value="{{ old('nomor_kontak_darurat') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">SKCK</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="skck"
                            value="{{ old('skck') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Surat Keterangan Sehat</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="surat_keterangan_sehat"
                            value="{{ old('surat_keterangan_sehat') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">KTP</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="ktp"
                            value="{{ old('ktp') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Surat Lamaran Kerja</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="surat_lamaran_kerja"
                            value="{{ old('surat_lamaran_kerja') }}"
                            required>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">NPWP</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="npwp"
                            value="{{ old('npwp') }}">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Paklaring</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="paklaring"
                            value="{{ old('paklaring') }}">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text font-semibold">Curiculum Vitae / Resume</span>
                                <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                            </div>
                            <input 
                            type="file" 
                            class="file-input file-input-bordered"
                            name="cv"
                            value="{{ old('cv') }}">
                        </label>
                        <div class="w-full flex justify-end items-center gap-2">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Apply</button>

                        </div>
                    </form>
                @else
                    <p class="text-slate-400 text-xl">Lowongan sudah tidak tersedia</p>
                @endif
            @endif    
        @else
            <div class="w-full flex justify-end items-center gap-2">
                <a
                href="{{ url('/auth/login') }}"
                class="btn btn-primary">Login for Apply</a>
            </div>
        @endif
    </div>
</section>
@endsection