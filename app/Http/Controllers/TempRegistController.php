<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use Mail;
use Lang;
use Validator;
use App\Http\Requests;
use App\Mail\MailManager;

class TempRegistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tempregist.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
        ]);
        $options = [
            'from' => \Config::get('mail.from.address'),
            'from_jp' => \Config::get('mail.from.name'),
            'to' => $request->email,
            'subject' => '【THE BLACK LIST】会員登録へお進みください！',
            'template' => 'emails.confirm',
        ];
        $data = [
            'email' => $request->email,
            'name' => explode('@', $request->email)[0],
            'actionUrl' => \Config::get('app.url').'/register?email='.$request->email,
        ];
        try {
            Mail::to($options['to'])->send(new MailManager($options, $data));
            return redirect('/tempregist')->with([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            $errorcd = 'E5001';
            Log::error(Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => Lang::get("errors.{$errorcd}"),
            ]);
        }
    }

}
