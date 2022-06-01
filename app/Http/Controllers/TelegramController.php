<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;

use Telegram\Bot\Laravel\Facades\Telegram;


class TelegramController extends Controller
{

    // give Updates from Bot
    public function updatedActivity(){
        $activity = Telegram::getUpdates();
        dd($activity);
    } // End Method


    public function sendMessage(){
        return view('telegramView');
    } // End Method


    public function storeMessage(Request $request){

        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        // $text = "<b>Name: </b>\n" . $request->name . "\n" . "<b>Message: </b>\n" . $request->message;
        $text =  "<b>Name: </b>\n" . "$request->name\n" . "<b>Message: </b>\n" . $request->message;

        Telegram::sendMessage([
            'chat_id' => '-1001778709092',
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect()->back()->with('statusMessage','Message Inserted To Telegram SuccessFuly');
    } // End Method



    public function storePhoto(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:jpeg,png,gif'
        ]);

        $photo = $request->file('file');

        Telegram::sendPhoto([
            'chat_id' => '-1001778709092',
            'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), hexdec(10) . '.' . $photo->getClientOriginalExtension()),
            'caption' => 'Photo Image'
        ]);

        return redirect()->back()->with('statusPhoto','Photo Inserted To Telegram SuccessFuly');
    }


}