<?php

namespace App\Livewire;

use App\Helpers\DateHelpers;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Neighborhood;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Morilog\Jalali\Jalalian;


class BrandSelector extends Component
{
    public $brands = [];
    public $brand = '';
    public $model = '';
    public $models = [];
    public $price = null;

    public $name = '';
    public $phone = '';
    public $neighborhood = '';
    public $city = '';
    public $address = '';
    public $step = 1;
    public $neighborhoodSearch = '';
    public $neighborhoods = [];
    public $delivery_date = '';

    public function __construct()
    {
        Neighborhood::all()->map(function (Neighborhood $neighborhood) {
            $this->neighborhoods[$neighborhood->id] = $neighborhood->name;
        });
        $this->delivery_date = Jalalian::now()->format('Y/m/d');

    }

    public $cities = [];

    protected $listeners = ['setDate'];

    public function setDate($payload)
    {
        $this->delivery_date = $payload['date'];
    }


    public function mount()
    {
        $this->delivery_date = Jalalian::now()->format('Y/m/d');
    }



    public function updatedBrand(int $value)
    {
        $this->model = '';
        $this->price = null;
        $this->brands = [];
        $this->models = [];
//        $this->brand = Brand::find($value)->name;
          Cache::remember("model_$value", 3600, function() use ($value) {
              BrandModel::query()->where('brand_id', $value)->get()->map(function (BrandModel $model) {
                  $this->models[] = ['id' => $model->id, 'name' => $model->name];
              });
          });
    }

    public function updatedModel(int $value)
    {
        $this->price = Cache::remember("karshenasi_price_$value", 3600, function () use ($value) {
            return BrandModel::query()->find($value)->karshenasi_price;
        });
        $this->dispatch('priceUpdated', $this->price);
    }

    public function updatedProvince($value)
    {
        $this->city = '';

        if ($value === 'tehran') {
            $this->cities = [
                'tehran_city' => 'تهران',
                'karaj' => 'کرج',
            ];
        } elseif ($value === 'isfahan') {
            $this->cities = [
                'isfahan_city' => 'اصفهان',
                'kashan' => 'کاشان',
            ];
        } elseif ($value === 'fars') {
            $this->cities = [
                'shiraz' => 'شیراز',
                'marvdasht' => 'مرودشت',
            ];
        } else {
            $this->cities = [];
        }
    }

    public function submitOrder()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:10',
            'neighborhood' => 'required',
            'address' => 'required|min:10',
            'delivery_date' => 'required',
        ]);
        $date = explode('/', $this->delivery_date);
        $gregorianDate = implode('-' ,DateHelpers::jalaliToGregorian($date[0], $date[1], $date[2])) ;
//        dd(DateHelpers::gregorianToJalali(Carbon::make($gregorianDate)));

        // You can store in DB here

        session()->flash('success', 'سفارش شما با موفقیت ثبت شد ✨');
    }

    public function goToUserForm()
    {
        $this->step = 2;
        $this->dispatch('step2Loaded', 1);
    }

    public function goBack()
    {
        $this->step = 1;
    }

    public function getFilteredNeighborhoodsProperty()
    {
        if (!$this->neighborhoodSearch) {
            return $this->neighborhoods;
        }

        return collect($this->neighborhoods)
            ->filter(fn($label) => mb_stripos($label, $this->neighborhoodSearch) !== false)
            ->toArray();
    }

    public function render()
    {
        $this->brands = [];
        Cache::remember('brands', 3600, function () {
             Brand::all()->map(function ($brand) {
                $this->brands[] = ['id' => $brand->id, 'name' => $brand->name];
            });
        });

        return view('livewire.brand-selector', ['brands' => $this->brands])
            ->layout('layouts.karshenasi-layout');
    }
}
