<?php

namespace App\Filament\Resources\BrandModels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BrandModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('year')
                    ->numeric()
                    ->required(),
                TextInput::make('karshenasi_price')
                    ->numeric()
                    ->required(),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required()
                    ->searchable(),
            ]);
    }
}
