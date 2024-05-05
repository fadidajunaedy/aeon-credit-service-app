@extends('layouts.template-admin')
@section('title', "DASHBOARD AEON CREDIT SERVICE INDONESIA")
@section('content')
<section class="w-full h-[30vh] bg-primary p-4 rounded-xl shadow-xl flex items-center">
    <h1 class="font-bold text-base-100 my-0 py-0">Hallo, {{ auth()->user()->name }}</h1>
</section>
<section class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 px-4 gap-4 -translate-y-8">
    <div class="flex flex-col gap-2 p-4 bg-base-100 rounded-xl shadow-xl">
        <h2 class="my-0 py-0">User</h2>
        <span class="font-bold text-4xl">{{ $jumlahUser }}</span>
    </div>
    <div class="flex flex-col gap-2 p-4 bg-base-100 rounded-xl shadow-xl">
        <h2 class="my-0 py-0">Vacancy</h2>
        <span class="font-bold text-4xl">{{ $jumlahVacancy }}</span>
    </div>
    <div class="flex flex-col gap-2 p-4 bg-base-100 rounded-xl shadow-xl">
        <h2 class="my-0 py-0">Vacancy Active</h2>
        <span class="font-bold text-4xl">{{ $jumlahVacancyActive }}</span>
    </div>
    <div class="flex flex-col gap-2 p-4 bg-base-100 rounded-xl shadow-xl">
        <h2 class="my-0 py-0">Application</h2>
        <span class="font-bold text-4xl">{{ $jumlahApplication }}</span>
    </div>
</section>

@endsection