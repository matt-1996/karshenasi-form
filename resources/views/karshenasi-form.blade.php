<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>

    <title>کارشناسی گوشی کارکرده</title>
    @include('partials.head')


</head>
<style>
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        background: #f5f5f7;
        direction: rtl;
    }

    .apple-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .apple-card {
        background: white;
        padding: 50px 40px;
        width: 100%;
        max-width: 420px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        text-align: right;
    }

    .apple-title {
        text-align: center;
        margin-bottom: 35px;
        font-weight: 600;
        font-size: 22px;
        color: #1d1d1f;
    }

    .apple-field {
        margin-bottom: 25px;
    }

    .apple-field label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        color: #6e6e73;
        font-weight: 500;
    }

    .select-wrapper {
        position: relative;
    }

    .apple-select {
        width: 100%;
        padding: 14px 16px;
        border-radius: 14px;
        border: 1px solid #d2d2d7;
        background: #fafafa;
        font-size: 15px;
        color: #1d1d1f;
        outline: none;
        transition: all 0.25s ease;
        appearance: none;
    }

    .apple-select:focus {
        background: white;
        border-color: #0071e3;
        box-shadow: 0 0 0 4px rgba(0, 113, 227, 0.15);
    }

    .spinner {
        position: absolute;
        left: 14px;
        top: 50%;
        width: 16px;
        height: 16px;
        margin-top: -8px;
        border: 2px solid #ccc;
        border-top: 2px solid #0071e3;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .fade-in {
        animation: fadeIn 0.3s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .price-box {
        margin-top: 20px;
        padding: 18px;
        border-radius: 16px;
        background: linear-gradient(135deg, #0071e3, #42a1ec);
        color: white;
        display: flex;
        /*flex-direction: row-reverse; !* RTL: reverse order *!*/
        /*justify-content: flex-end; !* start = right in RTL *!*/
        align-items: center;
        font-size: 15px;
        box-shadow: 0 10px 25px rgba(0, 113, 227, 0.25);
        direction: rtl; /* force text direction inside */
    }

    .price-label {
        opacity: 0.85;
        margin-left: 10px; /* space between label and value */
        margin-right: 0;
    }

    .price-value {
        font-size: 20px;
        font-weight: 600;
    }

    .currency {
        margin-left: 6px; /* space between value and currency */
        margin-right: 0;
    }


    /*body {*/
    /*    direction: rtl;*/
    /*    background: #f5f7fa;*/
    /*    font-family: -apple-system, BlinkMacSystemFont, sans-serif;*/
    /*}*/

    .apple-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        max-width: 500px;
        margin: 40px auto;
        transition: all 0.4s ease;
    }

    .apple-title {
        font-size: 22px;
        margin-bottom: 30px;
        color: #1d1d1f;
    }

    .apple-field {
        margin-bottom: 20px;
    }

    .apple-field label {
        display: block;
        font-size: 14px;
        margin-bottom: 8px;
        color: #6e6e73;
    }

    .apple-input,
    .apple-select,
    .apple-textarea {
        width: 100%;
        padding: 14px 16px;
        border-radius: 14px;
        border: 1px solid #e0e0e0;
        background: #f9fafc;
        font-size: 14px;
        transition: 0.3s ease;
    }

    .apple-input:focus,
    .apple-select:focus,
    .apple-textarea:focus {
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 0 3px rgba(0,113,227,0.15);
        background: #fff;
    }

    .apple-textarea {
        min-height: 100px;
        resize: none;
    }

    .apple-button {
        width: 100%;
        padding: 14px;
        border-radius: 18px;
        border: none;
        background: linear-gradient(135deg, #0071e3, #0051a8);
        color: white;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .apple-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,113,227,0.3);
    }

    .success-message {
        margin-top: 20px;
        padding: 12px;
        background: #e6f4ff;
        border-radius: 12px;
        color: #0071e3;
        text-align: center;
    }

    .hidden-section {
        opacity: 0;
        transform: translateY(40px);
    }

    .show-section {
        opacity: 1;
        transform: translateY(0);
        transition: all 0.6s ease;
    }

    .fade-in {
        animation: fadeInUp 0.4s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-wrapper {
        margin-bottom: 20px;
    }

    .back-button {
        background: transparent;
        border: none;
        color: #0071e3;
        font-size: 14px;
        cursor: pointer;
        padding: 0;
        transition: 0.2s ease;
    }

    .back-button:hover {
        opacity: 0.7;
        transform: translateX(-4px);
    }

    .back-button:hover {
        transform: translateX(4px);
    }


    .relative {
        position: relative;
    }

    .apple-input {
        width: 100%;
        padding: 14px 16px;
        border-radius: 14px;
        border: 1px solid #e0e0e0;
        background: #f9fafc;
        font-size: 14px;
        direction: rtl;
        margin-bottom: 4px;

        /* NEW: set visible text color */
        color: #1d1d1f;        /* dark text */
        caret-color: #0071e3;  /* cursor color matches Apple style */
    }

    .apple-input::placeholder {
        color: #6e6e73;
        opacity: 1; /* some browsers make it very faint otherwise */
    }

    .apple-input:focus {
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 0 3px rgba(0,113,227,0.15);
        background: #fff;  /* brighter background on focus */
    }


    .dropdown-box {
        max-height: 180px;
        overflow-y: auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        margin-top: 4px;
        z-index: 50;
    }

    .dropdown-item {
        padding: 10px 12px;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .dropdown-item:hover,
    .dropdown-item.selected {
        background: rgba(0,113,227,0.08);
    }

    .selected-info {
        margin-top: 6px;
        font-size: 13px;
        color: #0071e3;
    }

    .toast {
        min-width: 220px;
        margin-bottom: 10px;
        padding: 12px 16px;
        border-radius: 14px;
        color: white;
        font-size: 14px;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        direction: rtl;
    }

    .toast.show {
        opacity: 1;
        transform: translateX(0);
    }

    .toast.success {
        background: #0071e3;
    }

    .toast.error {
        background: #ff3b30;
    }



</style>


<body class="min-h-screen bg-white dark:bg-zinc-800">
{{--@livewireStyles--}}
{{--@livewireScripts--}}
<livewire:brand-selector />


{{--<div id="toast-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>--}}
{{--<script>--}}
{{--    document.addEventListener('livewire:load', function () {--}}

{{--        // success toast from dispatchBrowserEvent--}}
{{--        window.addEventListener('toast', event => {--}}
{{--            const { type, message } = event.detail;--}}
{{--            showToast(type, message);--}}
{{--        });--}}

{{--        // Livewire validation errors--}}
{{--        @if ($errors->any())--}}
{{--        @foreach ($errors->all() as $error)--}}
{{--        showToast('error', '{{ $error }}');--}}
{{--        @endforeach--}}
{{--        @endif--}}

{{--        function showToast(type, message) {--}}
{{--            const container = document.getElementById('toast-container');--}}

{{--            const toast = document.createElement('div');--}}
{{--            toast.innerText = message;--}}
{{--            toast.className = `toast ${type}`;--}}
{{--            container.appendChild(toast);--}}

{{--            setTimeout(() => {--}}
{{--                toast.classList.add('show');--}}
{{--            }, 50);--}}

{{--            setTimeout(() => {--}}
{{--                toast.classList.remove('show');--}}
{{--                setTimeout(() => container.removeChild(toast), 300);--}}
{{--            }, 3000);--}}
{{--        }--}}

{{--    });--}}
{{--</script>--}}

{{--@livewireScripts--}}




{{--<script>--}}
{{--    console.log('loaded')--}}
{{--    document.addEventListener('livewire:init', () => {--}}

{{--        function initDatePicker() {--}}

{{--            let input = $('#delivery_date_picker');--}}

{{--            if (!input.length) return;--}}

{{--            // Prevent double init--}}
{{--            if (input.data('datepicker')) {--}}
{{--                input.data('datepicker').destroy();--}}
{{--            }--}}

{{--            input.persianDatepicker({--}}
{{--                format: 'YYYY/MM/DD',--}}
{{--                autoClose: true,--}}
{{--                initialValue: true,--}}
{{--                minDate: new persianDate().valueOf(),--}}
{{--                calendar: {--}}
{{--                    persian: { locale: 'fa' }--}}
{{--                },--}}
{{--                onSelect: function(unix) {--}}
{{--                    let date = new persianDate(unix).format('YYYY/MM/DD');--}}

{{--                    input.val(date);--}}

{{--                    // Trigger Livewire update--}}
{{--                    input[0].dispatchEvent(new Event('input'));--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        initDatePicker();--}}

{{--        Livewire.hook('morph.updated', () => {--}}
{{--            initDatePicker();--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}



</body>
</html>