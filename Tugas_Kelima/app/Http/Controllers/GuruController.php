<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Models\Guru;

class GuruController extends Controller{
    public function index(){
        $guru = Guru::All();
        return view('guru', ['guru' => $guru]);
    }

    public function restore(){
        $guru = Guru::onlyTrashed();
        $guru->restore();
        return redirect('/guru/trash');
    }

    public function force_delete(){
    	// hapus permanen semua data guru yang sudah dihapus
    	$guru = Guru::onlyTrashed();
    	$guru->forceDelete();
 
    	return redirect('/guru/trash');
    }
}
