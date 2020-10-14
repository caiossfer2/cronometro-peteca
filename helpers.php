<?php 

function verificaNomes($arrNomes){

    $padrao = '/^[A-Za-zÁ-ú ]{2,30}$/';
   /* foreach($arrNomes as $nome){
        $resultado = preg_match($padrao,$nome);
        if($resultado == false){
        break;
            return false;
        }
    }*/
    for($i = 0; $i< sizeof($arrNomes); $i++){
        $resultado = preg_match($padrao,$arrNomes[$i]);
        if($resultado == false){
        // break;
            return false;
        }
    }

    return true;
}


function salvaBd($nomeA1, $nomeA2, $resultadoA, $nomeB1, $nomeB2, $resultadoB){
    
    $sql = MySql::conectar()->prepare("INSERT INTO `".NOME_TABELA."` (id,nomeA1,nomeA2,resultadoA,nomeB1,nomeB2,resultadoB) VALUES (null,?,?,?,?,?,?)");
     $status = $sql->execute(array($nomeA1, $nomeA2, $resultadoA, $nomeB1, $nomeB2, $resultadoB));
     return $status;

}


function recuperaNomes($coluna1,$coluna2, $coluna3){
    $sql = MySql::conectar()->prepare("SELECT $coluna1, $coluna2 FROM `".NOME_TABELA."` WHERE $coluna3 = 1 ");
    $sql->execute();
    return $sql->fetchAll();    
}

function contadorVitorias($vencedores, $tipo){

    foreach($vencedores as $nomes){
        $arr[] = $nomes['nome'.$tipo.'1'];
        $arr[] = $nomes['nome'.$tipo.'2'];
    }
 
    return $arr;

}

function tratador(){

    $vencedoresA = recuperaNomes('nomeA1', 'nomeA2', 'resultadoA');
    $vencedoresB = recuperaNomes('nomeB1', 'nomeB2', 'resultadoB');

    $arrA = contadorVitorias($vencedoresA, 'A');

    $arrB = contadorVitorias($vencedoresB, 'B');

    foreach($arrA as $valueA){
        $arrTotalCada[] = $valueA;
    }

    foreach($arrB as $valueB){
        $arrTotalCada[] = $valueB;
    }

    return $arrTotalCada;


    // print_r(array_count_values($arrTotalCada));
   

}



?>