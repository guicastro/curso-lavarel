# Anotações Curso Laravel Iniciante

## CoC = Convention over Configuration
Criar o seu projeto utilizando toda a configuração e estrutura proposta pelo template padrão do Laravel, sem modificações

## csrf-token
É uma proteção do Laravel para garantir que o trânsito de informações seja seguro, utilizando um Token, sempre que se envia dados deve-se adicionar este token, por exemplo, como campo hidden de formulário ou variável. O name do campo deve ser "_token"

## Illuminate\Http\Request
Classe padrão do Laravel para processar o conteúdo das variáveis $_POST e $_GET e entregar em forma de objeto, incluir essa classe no início do arquivo, a function pode usar interface "Request $NoeVarRequest" e para retornar os dados utilizar dentro da function $NoeVarRequest->get('NomeCampoForm') ou $NoeVarRequest->NomeCampoForm

## MVC no Laravel
- A pasta padrão de Views do Laravel é em resources/views com os arquivos, que devem ter o mesmo nome da view
- É na pasta de views que se desenha toda a parte que o usuário irá visualizar, HTML, CSS, etc
- É possível passar os valores via Array para a View, com view('NomeView',$variaveis), podendo usar a função nativa do PHP compact(var1, var2, var3...)
- Outra forma de passar variáveis é utilizando o método with da view ->with('nome', $valor)
- Se for usar uma pasta interna para armazenar as views, pode criar a pasta e chamar com view('nomedapasta.nomedaview')
- Para criar um controller pode ser feito pelo php artisan make:controller NomeDoController
- Recomenda-se utilizar o padrão StudlyCaps para nomes de Controllers, Views, Models, etc
- No Controller é que se criam as Actions que irão realizar as ações do módulo, por exemplo.
- Para trabalhar com Controller nas rotas, deve-se chamar o controlle no lugar da function, e a chamada da action tendo o @ como separador, por exemplo Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');
- Para criar um model pode ser feito pelo php artisan make:model NomeDoModel
- O Laravel tem uma inteligência que auxilia quando se cria um padrão de nomes de Models, Controllers e Tabelas no banco de dados. Se criar um Model com o nome de Client será "entendido" que a tabela será clients
- Se não

## Tinker
- Acessível por php artisan tinker, sendo uma ferramenta de terceiros, na categoria de REPL (Read Eval Print Loop)
- Ferramenta de interação entre o Laravel e a Aplicação, utilizando command-line
- Ela simula a Aplicação sendo possível acessar métodos e obter resultados via linha de comando



## Migration
- É o recurso do Laravel para controlar o banco de dados e serve também para controlar alterações. É um ORM que permite manipular DDL do banco via aplicação, inclusive alterções em campos e tabelas, é uma abstração
- Para fazer os comandos de migration, utilizar php artisan migrate e os comandos dentro da pasta database\migrations
- Para criar uma nova tabela execute php artisan make:migrate NOME_DO_MIGRATE --create=NOME_DA_TABELA


## Blade
- Template Engine para interpretar diversas sintaxes do PHP dentro do HTML com melhor forma de leitura
- É utilizado para as Views
- O arquivo da view deve ser .blade.php
- Uma interpolação pode ser feita com {{ $var }} gerando o mesmo resultado de echo $var
- Dentro da interpolação é possível fazer as mesmas coisas que um echo, como por exemplo concatenação, operações aritiméticas, operação ternária, etc
- Não colocar notação HTML dentro da interpolação {{ "<h1>teste</h1>" }}, se houver vai ser convertido para texto como se tivesse utilizando o htmlentities. Para que seja interpretado como HTML é preciso usar {{!! "<h1>teste</h1>" !!}}


## Variáveis .ENV
- Para que seja possível o PHP demonstrar via var_dump o conteúdo da variavel $_ENV é necessário alterar a diretiva variables_order no php.ini adicionando a letra E, por exemplo variables_order="EGPCS"
- Não é necessário modificar a diretiva para o Laravel obter os valores do .env, podendo ser obtido pela função padrão do PHP getenv(NOME_VAR) ou pela função do Laravel env(NOME_VAR)

