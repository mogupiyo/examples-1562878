<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function addRecord($request) {
        return $this::create([
            'path' => $request->path,
            'label' => $request->label
        ]);
    }

    public function getRecords() {
        return $this::get();
    }

    public function getRecordById($id) {
        return $this::where('id', '=', $id)->first();
    }

    public function updateRecordById($request, $id) {
        return $this::where('id', '=', $id)->update([
            'label' => $request->label,
            'path' => $request->path
        ]);
    }

    public function deleteRecordById($id) {
        return $this::where('id', '=', $id)->delete();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'path',
    ];


}
