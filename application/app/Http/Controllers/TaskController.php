<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all(); // すべてのフォルダを取得する
        $current_folder = Folder::find($id); // 選ばれたフォルダを取得する
        $tasks = $current_folder->tasks()->get(); // 選ばれたフォルダに紐づくタスクを取得する

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }
}