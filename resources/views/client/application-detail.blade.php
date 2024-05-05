@extends('layouts.template-client')
@section('title', "AEON CREDIT SERVICE INDONESIA - APPLICATION - ".$data->id)
@section('content')
<section class="w-full bg-base-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0">
        <div class="text-sm breadcrumbs px-0 mb-4">
            <ul class="mx-0 px-0 my-0">
                <li class="mx-0 px-0">
                    <a href="{{ url('/application/me') }}">Application</a>
                </li> 
                <li>{{ $data->id }}</li>
            </ul>
        </div>

        <x-alert/>
        
        <h2 class="font-bold text-primary">Application Detail</h2>
        <table class="table table-lg">
            <tr>
                <th>Posisi yang dilamar</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    <a href="{{ url('/vacancy/'.$data->vacancy_id) }}" class="link">{{ $data->position_name }}</a>
                </td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->nama_lengkap }}
                </td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->nik }}
                </td>
            </tr>
            @php
                $tanggal_lahir = \Carbon\Carbon::parse($data->tanggal_lahir)->locale('id');
            @endphp
            <tr>
                <th>Tempat & Tanggal Lahir</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->tempat_lahir }}, {{ $tanggal_lahir->isoFormat('DD MMMM YYYY') }}
                </td>
            </tr>
            <tr>
                <th>Usia</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->usia }} Tahun
                </td>
            </tr>
            <tr>
                <th>Alamat Lengkap</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->alamat_lengkap }}
                </td>
            </tr>
            <tr>
                <th>Nomor Handphone</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->nomor_hp }}
                </td>
            </tr>
            <tr>
                <th>Nomor Kontak Darurat</th>
                <td>
                    :&nbsp;&nbsp;&nbsp;
                    {{ $data->nomor_kontak_darurat }}
                </td>
            </tr>
            <tr>
                <th>SKCK</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/skck/'.$data->skck) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->skck }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Surat Keterangan Sehat</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/surat_keterangan_sehat/'.$data->surat_keterangan_sehat) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->surat_keterangan_sehat }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>KTP</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/ktp/'.$data->ktp) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->ktp }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Surat Lamaran Kerja</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/surat_lamaran_kerja/'.$data->surat_lamaran_kerja) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->surat_lamaran_kerja }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>NPWP</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/npwp/'.$data->npwp) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->npwp }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Paklaring</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/paklaring/'.$data->paklaring) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->paklaring }}
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Curiculum Vitae</th>
                <td>
                    <div class="flex items-center gap-2">
                        :&nbsp;&nbsp;&nbsp;
                        <a 
                        href={{ url('/download/cv/'.$data->cv) }} 
                        class="link flex items-center gap-2"
                        download>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                            {{ $data->cv }}
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</section>
@endsection