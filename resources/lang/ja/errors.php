<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Error Code List
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages WITHOUT
    | the validator class.
    | Please use these to handle functional errors.
    |
    */

    // ロジックエラー(E50**)
    'E5001' => 'Eメールの送信に失敗しました。',
    'E5002' => '関係者様の登録に失敗しました。',
    'E5003' => '画像がアップロードされていないか不正なデータです。',
    'E5004' => 'コメントの書き込みに失敗しました。',

    // 複数処理のエラーハンドルなど、予期せぬエラー(E51**)
    'E5101' => 'システムエラーが発生しました。',

    // データベース操作結果によるエラー(E52**)
    'E5201' => 'データの取得に失敗しました。',
    'E5202' => 'データの登録に失敗しました。',
    'E5203' => 'データの更新に失敗しました。',
    'E5204' => 'データの削除に失敗しました。',

    // バックエンドでしか表示しないエラー(E55**)
    'E5501' => 'カウントアップエラー',
    'E5502' => '同期処理エラー',

];
