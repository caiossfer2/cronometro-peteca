<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treinão</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="titulo white">
        <div class="container">
            <h2 class="white">Cronômetro peteca</h2>
        </div><!--container-->
    </div><!--titulo-->

    <div class="cronometro">
        <div class="container">
            <h1 id="cron"></h1>
            <audio id="audio" >
                <source src="beep.mp3" type="audio/mpeg">
            </audio>
            <button id="iniciar">Iniciar</button>
            <button id="reiniciar">Reiniciar</button>
        </div><!--container-->
    </div><!--cronometro-->





<div class="placares">
    <div class="placar left">
        <h2 class="white">Equipe A</h2>
            <button class="add" id="add1">+</button>
            <span id="p1" class="white">15</span>
            <button class="sub" id="sub1">-</button>
    </div><!--placar-->
        
    <div class="placar right">
        <h2 class="white">Equipe B</h2>
            <button class="add" id="add2">+</button>
            <span id="p2" class="white">12</span>
            <button class="sub" id="sub2">-</button>
    </div><!--placar-->
    <div class="clear"></div>

    <div class="submit">
        <button id="control-ranking" type="submit">Mostrar/Esconder ranking</button>
     
    </div>
</div><!--placares-->


<div class="ranking" id="ranking">
    <table class="white">
        <tr>
            <th>Nome</th>
            <th>Partidas ganhas</th>
        </tr>

    <?php 
    $arrRanking = array_count_values(tratador());
    foreach($arrRanking as $nome =>$num) :
    ?>
        <tr>
            <td><?php echo $nome; ?></td>
            <td><?php echo $num; ?></td>
            <?php endforeach; ?>
        </tr>
    </table>

    <div class="submit">
        <button type="submit" id="refresh">Atualizar ranking</button>
    </div>
</div><!--ranking-->
 

<div class="cadastro-partida" id="cadastro-partida">
    <div class="container">
        <form method="post">
        <?php 
        if(isset($_POST['acao'])){
            $nomeA1 = $_POST['nomeA1'];
            $nomeA2 = $_POST['nomeA2'];
            $nomeB1 = $_POST['nomeB1'];
            $nomeB2 = $_POST['nomeB2'];
            $resultado = $_POST['resultado'];
            if($resultado == 'a'){
                $resultadoA = 1;
                $resultadoB = 0;
            }elseif($resultado == 'b'){
                $resultadoA = 0;
                $resultadoB = 1;
            }
           
            
            $arrNomes = [$nomeA1, $nomeA2, $nomeB1, $nomeB2];
            if(verificaNomes($arrNomes) == true){
                //pode salvar no bd
                echo '<div class="white">Cadastrado com sucesso</div>';
                salvaBd($nomeA1, $nomeA2, $resultadoA, $nomeB1, $nomeB2, $resultadoB);
        }else{
            echo '<div class="white">Preencha os nomes corretamente</div>';
        }
    }
        ?>
      

        <p class="white">Equipe A</p>
            <label class="white">Nome atleta 1:</label>
            <input type="text" name="nomeA1" >
            <label class="white">Nome atleta 2:</label>
            <input type="text" name="nomeA2" >

        <p class="white">Equipe B</p>
            <label class="white">Nome atleta 1:</label>
            <input type="text" name="nomeB1" >
            <label class="white">Nome atleta 2:</label>
            <input type="text" name="nomeB2" >

            <div class="radios">
            <p class="white">Vitória da equipe:</p>
            <input type="radio" name="resultado" id="a" value="a">
            <label class="white" for="a">A</label>
            <input type="radio" name="resultado" id="b" value="b">
            <label class="white" for="b">B</label>
            </div><!--radios-->

        <div class="submit">
            <input type="submit"  name="acao" value="Enviar" id="enviar">
        </div><!--submit-->
    </form>



  
    </div><!--container-->
</div><!--cadastro-partida-->






<script src="js/functions.js"></script>
</body>
</html>