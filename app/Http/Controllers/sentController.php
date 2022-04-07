<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use TelegramBot\Api\Types\InputMedia\InputMediaPhoto;

class sentController extends Controller
{
    public function sent(){
        return view('form');
    }
    public function submit(Request $req){
        // onw way-----------------------------
        // $text = "hello \n"."hi\n";
        // $bot = new \TelegramBot\Api\BotApi(env('TELEGRAM_BOT_TOKEN',''));
        // $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
        // $media->addItem(new InputMediaPhoto('https://media.istockphoto.com/photos/aspara-dancers-at-angkor-wat-picture-id500361595?b=1&k=20&m=500361595&s=170667a&w=0&h=gczJBPc_7DQzmHGC95ORj3bDFIkpfZZKG-YuduDLLFI=',$text, 'HTML'));
        // $bot->sendMediaGroup(env('TELEGRAM_CHAT_ID',''), $media);
        

        // another way-----------------------------
        $img =InputFile::create('https://media.istockphoto.com/photos/aspara-dancers-at-angkor-wat-picture-id500361595?b=1&k=20&m=500361595&s=170667a&w=0&h=gczJBPc_7DQzmHGC95ORj3bDFIkpfZZKG-YuduDLLFI=');
        $photo = $req->name;
        $content = [
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'photo' => $img,
            'caption'=>'tes',
            'parse_mode' => 'HTML',
            'text' =>'<p>Hello Test telegram</p>' ,
            
        ];
        Telegram::sendPhoto($content);
    }
}
