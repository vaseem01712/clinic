<?php
namespace App\Filament\Resources;
use App\Filament\Resources\MedicalReportResource\Pages;
use App\Models\MedicalReport;
use Filament\Resources\Resource;
use Filament\Tables;

class MedicalReportResource extends Resource
{
    protected static ?string $model=MedicalReport::class;
    protected static ?string $navigationIcon='heroicon-o-document-text';
    protected static ?string $navigationGroup='Clinic Management';
    public static function table(Tables\Table $table): Tables\Table {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('patient.name')->label('Patient')->searchable(),
            Tables\Columns\TextColumn::make('doctor.name')->label('Doctor')->searchable(),
            Tables\Columns\TextColumn::make('test_type'),
            Tables\Columns\TextColumn::make('report_date')->date()->sortable(),
            Tables\Columns\TextColumn::make('status')->badge(),
        ])->actions([Tables\Actions\Action::make('download')->label('Secure Download')->icon('heroicon-o-arrow-down-tray')->url(fn($record)=>route('medical-reports.download',$record))->openUrlInNewTab()])->filters([Tables\Filters\SelectFilter::make('status')->options(['draft'=>'Draft','sent'=>'Sent'])])->defaultSort('report_date','desc');
    }
    public static function getPages(): array { return ['index'=>Pages\ListMedicalReports::route('/')]; }
}
