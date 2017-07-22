<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     * ユーザーをTwitterの認証ページにリダイレクトする
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        // var_dump($request->relation);
        // if ($request->relation) {
        //     var_dump("ok");
        // }
        // return "test";
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Twitterからユーザー情報を取得する
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('twitter')->user();

        $temp_user = [];
        $temp_user['id'] = $user->id;
        $temp_user['name'] = $user->name;
        $temp_user['nickname'] = $user->nickname;
        $temp_user['email'] = $user->email;
        $temp_user['avatar'] = $user->avatar;
        $temp_user['id'] = $user->id;
        if ($temp_user['email'] === null) {
            $temp_user['email'] = $temp_user['id']."@twitter.com";
        }

        $data = file_get_contents($temp_user['avatar']);
        $file_name = "{$user->id}.jpg";
        file_put_contents(storage_path()."/app/public/avatar/{$file_name}", $data);

        $authUser = $this->_findOrCreateUser($temp_user, $file_name);

        return redirect('/')->with([
            'LoginID' => $authUser->id
        ]);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $social_user
     * @return User
     */
    private function _findOrCreateUser($temp_user, $file_name)
    {
        if ($user = User::where('social_id', $temp_user['id'])->first()) {
            return $user;
        }

        return User::create([
            'name' => $temp_user['name'],
            'email' => $temp_user['email'],
            'password' => bcrypt('password'),
            // 'api_token' => $social_user->token,
            'social_id' => $temp_user['id'],
            'avatar' => $file_name
        ]);
    }

}
