@extends('layouts.template-client')
@section('title', "AEON CREDIT SERVICE INDONESIA - VACANCY")
@section('content')
    <section class="w-full bg-base-100 min-h-screen">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <h2 class="font-bold text-primary">Vacancy</h2>
            <table id="vacancies_table" class="table table-auto">
                <thead>
                    <tr>
                        <th>Nama Posisi</th>
                        <th>Level / Jabatan</th>
                        <th>Minimal Pengalaman</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Batas Lamaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->position_name }}</td>
                        <td>{{ $item->level }}</td>
                        <td class="text-center">
                            @if ($item->minimum_experience < 1)
                                Kurang dari 1 Tahun
                            @elseif($item->minimum_experience > 5)
                                Lebih dari 5 Tahun
                            @else
                            {{ $item->minimum_experience }} Tahun
                            @endif
                        </td>
                        <td>
                            @if ($item->education_level === "SD" || $item->education_level === "SMP" || $item->education_level === "SMA")
                                {{ $item->education_level }} (Sederajat)
                            @elseif ($item->education_level === "Diploma")
                                {{ $item->education_level }} (D1/D2/D3)
                            @elseif ($item->education_level === "Sarjana") 
                                {{ $item->education_level }} (S1)
                            @elseif ($item->education_level === "Magister") 
                                {{ $item->education_level }} (S2)
                            @elseif ($item->education_level === "Doktor") 
                                {{ $item->education_level }} (S3)
                            @endif
                        </td>
                        <td>{{ $item->major }}</td>
                        @php
                            $deadline_lamaran = \Carbon\Carbon::parse($item->application_deadline)->locale('id')
                        @endphp
                        <td>{{ $deadline_lamaran->isoFormat('dddd, DD MMMM YYYY') }}</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a 
                                href="{{ url('/vacancy/'.$item->id) }}"
                                class="btn btn-sm btn-primary">
                                    Detail
                                </a>  
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script>
        $(document).ready( function () {
        $('#vacancies_table').DataTable();
    } );
    </script>
@endsection