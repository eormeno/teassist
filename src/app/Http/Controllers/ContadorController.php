<?php

namespace App\Http\Controllers;

use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use Illuminate\Http\Request;

class ContadorController extends Controller
{

    use ToastTrigger;


    public function index(){
        $número=00;
        return view('contador', compact('número') );
    }

    public function incrementar($número){
        
        $this->alert('Precaución: número incrementado');

        if($número<10){
            return view('contador', ['número' => $número + 1]);}
        else{
            return view('contador', ['número' => $número]);
        }
    }

    public function decrementar($número){
        $this->errorToast('Número decrementado');
        if($número>0){
            return view('contador', ['número' => $número - 1]);}
        else{
            return view('contador', ['número' => 0]);
        }
    }

    public function duplicar($número){
        if($número<6){
            return view('contador', ['número' => $número * 2]);}
        else{
            return view('contador', ['número' => $número]);
    
        }
    }

    public function resetear(){
        return view('contador', ['número' => 0]);
    }


    public function reestablecer(Request $request){
        $numero = $request->input('numero');
    
    if ($numero >= 0 &&$numero < 10) {
        return view('contador', ['número' => $numero]);
    } else {
        return view('contador', ['número' => 0]);
    }
    }

    
}