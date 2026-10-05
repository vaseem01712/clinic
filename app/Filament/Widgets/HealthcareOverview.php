<?php
namespace App\Filament\Widgets;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalReport;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HealthcareOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Patients', User::where('role','patient')->count())->icon('heroicon-o-users')->color('primary'),
            Stat::make('Doctors', Doctor::where('is_active',true)->count())->icon('heroicon-o-user-group')->color('success'),
            Stat::make("Today's appointments", Appointment::whereDate('appointment_date',today())->whereNot('status','cancelled')->count())->icon('heroicon-o-calendar-days'),
            Stat::make('Upcoming', Appointment::whereDate('appointment_date','>=',today())->whereNot('status','cancelled')->count())->icon('heroicon-o-clock'),
            Stat::make('Pending', Appointment::where('status','pending')->count())->icon('heroicon-o-hourglass'),
            Stat::make('Reports', MedicalReport::count())->icon('heroicon-o-document-text')->color('info'),
        ];
    }
}
