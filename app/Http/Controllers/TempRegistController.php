<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Validator;
use App\Http\Requests;
use App\Mail\MailManager;
use App\MyLibs\MailManager as MailPHP;

class TempRegistController extends Controller
{

    protected $mail_manager;

    /**
     * Construct the TempRegistController
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MailPHP $mail_manager)
    {
        $this->mail_manager = $mail_manager;
    }

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
            'template' => 'emails.tempregist',
        ];
        $data = [
            'email' => $request->email,
            'name' => explode('@', $request->email)[0],
            'actionUrl' => \Config::get('app.url').'/register?email='.$request->email,
        ];
        try {
            // Mail::to($options['to'])->send(new MailManager($options, $data)); TODO:メールサーバ用意したらこっち
            $this->mail_manager->send($options, $data); // PHPから送信するのみ。返信不可。
            return redirect('/tempregist')->with([
                'status' => 'success',
                'modal_title' => '送信完了',
                'modal_content' => 'ご入力いただいたメールアドレスに会員登録用のURLを送信しました。',
            ]);
        } catch (\Exception $e) {
            $errorcd = 'E5001';
            \Log::error(\Lang::get("errors.{$errorcd}"), [$e]);
            return redirect('/error')->with([
                'errorcd' => $errorcd,
                'errormsg' => \Lang::get("errors.{$errorcd}"),
            ]);
        }
    }

}
