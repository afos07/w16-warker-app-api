<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;
class PostoController extends Controller
{
     //
     public function listaPostos(){
        // recuperando os registros da tabela postos no db
        $posto = Posto::all();
        $data = [];
        foreach($posto as $postos){
            // percorrendo os registros do banco e incrementando na var $data;
            $newData = [
                "id"=> $postos-> id,
                "reservatorio"=> $postos-> reservatorio,
                "coords"=> array(
                    "latitude" => $postos-> latitude,
                    "longitude" => $postos-> longitude,
                ),  
            ];
            array_push($data, $newData);
        }
        return response()-> json($data);
    }

    public function listaPostosEspecifico($idPosto){
        $data = [];
        $newDataPostos = [];
        // recuperando os registros da coluna cidade no db
        $posto = Posto::where('id', $idPosto)->get();

        // percorrendo os registros da tabela postos e incrementando na var $data;
        foreach($posto as $postos){
        
            // criando meu obj e incrementando na var $data;
            $newData = [
                "id"=> $postos-> id,
                "cidade"=> $postos-> cidade_id,
                "reservatorio"=> $postos-> reservatorio,
                "coords"=> array(
                    "latitude" => $postos-> latitude,
                    "longitude" => $postos-> longitude,
                ),
                "updated_at"=> $postos-> updated_at,
                "created_at"=> $postos-> created_at,
            ];
            array_push($data, $newData);
        }
        return response()-> json($data);
    }

    public function criaPostos(Request $request){
        $posto = new Posto;

        $posto-> cidade_id = $request-> cidade;
        $posto-> reservatorio = $request-> reservatorio;
        $posto-> latitude = $request-> longitude;
        $posto-> longitude = $request-> longitude;
        $data = [];
        if($posto-> save()){
            $data = ["success"=> true, "message"=> "Posto cadastrado com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao cadastrar um novo posto. Tente novamente em instantes."];
        }
        
        echo json_encode($data);
    }

    public function apagaPostos($idPosto){
        // apagando agora a cidade 
        $postoDelete = Posto::findOrFail($idPosto)-> delete();
        if($postoDelete){
            $data = ["success"=> true, "message"=> "Posto apagado com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao apagar o posto. Tente novamente em instantes."];
        }
        return response()-> json($data);
    }

    public function editaPostos(Request $request , $idPosto){
        // editando os dados do posto
        $postoUpdate = Posto::findOrFail($idPosto)->update(
            $request-> all()
        );
        if($postoUpdate){
            $data = ["success"=> true, "message"=> "Posto editado com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao editar o posto. Tente novamente em instantes."];
        }
        return response()-> json($data);
    }
}
