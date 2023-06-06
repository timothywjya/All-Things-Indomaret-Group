<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Exception;

class TodoController extends Controller{
    public function index(){
        return view('home');
    }

    public function getDataTodo()
    {
        $todoo = Todo::all();
        error_log("123");
        return response()->json($todoo);
    }

    public function store(Request $request){
        $request->validate([
            'todo' => 'required',
            ]);

        DB::beginTransaction();
        try {
            $todo = new Todo();
            $todo->todo = $request->todo;
            $todo->save();
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Data Berhasil disimpan'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status'  => 'error', 'message' => 'Data Gagal disimpan', 'errorMessage' => $e->getMessage() ], 400);
        }
    }

    public function update(Todo $todo, Request $request){
        $request->validate([
            'todo' => 'required',
            ]);

        DB::beginTransaction();
        try {
            $todo->todo = $request->todo;
            $todo->save();
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Data Berhasil diubah'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status'  => 'error', 'message' => 'Data Gagal diubah', 'errorMessage' => $e->getMessage() ], 400);
        }
    }

    public function destroy(Todo $todo){
        DB::beginTransaction();
        try {
            Todo::find($todo->id)->delete();
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Data Berhasil dihapus'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status'  => 'error', 'message' => 'Data Gagal disimpan', 'errorMessage' => $e->getMessage() ], 400);
        }
    }
}