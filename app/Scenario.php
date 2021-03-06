<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    public function getRecordById($id) {
        return $this::Target($id)
                    ->JoinCategories()
                    ->JoinUsers()
                    ->SelectCol()
                    ->first();
    }

    public function getRecords($paging = null, $keyword = null) {
        return $this::JoinCategories()
                    ->JoinUsers()
                    ->SelectCol()
                    ->FindData($keyword)
                    ->Desc()
                    ->paginate($paging);
    }

    public function getMyRecords() {
        return $this::Login()
                    ->JoinCategories()
                    ->JoinUsers()
                    ->SelectCol()
                    ->Desc()
                    ->get();
    }

    public function dailyview() {
        return $this->hasMany('App\DailyViewLog');
    }

    public function totalview() {
        return $this->hasOne('App\ScenarioViewLog');
    }

    public function mybookmarks() {
        return $this->hasMany('App\Bookmark')->where('user_id', Auth::user()->id)->where('active', true);
    }

    public function bookmarks() {
        return $this->hasMany('App\Bookmark');
    }

    public function addRecord($request) {
        $this->user_id = Auth::user()->id;
        $this->title = $request->title;
        $this->category_id = $request->category_id;
        if($request->thumbnail){
            $this->thumbnail = $request->thumbnail;
        } else {
            $this->thumbnail = 'no-image.jpg';
        }
        $this->description = $request->description;
        return $this->save();
    }

    public function updateRecord($request, $id) {
        $model = $this::find($id);
        $model->user_id = Auth::user()->id;
        $model->title = $request->title;
        $model->category_id = $request->category_id;
        if ($request->thumbnail) {
            $model->thumbnail = $request->thumbnail;
        }
        $model->description = $request->description;
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

    public function scopeFindData($query, $keyword = null) {
        $query->where('scenarios.title', 'like', "%$keyword%")
              ->orWhere('scenarios.description', 'like', "%$keyword%")
              ->orWhere('users.name', 'like', "%$keyword%");
    }

    public function scopeLimit($query, $limit = null) {
        if ($limit) {
            $query->take($limit);
        }
    }

    public function scopeTarget($query, $id) {
        $query->where('scenarios.id', '=', $id);
    }

    public function scopeDesc($query) {
        $query->orderBy('updated_at', '=', 'desc');
    }

    public function scopeLogin($query) {
        if (!Auth::guest()) {
            $query->where('user_id', '=', Auth::user()->id);
        }
    }

    public function scopeJoinCategories($query) {
        $query->leftJoin('categories','categories.id','=','scenarios.category_id');
    }

    public function scopeJoinUsers($query) {
        $query->leftJoin('users','users.id','=','scenarios.user_id');
    }

    public function scopeSelectCol($query) {
        $query->select('scenarios.*', 'users.avatar', 'users.name', 'categories.label', 'categories.path');
    }

}
