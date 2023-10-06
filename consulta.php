<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</title>
   <link rel="stylesheet" href="styles.css">
   <style>
      #resultado{

         height: 350px;
         margin-top: 30px;
         padding-top: 30px;
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         text-align: center;
         gap: 10px;
         outline: 2px solid black;
      }
      #b2{
         width: 200px;
         height: 40px;
         background-color: #bd93f9;
         border:0;
         border-radius: 10px;
         color: #FFF;
         font-size: 25px;
         font-weight: bold;
         cursor: pointer;
         text-align: center;
      }
   </style>
</head>
<body>
   

   <div class="divzao" id="resultado">
   <?php

      include("conexao.php");

      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $data = $_POST['data'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $cep = $_POST['CEP'];
      $rua = $_POST['rua'];
      $numero = $_POST['numero'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];
      $renda = $_POST['renda'];
      $computador = isset($_POST['computador'])?true:false;
      $celular = isset($_POST['celular'])?true:false;
      $notebook = isset($_POST['notebook'])?true:false;
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      $dataPreenchimento = date('d/m/y H:i');
      $dataNasc = new DateTime($data);
      $idade = $dataNasc->diff(new DateTime( date('Y-m-d')));
      $idade = $idade->format('%Y');

      $query = "INSERT INTO formulario (cpf,nome,dataNasc,email,telefone,cep,rua,numero,bairro,cidade,estado,renda) 
      VALUES('$cpf','$nome','$data','$email','$telefone','$cep','$rua','$numero','$bairro','$cidade','$estado','$renda')";
      print("<h1>SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</h1>"); 
      print("<p>CPF: ${cpf}<p>"); 
      print("<p>Nome Completo: ${nome}<br><p>"); 
      print("<p>Data e hora de preenchimento ${dataPreenchimento}</p>"); 
      print("${idade} anos");
      

      
      if($renda > 3000){
         print("<strong>Você não tem direito a nenhum dos itens</strong>");
         
      }
      elseif($idade > 65){
         print("<strong>Você tem direito a 1 notebook e 1 smartphone</strong>");
      }
      elseif($idade < 18){
         
         print("<strong>Você não tem direito a nenhum dos itens</strong>");
      }
      elseif(!$computador && !$notebook && !$celular){ 
         print("<strong>Você tem direito a 1 notebook</strong>");
      }
      elseif($renda < 1000){
         print("<strong>Você tem direito a 1 notebook e 1 smartphone</strong>");
      }




      ?>

     <div id="divButao"></div>
     <button id="b2" name="b2">Imprimir</button>

      <?php
         if(mysqli_query($connect,$query)){
            echo '<script>alert("Armazenado no Banco de Dados com sucesso.")</script>';
         }
         else{
            echo'<script>alert("Não foi possível armazenar no banco de dados)</script>';
         }
         mysqli_close($connect);
      ?>

   </div>

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
         $('#b2').click(function(){
         document.getElementById('b2').setAttribute('hidden', '');
         document.getElementById("divButao").innerHTML = "<p><strong>Leve este comprovante, um documento com foto, e procure o almoxarifado para retirada</strong></p>";
         window.print();
         document.getElementById("divButao").innerHTML = "";
         document.getElementById('b2').removeAttribute('hidden');
   })
   </script>
   
</body>
</html>
