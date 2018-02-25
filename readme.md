Aplicação CRUD com Laravel
--------------------------
Cadastro de pessoa fisíca ou jurídica

## Dados utilizados para testes
Dados usados foram gerados no site [4Devs](https://www.4devs.com.br).

## jQuery
Não foi utilizado pois acredito que as coisas simples que foram feitas na aplicação não necessitam do framework, que seria uso de meória a toa.

## API
Todo a aplicação roda em cima de uma API própria para requisições via JavaScript.

| Tipo | URI |
|:----|:---|
|Todos|```/api/person/get```|
|Por ID|```/api/person/get/{ID}```|
|Pessoas físicas|```/api/person/get/fisical```|
|Pessoas jurídicas|```/api/person/get/legal```|
