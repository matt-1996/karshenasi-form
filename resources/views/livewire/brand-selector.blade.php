
@script
<script>
    console.log('loaded')
    document.addEventListener('livewire:init', () => {

        function initDatePicker() {

            let input = $('#delivery_date_picker');

            if (!input.length) return;

            // Prevent double init
            if (input.data('datepicker')) {
                input.data('datepicker').destroy();
            }

            input.persianDatepicker({
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: true,
                minDate: new persianDate().valueOf(),
                calendar: {
                    persian: { locale: 'fa', leapYearMode: 'astronomical'}
                },
                onSelect: function(unix) {
                    let date = new persianDate(unix).format('YYYY/MM/DD');

                    input.val(date);

                    // Trigger Livewire update
                    input[0].dispatchEvent(new Event('input'));
                    @this.set('delivery_date', date);
                }
            });
        }

        initDatePicker();

        Livewire.hook('morph.updated', () => {
            initDatePicker();
        });

    });
</script>
@endscript
<div class="apple-wrapper">

    @if($step === 1)
    <div class="apple-card">

        <h2 class="apple-title">انتخاب دستگاه</h2>

        {{-- Brand --}}
        <div class="apple-field">
            <label>برند</label>
            <div class="select-wrapper">
                <select wire:model.live="brand" class="apple-select">
                    <option value="1" >انتخاب برند</option>
                @foreach($brands as $brand)
                        <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                    @endforeach

                </select>
                <div wire:loading wire:target="brand" class="spinner"></div>
            </div>
        </div>

        {{-- Model --}}
        @if($models)
            <div class="apple-field fade-in">
                <label>مدل</label>
                <div class="select-wrapper">
                    <select wire:model.live="model" class="apple-select">
                        <option value="1">انتخاب مدل</option>
                        @foreach($models as $model)
                            <option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
                        @endforeach
                    </select>
                    <div wire:loading wire:target="model" class="spinner"></div>
                </div>
            </div>
        @endif

        @if($price)
            <div class="price-box fade-in">
                <span class="price-label">قیمت</span>
                <span class="price-value"
                      id="price"
                      data-price="{{ $price }}"> {{ number_format($price) }} </span>
                <span class="currency">&nbsp;   تومان </span>
            </div>

            <!-- Continue Button -->
            <button wire:click="goToUserForm" class="apple-button mt-4">
                ادامه
            </button>
        @endif
    </div>
    @endif



    @if($step === 2)

        <div class="apple-card fade-in">

            <div class="back-wrapper">
                <button wire:click="goBack" class="back-button">
                    ← بازگشت
                </button>
            </div>


            <h2 class="apple-title">اطلاعات شما</h2>

            <div class="apple-field">
                <label>نام و نام خانوادگی</label>
                <input type="text" wire:model="name" class="apple-input">
            </div>

            <div class="apple-field">
                <label>شماره موبایل</label>
                <input type="text" wire:model="phone" class="apple-input">
            </div>

            <div class="apple-field">
                <label>محله</label>
                <select wire:model="neighborhood" class="apple-select">
                    <option value="">انتخاب محله</option>
                    @foreach($neighborhoods as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>


            <div class="apple-field">
                <label>آدرس کامل</label>
                <textarea wire:model="address" class="apple-textarea"></textarea>
            </div>

            <div class="apple-field" wire:ignore>
                <label>تاریخ تحویل</label>
                <input
                        type="text"
                        id="delivery_date_picker"
                        class="apple-input"
                        wire:model="delivery_date"
                >
            </div>

            <button wire:click="submitOrder" class="apple-button">
                ثبت سفارش
            </button>

        </div>

    @endif




</div>
