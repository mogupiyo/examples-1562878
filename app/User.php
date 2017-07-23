<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function getRecords() {
        return $this::get();
    }

    public function getInfluenceUsers() {
        return $this::where('approved', '=', true)
                    ->where('created_at', '>', date("Y-m-d H:i:s", strtotime("-2 week")))
                    ->get();
    }

    /**
     * 映画・TV関係者かどうかを更新します
     * @param  integer : ユーザーID
     * @param  boolean : 有効/無効
     * @return boolean : 処理の成否
     */
    public function updateFilmRelated($user_id, $flg) {
        return $this::where('id', '=', $user_id)->update([
            'film_related' => $flg
        ]);
    }

    /**
     * 映画・TV関係者であることを承認します
     * @param  integer : ユーザーID
     * @param  boolean : 有効/無効
     * @return boolean : 処理の成否
     */
    public function approve($user_id, $flg) {
        return $this::where('id', '=', $user_id)->update([
            'approved' => $flg
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'gender', 'birthday',
        'social_id','avatar',
        'film_related', 'approved',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
