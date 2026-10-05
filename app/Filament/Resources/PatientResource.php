<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Table;

class PatientResource extends Resource
{
    protected static ?string $model=User::class;
    protected static ?string $navigationIcon='heroicon-o-users';
    protected static ?string $navigationGroup='Clinic Management';
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder { return parent::getEloquentQuery()->where('role','patient'); }

    public static function form(Forms\Form $form): Forms\Form {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord:true),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\TextInput::make('password')->password()->minLength(10)->dehydrateStateUsing(fn($state)=>$state?Hash::make($state):null)->dehydrated(fn($state)=>filled($state)),
        ]);
    }
    public static function table(Table $table): Table {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('appointments_count')->counts('appointments')->label('Appointments'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])->actions([Tables\Actions\EditAction::make()])->defaultSort('created_at','desc');
    }
    public static function getPages(): array {
        return ['index'=>Pages\ListPatients::route('/'),'edit'=>Pages\EditPatient::route('/{record}/edit')];
    }
}
