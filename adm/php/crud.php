<?php

//Incluindo a conexao com banco de dados
include '../../php/conecta.php';


//Pegar qual o parametro passado pelo GET
if(isset($_GET['action']))
    $action = $_GET['action'];

//Cadastrar Livro
if($action == 'cadastrarLivro')
{
    if(isset($_POST['titulo']) ? $titulo = $_POST['titulo'] : $titulo = '');
    if(isset($_POST['autor']) ?    $autor = $_POST['autor'] : $autor = ''); 
    if(isset($_POST['preco']) ?  $preco = $_POST['preco'] : $preco = '');
    if(isset($_POST['qtdEstoque']) ?  $qtdEstoque = $_POST['qtdEstoque'] : $qtdEstoque = '');

    if ($_FILES[ 'arquivo' ][ 'name' ] == '' ||  $_FILES[ 'arquivo' ][ 'name' ] == 'NULL' ||  $_FILES[ 'arquivo' ][ 'name' ] == NULL ) {
        
        $insertLivro = mysqli_query($con, "INSERT INTO `tbl_livros`(`titulo`, `autor`, `preco`, `qtdEstoque`) 
        VALUES ('$titulo','$autor','$preco', '$qtdEstoque')");
        
        setcookie('msgcookie', 1, time()+2, "/");
        header('Location: ../livros.php');   
        exit();
    }
    // verifica se foi enviado um arquivo
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];

        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = '../uploads/'.$novoNome;

            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                echo ' < img src = "' . $destino . '" />';
            }
            else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else
        echo 'Você não enviou nenhum arquivo!';

    $insertLivro = mysqli_query($con, "INSERT INTO `tbl_livros`(`titulo`, `autor`, `preco`, `qtdEstoque`, `image`) 
                                        VALUES ('$titulo','$autor','$preco', '$qtdEstoque', '$novoNome')");
                                        
    setcookie('msgcookie', 1, time()+2, "/");
    header('Location: ../livros.php');   
    exit();
}

//Editar livro
if($action == 'editarLivro')
{
    if(isset($_POST['id']) ? $id = $_POST['id'] : $id = '');
    if(isset($_POST['titulo']) ? $titulo = $_POST['titulo'] : $titulo = '');
    if(isset($_POST['autor']) ?    $autor = $_POST['autor'] : $autor = ''); 
    if(isset($_POST['preco']) ?  $preco = $_POST['preco'] : $preco = '');
    if(isset($_POST['qtdEstoque']) ?  $qtdEstoque = $_POST['qtdEstoque'] : $qtdEstoque = '');

    if ($_FILES[ 'arquivo' ][ 'name' ] == '' ||  $_FILES[ 'arquivo' ][ 'name' ] == 'NULL' ||  $_FILES[ 'arquivo' ][ 'name' ] == NULL ) {

    $insertLivro = mysqli_query($con, "UPDATE
                                            `tbl_livros` 
                                        SET 
                                            `titulo`='$titulo', 
                                            `autor`='$autor', 
                                            `preco`='$preco',
                                             `qtdEstoque` = '$qtdEstoque'
                                        WHERE id_livro = $id
                                        ");

        setcookie('msgcookie', 2, time()+2, "/");
        header("Location: ../livros_editar.php?id=$id");   
        exit();
}
        if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];
    
            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    
            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );
    
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid ( time () ) . '.' . $extensao;
    
                // Concatena a pasta com o nome
                $destino = '../uploads/'.$novoNome;
    
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                    echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                    echo ' < img src = "' . $destino . '" />';
                }
                else
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            }
            else
                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
        }
        else
            echo 'Você não enviou nenhum arquivo!';

            $insertLivro = mysqli_query($con, "UPDATE
                                                    `tbl_livros` 
                                                SET 
                                                    `titulo`='$titulo', 
                                                    `autor`='$autor', 
                                                    `preco`='$preco',
                                                    `qtdEstoque` = '$qtdEstoque',
                                                    `image` = '$novoNome'
                                                WHERE id_livro = $id
                                                ");        
    setcookie('msgcookie', 2, time()+2, "/");
    header("Location: ../livros_editar.php?id=$id");   
    exit();
}

//Delete livro
if($action == 'deletarLivros')
{
    if(isset($_GET['id']) ? $id = $_GET['id'] : $id = '');

    $insertLivro = mysqli_query($con, "DELETE FROM `tbl_livros` WHERE id_livro = $id");
                                        
    setcookie('msgcookie', 3, time()+2, "/");
    header("Location: ../livros.php");   
    exit();
}

//Cadastrar Cupom
if($action == 'cadastrarCupom')
{
    if(isset($_POST['livro']) ? $livro = $_POST['livro'] : $livro = '');
    if(isset($_POST['autor']) ?    $autor = $_POST['autor'] : $autor = ''); 
    if(isset($_POST['desconto']) ?  $desconto = $_POST['desconto'] : $desconto = '');
    if(isset($_POST['cupom']) ?  $cupom = $_POST['cupom'] : $cupom = '');
    if(isset($_POST['dataExpCup']) ?  $dataExpCup = $_POST['dataExpCup'] : $dataExpCup = '');

    $insertLivro = mysqli_query($con, "INSERT INTO `tbl_cupons`(`id_livro`, `autor`, `desconto`, `cupom`, `dataExpiracao`) 
                                        VALUES ('$livro','$autor','$desconto', '$cupom', '$dataExpCup')");
                                        
    setcookie('msgcookie', 1, time()+2, "/");
    header('Location: ../cupons.php');   
    exit();
}

//Editar Cupom
if($action == 'editarCupom')
{
    if(isset($_POST['id']) ? $id = $_POST['id'] : $id = '');
    if(isset($_POST['livro']) ? $livro = $_POST['livro'] : $livro = '');
    if(isset($_POST['autor']) ?    $autor = $_POST['autor'] : $autor = ''); 
    if(isset($_POST['desconto']) ?  $desconto = $_POST['desconto'] : $desconto = '');
    if(isset($_POST['cupom']) ?  $cupom = $_POST['cupom'] : $cupom = '');
    if(isset($_POST['dataExpCup']) ?  $dataExpCup = $_POST['dataExpCup'] : $dataExpCup = '');

    
     $insertCupom = mysqli_query($con, "UPDATE
                                            `tbl_cupons` 
                                        SET 
                                            `id_livro`='$livro', 
                                            `autor`='$autor', 
                                            `desconto`='$desconto',
                                            `cupom` = '$cupom',
                                            `dataExpiracao` = '$dataExpCup'
                                        WHERE id_cupom = $id
                                        ");            
    setcookie('msgcookie', 2, time()+2, "/");
    header("Location: ../cupons_editar.php?id=$id");   
    exit();
}

//Delete cupom
if($action == 'deletarCupons')
{
    if(isset($_GET['id']) ? $id = $_GET['id'] : $id = '');

    $deleteCupom = mysqli_query($con, "DELETE FROM `tbl_cupons` WHERE id_cupom = $id");
                                        
    setcookie('msgcookie', 3, time()+2, "/");
    header("Location: ../cupons.php");   
    exit();
}


//Caso nada der certo retorna para index retornando mensagem de erro
else {
    setcookie('msgcookie', 0, time()+2, "/");
    header('Location: index.php');   
    exit();
}


//Caso nada der certo retorna para index retornando mensagem de erro
setcookie('msgcookie', 0, time()+2, "/");
header('Location: index.php');   

mysqli_close($con); //Fechar conexão
?>