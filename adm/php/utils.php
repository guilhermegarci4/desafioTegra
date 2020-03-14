<?php 

//Inverter data
function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}

//Return livros
function Livros(){
   require("conecta.php"); //Conexão com o banco de dados
   $selectLivros = mysqli_query($con, "SELECT * FROM tbl_livros");
   $resArr = array(); //create the result array

    while($row = mysqli_fetch_assoc($selectLivros)) { //loop the rows returned from db
        $resArr[] = $row; //add row to array
    }
    return $resArr;
}

function LivrosRecomendados(){
    require("conecta.php"); //Conexão com o banco de dados
    $selectLivros = mysqli_query($con, "SELECT * FROM tbl_livros ORDER BY id_livro DESC LIMIT 3");
    $resArr = array(); //create the result array
 
     while($row = mysqli_fetch_assoc($selectLivros)) { //loop the rows returned from db
         $resArr[] = $row; //add row to array
     }
     return $resArr;
 }

//Return livros $id
function LivrosEditar($id){
    require("conecta.php"); //Conexão com o banco de dados
    $selectLivros = mysqli_query($con, "SELECT * FROM tbl_livros WHERE id_livro = $id");
    $resArr = array(); //create the result array

    while($row = mysqli_fetch_assoc($selectLivros)) { //loop the rows returned from db
        $resArr[] = $row; //add row to array
    }
    return $resArr;
 }

//Return Titulo do livro
function TituloLivro($id_livro){
    require("conecta.php"); //Conexão com o banco de dados
    $selectNomeLivro = mysqli_query($con, "SELECT * FROM tbl_livros WHERE id_livro = $id_livro");
    $tituloLivro = array(); //create the result array

    while($row = mysqli_fetch_assoc($selectNomeLivro)){
        $tituloLivro = $row['titulo'];
    }

    return $tituloLivro;
}

//Return cupons
function Cupom(){
    require("conecta.php"); //Conexão com o banco de dados
    $selectCupom = mysqli_query($con, "SELECT * FROM tbl_cupons");
    $resArr = array(); //create the result array

    while($row = mysqli_fetch_assoc($selectCupom)) { //loop the rows returned from db
        $resArr[] = $row; //add row to array
    }
    return $resArr;
}

//Return editar cupom
function CupomEditar($id){
    require("conecta.php"); //Conexão com o banco de dados

    $query = mysqli_query($con, "SELECT * FROM tbl_cupons WHERE id_cupom=$id");
    $resArr = array(); //create the result array

    while($dadosCupom=mysqli_fetch_assoc($query)){
        $resArr[] = $dadosCupom;
    }

    return $resArr;
}

//Return select livro option
function SelectLivroOption(){
    require("conecta.php"); //Conexão com o banco de dados

    $query = mysqli_query($con, "SELECT id_livro, titulo FROM tbl_livros ORDER BY titulo ASC");
    $resArr = array(); //create the result array

    while($fetch = mysqli_fetch_assoc($query)) { //loop the rows returned from db
        $resArr[] = $fetch; //add row to array
    }
    return $resArr;
}    

//Return select autor option
function SelectAutorOption(){
    require("conecta.php"); //Conexão com o banco de dados

    $query = mysqli_query($con, "SELECT id_livro, autor FROM tbl_livros ORDER BY autor ASC");
    $resArr = array(); //create the result array

    while($fetch = mysqli_fetch_assoc($query)) { //loop the rows returned from db
        $resArr[] = $fetch; //add row to array
    }
    return $resArr;
}   
?>