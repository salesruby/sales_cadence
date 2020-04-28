<?php

namespace App\Console\Commands;

use App\LeadSmsCadence;
use App\SmsCadence;
use App\SmsTemplate;
use Carbon\Carbon;

class SMSLeads extends SMS
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:leads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = date('Y-m-d H:i', strtotime(Carbon::now()->addHour()));
        $smsCadence = SmsCadence::where([
            ['date', '<', $now],
            ['delivered', 0],
        ])->get();
        if ($smsCadence !== null) {
            foreach($smsCadence as $cadence) {
                $template = SmsTemplate::findorfail($cadence->sms_template_id);
                $leads = LeadSmsCadence::where('sms_cadence_id', $cadence->id)->get();
                foreach($leads as $lead){
                    $leadName = $lead['lead']->first_name . ' ' . $lead['lead']->last_name;
                    $message = str_replace('[name]', $leadName, $template->message);
                    $this->send($lead['lead']->phone, $message);
                }
//                $cadence->update(['delivered' => 1]);
            }
        }
    }
}
