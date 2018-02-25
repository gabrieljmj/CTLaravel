Aplicação CRUD com Laravel
--------------------------
Cadastro de pessoa fisíca ou jurídica.
Eu não tinha conhecimento em Laravel, este foi minha primeira aplicação. Espero tê-la feita da melhor maneira.
Quanto ao design, não trabalhei muito nele por conta de estar mais focado na aprendizagem do framework.
Entretanto, como já havia utilizado outros frameworks, principalmente Symfony, não foi difícil me adaptar.
Também, devido ao tempo, não desenvolvi os testes.

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
