# Trabalhe na Tegra - Loja de livros (carrinho de compras)

By Guilherme Garcia - [Portfolio](https://madebyguilherme.com)

Meu email para dúvidas: guillherme966@gmail.com

Desafío para o programa de estágio na Tegra 2020.

Este projeto foi desenvolvimento em duas áreas distintas com mais explicações abaixo, uma área com a logica do carrinho de compras e a outra para o administrador poder adicionar, editar e remover os livros que serão exibidos.

O Projeto está em PHP + MYSQL;

Para acessar a area administrativa é 'Ex. localhost/trabalhenategra/adm'

Para a área administrativa use:
Email: adm@tegra.com
Senha: 123

## Getting started

Este projeto foi testado e construido em PHP + SQL, então para testar está versão é recomendável utilizar o XAMPP,
ou sinta-se livre para escolher qual desejar.

* Recomendável: PHP 7.2 ou superior
* MySQL (phpMyAdmin): 4.9.1 ou superior;
* VsCode: Para desenvolvimento do projeto.

## Desenvolvimento

Para iniciar os testes ou a clonagem do projeto, é necessário clonar o projeto do GitHub num diretório de sua preferência:

```
cd "diretoria de sua preferencia"
git clone https://github.com/guilhermegarci4/desafioTegra.git
```

```
Acesse os arquivos para mudar as configurações de conexão do banco de dados:

/php/conecta.php
/adm/php/conecta.php
```

## Construção

Para começar a testar o projeto é necessário colocar o arquivo trabalhenategra.sql que está dentro da pasta banco de dados e importar para o seu banco de dados. E após isso é so 'startar' seu servidor php dentro do seu diretório.

## Features

O projeto está desenvolvimento em duas partes:

1. Sendo a primeira dela o E-Commerce de livros podendo visualizar os livros, seus preços e seus autores e com a logica de carrinhos de compras, podendo adicionar e aumentar ou diminuir a quantidade de livros no momento que quiser, remover do carrinho e finalizar um pedido. 

2. A segunda parte é uma área administrativa do site no qual é possível adicionar livros para disponibilizar no ecommerce, informar seus autores, preços e adicionar imagens para esse livro. Editar quaisquer informações do livros e a exclusão pelo seu ID. Adição de Cupom de desconto, informando qual o livro ou o autor, o nome do cupom e qual a data de expiração do mesmo. Em uma primeira tela inicial mostra um relátorio com uns dados do banco, quantos livros foram cadastrados, quantos cupons e quantos pedidos ja foram feito.

## Links

[Para ver este projeto no ar](https://madebyguilherme.com/trabalhenategra)
[Para ver este projeto no ar na area administrativa](https://madebyguilherme.com/trabalhenategra/adm)

Para a área administrativa usa:
Email: adm@tegra.com
Senha: 123




