<?php

namespace App\Http\Controllers;
use App\Mail\ContractSendEmail;


use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index(){
        $whenToDispatch = now()->addSeconds(5);
        dispatch(new ContractSendEmail('hello there'))->delay($whenToDispatch);

        // $data=['name'=>'mohsin'];
        //  $mail=Mail::send('welcome', $data, function($message) {
        //     $message->to('mohsinshaikh1104@gmail.com', 'sahil sk')->subject
        //       ('Estimate Comaprison Test');
        //    $message->from('sahil11041995@gmail.com','Mohsin sk');
        // });
        echo json_encode($mail);
    }
}
