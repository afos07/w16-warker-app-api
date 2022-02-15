<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Posto;

class CidadeController extends Controller
{
    //
    public function listaCidades(){
        // recuperando os registros da coluna cidade no db
        $cidade = Cidade::all();
        $data = [];
        foreach($cidade as $cidades){
            // percorrendo os registros do banco e incrementando na var $data;
            $newData = [
                "id"=> $cidades-> id,
                "cidade"=> $cidades-> nome_da_cidade,
                "coords"=> array(
                    "latitude" => $cidades-> latitude,
                    "longitude" => $cidades-> longitude,
                ),  
            ];
            array_push($data, $newData);
        }
        return response()-> json($data);
    }

    public function listaCidadesEspecifico($idCidade){
        $data = [];
        $newDataPostos = [];
        // recuperando os registros da coluna cidade no db
        $cidade = Cidade::where('id', $idCidade)->get();

        // percorrendo os registros da tabela cidade e incrementando na var $data;
        foreach($cidade as $cidades){
            // recuperando os postos da cidade
            $postoCidade = Posto::where('cidade_id', $cidades['id'])->get();
            $newDataPostos = $postoCidade;
            // criando meu obj e incrementando na var $data;
            $newData = [
                "id"=> $cidades-> id,
                "cidade"=> $cidades-> nome_da_cidade,
                "coords"=> array(
                    "latitude" => $cidades-> latitude,
                    "longitude" => $cidades-> longitude,
                ),
                "postos"=> $newDataPostos
            ];
            array_push($data, $newData);
        }
        return response()-> json($data);
    }

    public function criaCidades(Request $request){
        $cidade = new Cidade;

        $cidade-> nome_da_cidade = $request-> cidade;
        $cidade-> latitude = $request-> latitude;
        $cidade-> longitude = $request-> longitude;
        $data = [];
        if($cidade-> save()){
            $data = ["success"=> true, "message"=> "Cidade cadastrada com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao cadastrar uma nova cidade. Tente novamente em instantes."];
        }

        return response()-> json($data);
    }

    public function apagaCidades($idCidade){
        // apagando agora a cidade 
        $cidadeDelete = Cidade::findOrFail($idCidade)-> delete();
        if($cidadeDelete){
            $data = ["success"=> true, "message"=> "Cidade apagada com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao apagar a cidade. Tente novamente em instantes."];
        }
        echo json_encode($data);
    }

    public function editaCidades(Request $request, $idCidade){
        // editando os dados da cidade
        $cidadeUpdate = Cidade::findOrFail($idCidade)->update(
            $request-> all()
        );
        if($cidadeUpdate){
            $data = ["success"=> true, "message"=> "Cidade editada com sucesso"];
        }else{
            $data = ["success"=> false, "message"=> "Ocorreu um erro ao editar a cidade. Tente novamente em instantes."];
        }
        return response()-> json($data);
    }

}
