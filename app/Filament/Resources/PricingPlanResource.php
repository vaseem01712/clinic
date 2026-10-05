<?php
namespace App\Filament\Resources;

use App\Models\PricingPlan;
use Filament\Forms; use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; use Filament\Tables\Table;

class PricingPlanResource extends Resource
{
    protected static ?string $model = PricingPlan::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('price')->numeric()->required(),
            Forms\Components\TextInput::make('billing_period')->default('month'),
            Forms\Components\TagsInput::make('features')->columnSpanFull(),
            Forms\Components\Toggle::make('is_recommended'),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('price')->money('inr'),
            Tables\Columns\IconColumn::make('is_recommended')->boolean(),
        ])->defaultSort('sort_order')
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PricingPlanResource\Pages\ListPricingPlans::route('/'),
            'create' => \App\Filament\Resources\PricingPlanResource\Pages\CreatePricingPlan::route('/create'),
            'edit' => \App\Filament\Resources\PricingPlanResource\Pages\EditPricingPlan::route('/{record}/edit'),
        ];
    }
}
