@extends('layouts.template-admin')
@section('title', "DASHBOARD AEON CREDIT SERVICE INDONESIA - EDIT APPLICATION - ".$data->id)
@section('content')
    <div class="text-sm breadcrumbs px-0 mb-4">
        <ul class="mx-0 px-0 my-0">
            <li class="mx-0 px-0">
                <a href="{{ url('/admin/application') }}">Application</a>
            </li> 
            <li>{{ $data->application_id }}</li>
            <li>Edit</li>
        </ul>
    </div>
    <section class="w-full min-h-[90vh] bg-base-100 p-4 rounded-xl shadow-xl">
        <h2 class="font-semibold my-0 mb-4">Edit Application</h2>
        <x-alert/>
        <form 
        method="POST"
        action="{{ url('/admin/application/'.$data->application_id.'/update') }}"
        class="flex flex-col gap-2">
            @csrf
            @method('PATCH')

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Posisi yang dilamar</span>
                </div>
                <input 
                type="text" 
                class="input input-bordered"
                value="{{ $data->position_name }}"
                readonly/>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Nama Pelamar</span>
                </div>
                <input 
                type="text" 
                name="nama_lengkap"
                class="input input-bordered"
                value="{{ $data->nama_lengkap }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">NIK</span>
                </div>
                <input 
                type="number" 
                name="nik"
                class="input input-bordered"
                value="{{ $data->nik }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Tempat Lahir</span>
                </div>
                <input 
                type="text" 
                name="tempat_lahir"
                class="input input-bordered"
                value="{{ $data->tempat_lahir }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Tanggal Lahir</span>
                </div>
                <input 
                type="date" 
                name="tanggal_lahir"
                class="input input-bordered"
                value="{{ $data->tanggal_lahir }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Usia</span>
                </div>
                <input 
                type="number" 
                name="usia"
                class="input input-bordered"
                value="{{ $data->usia }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Alamat Lengkap</span>
                </div>
                <textarea 
                name="alamat_lengkap"
                class="textarea textarea-bordered">{{ $data->alamat_lengkap }}</textarea>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Nomor Handphone</span>
                </div>
                <input 
                type="number" 
                name="nomor_hp"
                class="input input-bordered"
                value="{{ $data->nomor_hp }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Nomor Kontak Darurat</span>
                </div>
                <input 
                type="number" 
                name="nomor_kontak_darurat"
                class="input input-bordered"
                value="{{ $data->nomor_kontak_darurat }}"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">SKCK</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/skck/'.$data->skck) }}"
                        class="link"
                        download>
                           {{ $data->skck }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="skck"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Surat Keterangan Sehat</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/surat_keterangan_sehat/'.$data->surat_keterangan_sehat) }}"
                        class="link"
                        download>
                           {{ $data->surat_keterangan_sehat }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="surat_keterangan_sehat"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">KTP</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/ktp/'.$data->ktp) }}"
                        class="link"
                        download>
                           {{ $data->ktp }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="ktp"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Surat Lamaran Kerja</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/surat_lamaran_kerja/'.$data->surat_lamaran_kerja) }}"
                        class="link"
                        download>
                           {{ $data->surat_lamaran_kerja }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="surat_lamaran_kerja"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Surat Lamaran Kerja</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/npwp/'.$data->npwp) }}"
                        class="link"
                        download>
                           {{ $data->npwp }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="npwp"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Surat Lamaran Kerja</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/paklaring/'.$data->paklaring) }}"
                        class="link"
                        download>
                           {{ $data->paklaring }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="paklaring"
                class="file-input file-input-bordered"/>
            </label>
            
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Curiculum Vitae</span>
                    <span class="label-text label-text-alt">
                        <a 
                        href="{{ url('/download/cv/'.$data->cv) }}"
                        class="link"
                        download>
                           {{ $data->cv }}
                        </a>
                    </span>
                </div>
                <input 
                type="file" 
                name="cv"
                class="file-input file-input-bordered"/>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">Status</span>
                </div>
                <select 
                name="status"
                class="select select-bordered">
                <option value="Review" {{ $data->status === "Review" ? 'selected' : ''}}>Review</option>
                <option value="Tidak Lolos Review" {{ $data->status === "Tidak Lolos Review" ? 'selected' : ''}}>Tidak Lolos Review</option>
                <option value="Lolos Review" {{ $data->status === "Lolos Review" ? 'selected' : ''}}>Lolos Review</option>
                <option value="Lolos Interview" {{ $data->status === "Lolos Interview" ? 'selected' : ''}}>Lolos Interview</option>
                <option value="Lolos Kontak Referensi" {{ $data->status === "Lolos Kontak Referensi" ? 'selected' : ''}}>Lolos Kontak Referensi</option>
                </select>
            </label>
            
            <div class="flex justify-end items-center gap-2 mt-4">
                <button
                type="submit"
                class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </section>
@endsection