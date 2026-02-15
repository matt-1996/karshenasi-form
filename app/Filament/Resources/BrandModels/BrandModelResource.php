<?php

namespace App\Filament\Resources\BrandModels;

use App\Filament\Resources\BrandModels\Pages\CreateBrandModel;
use App\Filament\Resources\BrandModels\Pages\EditBrandModel;
use App\Filament\Resources\BrandModels\Pages\ListBrandModels;
use App\Filament\Resources\BrandModels\Schemas\BrandModelForm;
use App\Filament\Resources\BrandModels\Tables\BrandModelsTable;
use App\Models\Brand;
use App\Models\BrandModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandModelResource extends Resource
{
    protected static ?string $model = BrandModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BrandModelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BrandModelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
//            Brand::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBrandModels::route('/'),
            'create' => CreateBrandModel::route('/create'),
            'edit' => EditBrandModel::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
