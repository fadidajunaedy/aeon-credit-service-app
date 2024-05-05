<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AEON CREDIT SERVICE INDONESIA - FORGOT PASSWORD</title>
    @vite('resources/css/app.css')
</head>
<body class="prose-sm">
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full max-w-lg p-8 mx-auto">
            <h1 class="text-center font-bold">Forgot Password</h1>
            <x-alert/>
            <form 
            method="POST" 
            action={{ route('forgot-password') }}
            class="flex flex-col gap-4">
                @csrf
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#8E39D3" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input 
                    type="email" 
                    name="email"
                    placeholder="Email"
                    value="{{old('email')}}"
                    class="input grow border-none focus:border-none  focus:outline-0 focus:outline-offset-0" 
                    required/>
                </label>
                <button
                type="submit"
                class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </section>
</body>
</html>