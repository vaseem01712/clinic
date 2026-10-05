<?php
namespace App\Filament\Resources;

use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use App\Services\AccountAccessService;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Clinic Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('specialty_id')->relationship('specialty', 'name')->required(),
            Forms\Components\TextInput::make('department'),
            Forms\Components\TextInput::make('name')->required()->live(onBlur: true)
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state).'-'.Str::random(4))),
            Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\FileUpload::make('photo')->image()->directory('doctors'),
            Forms\Components\TextInput::make('experience_years')->numeric()->required(),
            Forms\Components\TextInput::make('education')->label('Qualification'),
            Forms\Components\TextInput::make('license_registration')->label('Registration / License'),
            Forms\Components\Textarea::make('biography')->columnSpanFull(),
            Forms\Components\TagsInput::make('certifications'),
            Forms\Components\TagsInput::make('languages'),
            Forms\Components\TextInput::make('consultation_fee')->numeric()->prefix('₹'),
            Forms\Components\TextInput::make('rating')->numeric()->minValue(0)->maxValue(5),
            Forms\Components\TextInput::make('location'),
            Forms\Components\Toggle::make('is_active')->default(true),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name')->label('Doctor'),
            TextEntry::make('email'),
            TextEntry::make('phone'),
            TextEntry::make('specialty.name')->label('Specialization'),
            TextEntry::make('department'),
            TextEntry::make('education')->label('Qualification'),
            TextEntry::make('license_registration')->label('Registration / License'),
            TextEntry::make('experience_years')->suffix(' years'),
            TextEntry::make('location'),
            TextEntry::make('is_active')->badge(),
            TextEntry::make('biography')->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('photo')->circular(),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('specialty.name')->badge(),
            Tables\Columns\TextColumn::make('experience_years')->label('Exp (yrs)'),
            Tables\Columns\TextColumn::make('rating'),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->filters([
            Tables\Filters\SelectFilter::make('specialty_id')->relationship('specialty', 'name'),
            Tables\Filters\TernaryFilter::make('is_active'),
        ])->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\Action::make('resetPassword')
                ->label('Send Password Link')->icon('heroicon-o-key')
                ->requiresConfirmation()
                ->action(function (Doctor $record) {
                    if ($record->user) {
                        app(AccountAccessService::class)->sendReset($record->user, 'Doctor Portal');
                        Notification::make()->title('Password setup link sent')->success()->send();
                    }
                }),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([Tables\Actions\DeleteBulkAction::make()])
        ->defaultSort('name');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\DoctorResource\Pages\ListDoctors::route('/'),
            'view' => \App\Filament\Resources\DoctorResource\Pages\ViewDoctor::route('/{record}'),
            'create' => \App\Filament\Resources\DoctorResource\Pages\CreateDoctor::route('/create'),
            'edit' => \App\Filament\Resources\DoctorResource\Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
