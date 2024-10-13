<?php

namespace App\Console\Commands;

use App\Functions\WhatsApp;
use Illuminate\Console\Command;

use Modules\Notification\Entities\Model as Notification;
use Modules\Client\Entities\Model as Client;
use App\Functions\PushNotification;

class Notifications extends Command
{
    protected $signature = 'notifications';

    protected $description = 'Send pending notifications';

    public function handle()
    {
        $Notifications = Notification::where('done',0)->take(10)->get();
        foreach($Notifications as $Notification){
            $lang = Client::where('id',$Notification->client_id)->select('lang')->value('lang') ?? 'en';
            if($Notification->type == 'public'){
                PushNotification::send($lang == 'ar' ? $Notification->title_ar : $Notification->title_en ,['type' => 'public'],$Notification->client_id);
            }elseif($Notification->type == 'product'){
                PushNotification::send($lang == 'ar' ? $Notification->title_ar : $Notification->title_en ,['type' => 'product','product_id' => $Notification->product_id ],$Notification->client_id);
            }elseif($Notification->type == 'order'){
                PushNotification::send($lang == 'ar' ? $Notification->title_ar : $Notification->title_en ,['type' => 'order','order_id' => $Notification->order_id ],$Notification->client_id);
            }
            Notification::where('id',$Notification->id)->update([
                'done' => 1    
            ]);
        }
    }
}
