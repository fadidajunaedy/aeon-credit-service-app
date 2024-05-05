@extends('layouts.template-client')
@section('title', "AEON CREDIT SERVICE INDONESIA - APPLICATION")
@section('content')
    <section class="w-full bg-base-100 min-h-screen">
        <div class="max-w-4xl mx-auto py-8 px-4 lg:px-0 text-justify">
            <div class="text-sm breadcrumbs px-0 mb-4">
                <ul class="mx-0 px-0 my-0">
                    <li class="mx-0 px-0">Application</li> 
                    <li>Me</li>
                </ul>
            </div>
            <h2 class="font-bold text-primary">My Application</h2>
            <table id="applications_table" class="table table-auto">
                <thead>
                    <tr>
                        <th>Nama Posisi</th>
                        <th>Tanggal Apply</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->position_name }}</td>
                        @php
                            $apply_date = \Carbon\Carbon::parse($item->application_created_at)->locale('id');
                        @endphp
                        <td>{{ $apply_date->isoFormat('dddd, DD MMMM YYYY') }}</td>
                        {{-- <td class="text-center">
                            <a 
                            href={{ url('/download/cv/'.$item->cv) }} 
                            class="btn btn-sm btn-secondary"
                            download>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                                Download
                            </a>
                        </td> --}}
                        <td class="text-center">{{ $item->status }}</td>
                        <td class="text-center">
                            <a 
                            href="{{ url('/application/'.$item->id) }}"
                            class="btn btn-sm btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script>
        $(document).ready( function () {
        $('#applications_table').DataTable();
    } );
    </script>
@endsection