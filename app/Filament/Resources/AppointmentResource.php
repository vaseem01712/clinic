<?php
namespace App\Filament\Resources;

use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Clinic Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('doctor_id')->relationship('doctor', 'name')->required(),
            Forms\Components\Select::make('specialty_id')->relationship('specialty', 'name'),
            Forms\Components\Select::make('service_id')->relationship('service', 'title'),
            Forms\Components\DatePicker::make('appointment_date')->required(),
            Forms\Components\TimePicker::make('appointment_time')->required(),
            Forms\Components\TextInput::make('patient_name')->required(),
            Forms\Components\TextInput::make('patient_email')->email()->required(),
            Forms\Components\TextInput::make('patient_phone'),
            Forms\Components\Textarea::make('message')->columnSpanFull(),
            Forms\Components\Select::make('status')->options([
                'pending' => 'Pending', 'confirmed' => 'Confirmed',
                'completed' => 'Completed', 'cancelled' => 'Cancelled',
            ])->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('patient_name')->searchable(),
            Tables\Columns\TextColumn::make('doctor.name')->searchable(),
            Tables\Columns\TextColumn::make('specialty.name'),
            Tables\Columns\TextColumn::make('appointment_date')->date(),
            Tables\Columns\TextColumn::make('appointment_time'),
            Tables\Columns\SelectColumn::make('status')->options([
                'pending' => 'Pending', 'confirmed' => 'Confirmed',
                'completed' => 'Completed', 'cancelled' => 'Cancelled',
            ]),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->since(),
        ])->filters([
            Tables\Filters\SelectFilter::make('status')->options([
                'pending' => 'Pending', 'confirmed' => 'Confirmed',
                'completed' => 'Completed', 'cancelled' => 'Cancelled',
            ]),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([Tables\Actions\DeleteBulkAction::make()])
        ->defaultSort('appointment_date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\AppointmentResource\Pages\ListAppointments::route('/'),
            'create' => \App\Filament\Resources\AppointmentResource\Pages\CreateAppointment::route('/create'),
            'edit' => \App\Filament\Resources\AppointmentResource\Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
