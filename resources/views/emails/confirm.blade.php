<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 50px 0 25px 0; text-align: center; background-color: #FFF;',
    'email-masthead_name' => 'font-size: 14px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph-big' => 'margin-top: 0; color: #111; line-height: 1.5em; font-weight: bold;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 14px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 14px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}/dashboard" target="_blank">
                                <img style="display: inline-block; width: 300px;" src="{{ url('/') }}/images/logo.png" alt="{{ config('app.name') }}">
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Intro -->
                                        <p style="{{ $style['paragraph'] }}">
                                            ようこそ {{ $data['name'] }} さん、会員登録完了まであともう少しです！<br>
                                            以下のボタンをクリックしてこの手続きを完了してください。<br>
                                        </p>

                                        <!-- Action Button -->
                                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <?php
                                                        $actionColor = 'button--blue';
                                                    ?>

                                                    <a href="{{ $data['actionUrl'] }}"
                                                        style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                        class="button"
                                                        target="_blank">
                                                        会員登録へ進む
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Outro -->
                                        <p style="{{ $style['paragraph'] }}">
                                          お客さまがこのリクエストを行っていない場合、他のユーザーが誤ってお客さまのメールアドレスを入力したと考えられます。<br>
                                        </p>

                                        <!-- Salutation -->
                                        <p style="{{ $style['paragraph'] }}">
                                            {{ config('app.name') }}サポート
                                        </p>

                                        <!-- Sub Copy -->
                                        <table style="{{ $style['body_sub'] }}">
                                            <tr>
                                                <td style="{{ $fontFamily }}">
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        上記ボタンをクリックする際に問題が発生した場合は、以下のURLからアクセスしてください。
                                                    </p>

                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        <a style="{{ $style['anchor'] }}" href="{{ $data['actionUrl'] }}" target="_blank">
                                                            {{ $data['actionUrl'] }}
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}/" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
