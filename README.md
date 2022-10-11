# Api Laravel com front SPA Single Page Aplication VUE js!

Api Laravel para listagem de Estados e Cidades.


# Instalação

Atualizar pacotes do laravel 

    composer update

Fazer Migração do Banco de dados 

    php artisan migrate

Inserir registros na tabela estados

    php artisan db:seed Estado

Inserir registros na tabela cidades

    php artisan db:seed Cidade


Atualização do Vue 

    npm install


## Execute o servidor

    php artisan serve

    npm run dev

## Rotas API

**Login** 
Metod: POST
Header: Accept:application/json
body: email, password

[http://127.0.0.1:8000/api/login](http://127.0.0.1:8000/api/login)

**Register**
Metod: POST
Header: Content-Type/x-www-form-urlencoded
body: email, password, c_password

[http://127.0.0.1:8000/api/register](http://127.0.0.1:8000/api/register)

**Listar estados** 

Metod: GET
Header: Accept:application/json
query: ?fields={nomes da colunas a serem filtraas separads por virgula}

[http://127.0.0.1:8000/api/v1/estado/?fields=id,nome,sigla](http://127.0.0.1:8000/api/v1/estado/?fields=id,nome,sigla)

Busca concatenando filtro e condição
Metod: GET
Header: Accept:application/json
query: ?fields={nomes da colunas a serem filtraas separads por virgula} & &coditions={coluna}:=:{Informação a ser pesquisada} ( Pode se passar os parametros de buscas do where in, not in, like etc) 
[http://127.0.0.1:8000/api/estado/?fields=nome,sigla&coditions=nome:=:Acre](http://127.0.0.1:8000/api/estado/?fields=nome,sigla&coditions=nome:=:Acre)

**Atualizar estado**

Metod: POST
Header: Accept:application/json, Content-Type/x-www-form-urlencoded
query: id do estado

[http://127.0.0.1:8000/api/v1/estado/30](http://127.0.0.1:8000/api/v1/estado/30)

**Excluir Estado**

Metod: POST
Header: Accept:application/json
query: id do estado

[http://127.0.0.1:8000/api/v1/estado/28](http://127.0.0.1:8000/api/v1/estado/28)


**Listar cidades** 

Metod: GET
Header: Accept:application/json
query: ?fields={nomes da colunas a serem filtraas separads por virgula}

[http://127.0.0.1:8000/api/v1/cidade/?fields=id,nome,sigla](http://127.0.0.1:8000/api/v1/cidade/?fields=id,nome,sigla)

Busca concatenando filtro e condição
Metod: GET
Header: Accept:application/json
query: ?fields={nomes da colunas a serem filtraas separads por virgula} & &coditions={coluna}:=:{Informação a ser pesquisada} ( Pode se passar os parametros de buscas do where in, not in, like etc) 
[http://127.0.0.1:8000/api/cidade/?fields=nome,sigla&coditions=nome:=:Uberaba](http://127.0.0.1:8000/api/cidade/?fields=nome,sigla&coditions=nome:=:Uberaba)

**Atualizar cidade**

Metod: POST
Header: Accept:application/json, Content-Type/x-www-form-urlencoded
query: id da cidade

[http://127.0.0.1:8000/api/v1/cidade/30](http://127.0.0.1:8000/api/v1/cidade/30)

**Excluir Cidade**

Metod: POST
Header: Accept:application/json
query: id do cidade

[http://127.0.0.1:8000/api/v1/cidade/28](http://127.0.0.1:8000/api/v1/cidade/28)

All your files and folders are presented as a tree in the file explorer. You can switch from one to another by clicking a file in the tree.

## Dificuldades encontradas

Como não tive experiencia anterior com VUE js, tive um pouco de dificuldade em entender a logica de roteamento e inclusão de requisições.

## API Laravel

Ficou pendente a proteção por token via header pois não consegui implementar no VUE js

## Export a file

You can export the current file by clicking **Export to disk** in the menu. You can choose to export the file as plain Markdown, as HTML using a Handlebars template or as a PDF.


# Melhorias a serem feitas

 - [ ] Proteção por token no header da api
 - [ ] Melhoria dos Filtros de Cidade e Estado
