@extends('layouts.template-admin')
@section('title', "DASHBOARD AEON CREDIT SERVICE INDONESIA - VACANCY")
@section('content')
    <div class="text-sm breadcrumbs px-0 mb-4">
        <ul class="mx-0 px-0 my-0">
            <li class="mx-0 px-0">Vacancy</li> 
            <li>List</li>
        </ul>
    </div>
    <section class="w-full min-h-[90vh] bg-base-100 p-4 rounded-xl shadow-xl">
        <div class="w-full flex justify-between items-center gap-4 mb-4">
            <h2 class="font-semibold my-0">Vacancy</h2>
            <a href="{{ url('/admin/vacancy/create') }}" class="btn btn-primary">
                Add
            </a>
        </div>
        <x-alert/>
        <div class="overflow-x-auto">
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
                        <div class="flex justify-center items-center gap-2">
                            <a 
                            href="{{ url('/admin/vacancy/'.$item->id.'/edit') }}"
                            class="btn btn-sm btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            <button
                            type="button"
                            class="btn btn-sm btn-error"
                            onclick="modal_confirm_delete_{{ $item->id }}.showModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                            <dialog id="modal_confirm_delete_{{ $item->id }}" class="modal">
                                <div class="modal-box text-center prose-sm">
                                    <h3 class="font-bold text-lg mb-4">Delete Confirmation</h3>
                                    <p>Are you sure want to delete?</p>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <button class="btn">Close</button>
                                        </form>
                                        <form action="{{ url('admin/vacancy/'.$item->id)}}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error text-white">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </dialog>      
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
        });
    </script>
@endsection