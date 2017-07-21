<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mail\MailManager;
use Mail;

class MailTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mailtest';

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
        echo "mail test started.";

        $options = [
            'from' => 'info@blacklist.jp',
            'from_jp' => 'ろーかる',
            'to' => 'sekaino.piyopiyo@gmail.com',
            'subject' => 'テストメール',
            'template' => 'emails.confirm',
        ];
        $data = [
            'hoge' => 'hogehoge',
        ];
        Mail::to($options['to'])->send(new MailManager($options, $data));

        echo "mail test ended.";
    }
}
