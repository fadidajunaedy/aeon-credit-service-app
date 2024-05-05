@extends('layouts.template-admin')
@section('title', "DASHBOARD AEON CREDIT SERVICE INDONESIA - USER")
@section('content')
    <div class="text-sm breadcrumbs px-0 mb-4">
        <ul class="mx-0 px-0 my-0">
            <li class="mx-0 px-0">User</li> 
            <li>List</li>
        </ul>
    </div>
    <section class="w-full min-h-[90vh] bg-base-100 p-4 rounded-xl shadow-xl">
        <div class="w-full flex justify-between items-center gap-4 mb-4">
            <h2 class="font-semibold my-0">User</h2>
        </div>
        <x-alert/>
        <div class="overflow-x-auto">
        <table id="users_table" class="table table-auto">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <div class="flex justify-center items-center gap-2">
                            <button
                            type="button"
                            class="btn btn-sm btn-error"
                            onclick="modal_confirm_delete_{{ $item->application_id }}.showModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                            <dialog id="modal_confirm_delete_{{ $item->application_id }}" class="modal">
                                <div class="modal-box text-center prose-sm">
                                    <h3 class="font-bold text-lg mb-4">Delete Confirmation</h3>
                                    <p>Are you sure want to delete?</p>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <button class="btn">Close</button>
                                        </form>
                                        <form action="{{ url('admin/application/'.$item->id)}}" method="POST">
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
            $('#users_table').DataTable();
        });
    </script>
@endsection