<?php
namespace App\Filament\Resources;

use App\Models\Service;
use Filament\Forms; use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Clinic Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('specialty_id')->relationship('specialty', 'name'),
            Forms\Components\TextInput::make('title')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state).'-'.Str::random(4))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('icon'),
            Forms\Components\FileUpload::make('image')->image()->directory('services'),
            Forms\Components\Textarea::make('short_description'),
            Forms\Components\RichEditor::make('description')->columnSpanFull(),
            Forms\Components\TextInput::make('price')->numeric()->prefix('₹'),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('specialty.name'),
            Tables\Columns\TextColumn::make('price')->money('inr'),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ServiceResource\Pages\ListServices::route('/'),
            'create' => \App\Filament\Resources\ServiceResource\Pages\CreateService::route('/create'),
            'edit' => \App\Filament\Resources\ServiceResource\Pages\EditService::route('/{record}/edit'),
        ];
    }
}
