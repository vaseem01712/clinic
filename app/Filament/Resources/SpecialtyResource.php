<?php
namespace App\Filament\Resources;

use App\Models\Specialty;
use Filament\Forms; use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; use Filament\Tables\Table;
use Illuminate\Support\Str;

class SpecialtyResource extends Resource
{
    protected static ?string $model = Specialty::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Clinic Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state).'-'.Str::random(4))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('icon'),
            Forms\Components\Textarea::make('description')->columnSpanFull(),
            Forms\Components\FileUpload::make('image')->image()->directory('specialties'),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('doctors_count')->counts('doctors')->label('Doctors'),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\SpecialtyResource\Pages\ListSpecialties::route('/'),
            'create' => \App\Filament\Resources\SpecialtyResource\Pages\CreateSpecialty::route('/create'),
            'edit' => \App\Filament\Resources\SpecialtyResource\Pages\EditSpecialty::route('/{record}/edit'),
        ];
    }
}
