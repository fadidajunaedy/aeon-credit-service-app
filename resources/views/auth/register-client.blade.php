<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AEON CREDIT SERVICE INDONESIA - REGISTER</title>
    @vite('resources/css/app.css')
</head>
<body class="prose-sm">
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full max-w-lg p-8 mx-auto">
            <h1 class="text-center font-bold">Sign Up</h1>
            <x-alert/>
            <form 
            method="POST" 
            action={{ route('register') }}
            class="flex flex-col gap-4">
                @csrf
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#8E39D3" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                    <input 
                    type="text" 
                    name="name"
                    placeholder="Name"
                    value="{{old('name')}}"
                    class="input grow border-none focus:border-none  focus:outline-0 focus:outline-offset-0" 
                    required/>
                </label>
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
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#8E39D3" class="bi bi-key" viewBox="0 0 16 16">
                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    <input 
                    type="password" 
                    name="password"
                    placeholder="Password"
                    value="{{old('password')}}"
                    class="input grow border-none focus:border-none  focus:outline-0 focus:outline-offset-0" 
                    required/>
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#8E39D3" class="bi bi-key" viewBox="0 0 16 16">
                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    <input 
                    type="password" 
                    name="password_confirmation" 
                    placeholder="Password Confirmation"
                    value="{{old('password_confirmation')}}"
                    class="input grow border-none focus:border-none  focus:outline-0 focus:outline-offset-0" 
                    required/>
                </label>
                <button
                type="submit"
                class="btn btn-primary">
                    Sign Up
                </button>
            </form>
            <a href={{ url('auth/redirect') }} class="btn mt-4 w-full">
                <figure class="aspect-square overflow-hidden h-[24px] my-0 py-0">
                    <img 
                    src={{ asset('assets/images/google-logo.png') }} 
                    alt=""
                    class="w-full h-full object-cover object-center ">
                </figure>
                Masuk / Daftar
            </a>
            <p class="text-center">Sudah memiliki akun? <a href={{ url('/auth/login') }} class="link">Sign In</a></p>
        </div>
    </section>
</body>
</html>