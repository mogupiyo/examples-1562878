<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function getRecordById($id) {
        return $this::find($id);
    }

    public function comments() {
        return $this->hasMany('App\Comment')->leftJoin('users', 'users.id', '=', 'comments.user_id');
    }

    public function getRecordsById($scenario_id) {
        return $this::where('scenario_id', '=', $scenario_id)->get();
    }

    public function getMyRecords() {
        return $this::Login()
                    ->JoinCategories()
                    ->JoinUsers()
                    ->SelectCol()
                    ->Desc()
                    ->get();
    }

    public function addRecord($request, $id) {
        $last_one = $this::where('scenario_id', '=', $id)->where('user_id', '=', Auth::user()->id)->orderBy('id')->first();
        $numbering = 1;
        if ($last_one) {
            $numbering = $last_one->numbering;
        }
        $this->user_id = Auth::user()->id;
        $this->scenario_id = $id;
        $this->scene = $request->scene;
        $this->topic = $request->topic;
        $this->numbering = $numbering;
        if ($request->thumbnail) {
            $this->thumbnail = $request->thumbnail;
        } else {
            $this->thumbnail = 'no-image.jpg';
        }
        $this->episode = $request->episode;
        return $this->save();
    }

    public function updateRecord($request, $scenario_id, $story_id) {
        $model = $this::find($story_id);
        $model->user_id = Auth::user()->id;
        $model->scene = $request->scene;
        $model->topic = $request->topic;
        if ($request->thumbnail) {
            $model->thumbnail = $request->thumbnail;
        }
        $model->episode = $request->episode;
        return $model->save();
    }

    /**
     * 通話時応答挙動リストを削除します。
     *
     * @param  integer $id trakcing_callsテーブルのid
     * @param  \Illuminate\Http\Request  $request リクエスト情報
     * @return array          登録結果(true: 成功, false: 失敗)
     */
    public function deleteRecord($id) {
        return $this::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->delete();
    }

    public function scopeLimit($query, $limit = null) {
        if ($limit) {
            $query->take($limit);
        }
    }

    public function scopeTarget($query, $id) {
        $query->where('stories.id', '=', $id);
    }

    public function scopeDesc($query) {
        $query->orderBy('updated_at', '=', 'desc');
    }

    public function scopeLogin($query) {
        if (!Auth::guest()) {
            $query->where('user_id', '=', Auth::user()->id);
        }
    }

    public function scopeJoinComments($query) {
        $query->leftJoin('comments','comments.story_id','=','stories.id');
    }

    public function scopeJoinUsers($query) {
        $query->leftJoin('users','users.id','=','scenarios.user_id');
    }

    public function scopeSelectCol($query) {
        $query->select('scenarios.*', 'users.avator', 'users.name', 'categories.label', 'categories.path');
    }
}
