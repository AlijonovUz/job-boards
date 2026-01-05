<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Jobs\SendMailJob;
use App\Models\Mail;

class MailController extends Controller
{
    public function create()
    {
        return view('mails.send-message');
    }

    public function store(MailRequest $request)
    {
        $mail = Mail::create($request->validated());

        SendMailJob::dispatch($mail);

        return redirect()->route('vacancies.index')->with('toast', [
            'type' => "success",
            'message' => "Message has been created successfully."
        ]);
    }
}
