<?php
namespace App\Filament\Resources;

use App\Models\Testimonial;
use Filament\Forms; use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('patient_name')->required(),
            Forms\Components\FileUpload::make('patient_image')->image()->directory('testimonials'),
            Forms\Components\TextInput::make('rating')->numeric()->minValue(1)->maxValue(5)->required(),
            Forms\Components\Textarea::make('review')->required()->columnSpanFull(),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('patient_name'),
            Tables\Columns\TextColumn::make('rating'),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\TestimonialResource\Pages\ListTestimonials::route('/'),
            'create' => \App\Filament\Resources\TestimonialResource\Pages\CreateTestimonial::route('/create'),
            'edit' => \App\Filament\Resources\TestimonialResource\Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
