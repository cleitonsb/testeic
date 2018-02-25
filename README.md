# testeic

##Teste admissional IC Comunicações

Atividades desenvolvidas como teste proposto pela IC Comunicações

Utilizei o Zend Framework 3 e banco de dados MySQL. A escolha pelo ZF3 foi para demostrar meus conhecimentos no mesmo, pois se a intenção é desenvolver algo simples como o teste proposto, não justificaria o uso de um framework. 

Com o ZF3, a estrutura utilizado no projeto foi o padrão MVC, orientado a objeto (POO) e orientado a eventos (POE).

A modelagem do banco de dados foi realizada utilizando a ferramenta MySQL Workbench, como arquivo original se encontra na pasta /public/arquivos, junto com o script SQL. O enunciado pedia a criação de apenas uma tabela, porém criei 2 tabelas (games e players) para demostrar o uso de relacionamento.

Para a folha de estilo utilizei o pré-processador SASS para a otimização do CSS.


**Task1**

Na atividade 1 realizei a leitura e tratamento dos dados do arquivo games.log, pupulei um array com os dados obtidos e exibi na tela esses dados, no formato proposto. A saida dessa atividade poderia ser outro arquivo, json, xml, gravação em banco de dados, etc. Reutilizei a mesma função nas atividades 2 e 3. 

**Task2**
 
Com o parse que criei na atividade 1, alimentei as 2 tabelas do banco de dados, games e players.

**Task3**

Como os dados das tabelas, montei um rank ordenado pelo número de kills de cada player. Fiz exatamente como solicitava o enunciado, porém podiamos melhorar, removendo o botão **buscar** e realizando a busca dinâmica por ajax.

**Plus**
 
Ainda utilizado o parse da atividade 1, gerei um novo relatório exibindo dados do número de mortes agrupado por tipo, separando por partida.


###Instalação

Para executar a instalação, clone esse git ou faça o download e copie para a pasta raiz do servidor. É necessário ativar o mod_rewrite do apache para possibilitar a reescrita de URL. Após isso execute o script SQL que se encontra na pasta /public/arquivos.

###Execução

Para a melhor visualização, eu separei as atividades em links distintos

Após a instalação, as atividades podem ser acessadas pelo endereço:  

```
Task1: http://<endereco-local>/task1
Task1: http://<endereco-local>/task2
Task3: http://<endereco-local>/task3 (Necessário a execução do Task2, para popular a tabela)
Plus: http://<endereco-local>/plus
```

Para facilitar a execução, eu fiz a implantação do resultado deste teste no endereço http://testeic.casolucoes.com.br, então as atividades podem ser acessadas nos links abaixo:

[Task1](http://testeic.casolucoes.com.br/task1)

[Task2](http://testeic.casolucoes.com.br/task2)

[Task3](http://testeic.casolucoes.com.br/task3) (Necessário a execução do Task2, para popular a tabela)

[Plus](http://testeic.casolucoes.com.br/plus)
