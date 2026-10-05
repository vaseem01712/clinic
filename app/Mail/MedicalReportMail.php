<?php
namespace App\Mail;

use App\Models\MedicalReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MedicalReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public MedicalReport $report, public string $dashboardUrl) {}
    public function build(): self
    {
        return $this->subject('A new medical report is available — MediCare')
            ->view('emails.medical-report');
    }
}
