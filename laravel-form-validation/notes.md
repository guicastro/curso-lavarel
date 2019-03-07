# Anotações Curso Laravel Formulários

## Model e Migrate
- Criar um Model com Migração php artisan make:model *nome_do_model* -m (já é criado inclusive dentro do pardão de singular/plural)
- Se excluir uma migration (arquivo) ou alterar o nome do arquivo precisa re-gerar o autoload do composer com composer dumpautoload

## Model Factory e Seeder
- Server para realizar testes junto ao Model para facilitar o teste
- Gerado por php artisan make:factory *NomeDaFactory-ex-ClientFactory* --model=App\*NomedoModelReferencia*
- A factory fica em database/factories
- Usa a biblioteca Faker do PHP para gerar os dados de teste
- Preenche dentro do return um array com os nomes dos campos e o que vai retornar de Fake em cada um, usando a biblioteca Faker
- Utilize o tinker para gerar um exemplo de dados com $client = factory(*\App\NomedoModel*::class)->make()
- Utilize o tinker para gerar um exemplo de dados e já salvar no banco de dados com $client = factory(*\App\NomedoModel*::class)->create()
- O Seeder serve para executar as Factories mais facilmente, em especial quando há volume grande de tabelas, cria-se o seeder com php artisan make:seeder *NomedoSeeder*. O nome do seeder é livre, mas adota-se o padrão NomedaTabelaTableSeeder
- Os arquivos dos Seeders ficam em database/seeds e todos os Seeders de tabelas devem ser organizados no DatabaseSeeder, lembrando de organizar os Seeders conforme a sequência de dependências de tabelas (FK)
- Para executar o comando de Seeds para todas as tabelas digite php artisan db:seed. Também pode ser executado em conjunto com o migrate para remover todas as tabelas, recriar e alimentar elas com o comando php artisan migrate:refresh --seed

## Controller
- Uma opção é criar o Controller seguindo uma "convenção sobre configuração" padrão do Laravel transformando em um Controller Resource. Para criar com esse padrão bastar adicionar o --resource, ficando php artisan make:controller Admin/ClientsController --resource
- Quando utilizar o Controller do tipo Resoure na configuração de Rotas pode-se utilizar o Route::resource('nomedarota', 'CaminhoDoController')
- Para ser mais produtivo, recomenda-se utilizar o recurso Mass Assignment que determinar os campos do formulário que sempre serão enviados em uma requisição do tipo create ou save
- No Controller é que são feitos os tratamentos em dados de formulários, por exemplo, inverter data, tratar campos vazios, etc

## Routes
- Adicionar o 'namespace' => 'XXX' onde o XXX é o nome do seu namespace padrão para Controller é forma mais autormatizada de enviar o Namespace de todos no grupo dentro de uma rota, nesse caso não precisa utilizar Admin\ClientsController e sim apenas ClientsController com o Admin no namespace
- Cada rota possui um nome, acessível por php artisan route:list e no Blade é possível criar uma interpolação chamando o nome da roda como href e ele já monta o link completo, utiliza-se {{ route('nomedarota')}}

## Layouts no Blade
- Por conveção recomenda-se criar os layouts base do Laravel dentro da pasta layouts em views
- Existe uma diretiva do Blade de nome @yield que serve para delimitar conteúdo
- No arquivo que vai ter o conteúdo, delimita-se a parte que vai incorporar o @yield com as tags @section('nomedotreco) e @endsection, além disso é necessário incluir o layout original que deve ser feita com @extends('caminho.do.arquivo.layout') e o nome do extends segue o padrão de view pasta/arquivo = pasta.arquivo
- Sempre que possível utilizar um campo de data como tipo date no html5 pois assim a conversão será automática de D/M/Y para Y-M-D

## Validation
- O Laravel possui muitas regras de validação de dados pré-existentes no método validate(), consulte sempre a documentação em https://laravel.com/docs/5.8/validation
- Para um mesmo campo ter várias validações, a separação será por pipe