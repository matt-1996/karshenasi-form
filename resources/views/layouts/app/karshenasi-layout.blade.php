<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'فرم اطلاعات' }}</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Persian Datepicker CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@latest/dist/css/persian-datepicker.min.css">

    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: #f5f6fa;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,.05);
        }

        .apple-input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid #ddd;
            background: #fff;
            transition: .2s;
        }

        .apple-input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 3px rgba(99,102,241,.15);
        }

        .btn-primary {
            background: #6366f1;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #4f46e5;
        }

        .toast {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #ef4444;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0,0,0,.1);
            display: none;
            z-index: 9999;
        }
    </style>

    @livewireStyles
</head>

<body>

<div class="container" style="max-width:600px; margin:50px auto;">
    <div class="card">
        {{ $slot }}
    </div>
</div>

{{-- Toast --}}
<div id="toast" class="toast"></div>

@livewireScripts

{{-- Required JS Order --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-date@latest/dist/persian-date.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>

<script>
    document.addEventListener('livewire:init', () => {

        // Toast Listener
        Livewire.on('toast', message => {
            let toast = document.getElementById('toast');
            toast.innerText = message;
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        });

    });
</script>

</body>
</html>
