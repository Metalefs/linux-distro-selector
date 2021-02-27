<?php

use App\Quotation;
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class MyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
        $distros = \DB::table('Distros')->get();
        $alunos =  \DB::table('Distros') 
            ->select('Title','Description','Turma','Nome','Aluno.Id')
            ->join('Aluno','Distros.Id','=','IdDistro')
            ->get();
        return view('welcome',compact('distros','alunos'));
    }
    public function submit(Request $request) {
        
      $nomeAluno = $request->input('nomeAluno');
      $turma = $request->input('turma');
      $distro = $request->input('distro');
        
      \DB::insert('insert into Aluno (Nome, Turma, IdDistro) values (?, ?, ?)', [$nomeAluno, $turma,$distro]);
      
      return redirect('/');
    }
    public function delete(Request $request) {
        
      $IdAluno = $request->input('IdAluno');
        
      \DB::delete('delete from Aluno where Id = ?', [$IdAluno]);
      
      return redirect('/');
    }
}
