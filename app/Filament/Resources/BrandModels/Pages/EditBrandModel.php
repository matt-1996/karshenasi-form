<?php

namespace App\Filament\Resources\BrandModels\Pages;

use App\Filament\Resources\BrandModels\BrandModelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBrandModel extends EditRecord
{
    protected static string $resource = BrandModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
