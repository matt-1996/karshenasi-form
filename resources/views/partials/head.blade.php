<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/persianDatePicker/persian-datepicker.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/persianDatepicker/persianDate.min.js') }}"></script>
<script src="{{ asset('js/persianDatepicker/persianDatePicker.min.js') }}"></script>


<script>
    document.addEventListener('livewire:init', () => {

        console.log('livewire init')

        function initDatePicker() {

            let input = $('#delivery_date_picker');

            if (!input.length) return;

            // Prevent multiple initializations
            if (input.data('datepicker')) {
                input.data('datepicker').destroy();
            }

            input.persianDatepicker({
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: false,
                minDate: new persianDate().valueOf(),
                calendar: {
                    persian: { locale: 'fa' }
                },
                onSelect: function(unix) {

                    let date = new persianDate(unix).format('YYYY/MM/DD');

                    input.val(date);

                    // Sync with Livewire safely
                    input[0].dispatchEvent(new Event('input', { bubbles: true }));

                }
            });

        }

        // First load
        initDatePicker();

        // Re-init after Livewire updates DOM
        Livewire.hook('morph.updated', () => {
            initDatePicker();
        });

    });
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
