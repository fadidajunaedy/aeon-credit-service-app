<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/aeon-logo.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/aeon-logo.png')}}"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="drawer drawer-mobile lg:drawer-open p-0">
        <input id="drawer-toggle" type="checkbox" class="drawer-toggle" />
        <x-header-admin/>
        <x-modal-confirmation-sign-out/>
        <div class="drawer-content overflow-x-hidden bg-base-200 pt-[10vh]">
            <div class="px-6 py-6 min-h-[90vh] overflow-x-hidden prose-sm">
                @yield('content')
            </div>
        </div> 
        <x-sidebar-admin/>
    </div>
    <script src="https://cdn.tiny.cloud/1/sagtnsssi24t3vubuov73yk650dgw0mpb2fheatctiq8f5ul/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
</body>
</html>