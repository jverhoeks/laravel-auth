<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\EmailTemplate;
use Auth;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        //Grab uploaded file
        // $attach = $request->file('file');

        //Mail::queue('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($attach)

        $data = [
             'title'         => $title,
             'content'       => $content,
         ];

        //       Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($attach)
        Mail::send('emails.send', $data, function ($message) {
            $message->from('zamwan@gmail.com', 'Jacob Server');

            $message->to('jacob.verhoeks@gmail.com');

            //Attach file
            // $message->attach($attach);

            //Add a subject
            $message->subject("Hello from Application");
        });
        return view('emails.send')->with($data);
    }



    public function send2(Request $request)
    {

        $user = $request->user();

        $template = EmailTemplate::where('name', 'welcome-email')->first();

        Mail::send([], [], function ($message) use ($template, $user) {
            $data = [
              'firstname' => $user->email
          ];

            $message->to($user->email, $user->email)
              ->subject($template->subject)
              ->setBody($template->parse($data));
        });

          return view($template)->with($data);
    }
}
