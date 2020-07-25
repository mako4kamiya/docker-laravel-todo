<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use App\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)// 引数にインポートしたRequestクラスを受け入れる
    {
        $folder = new Folder();// フォルダモデルのインスタンスを作成する
        $folder->title = $request->title;// タイトルに入力値を代入する
        $folder->save();// インスタンスの状態をデータベースに書き込む
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
