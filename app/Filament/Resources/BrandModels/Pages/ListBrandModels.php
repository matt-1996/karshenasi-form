<?php

namespace App\Filament\Resources\BrandModels\Pages;

use App\Filament\Resources\BrandModels\BrandModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBrandModels extends ListRecords
{
    protected static string $resource = BrandModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
