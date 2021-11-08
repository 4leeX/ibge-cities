
## Endpoints

| Método   | Action                  | Ex                                                          |
| -------- | ----------------------- | ----------------------------------------------------------- |
| GET      | `'getAllCitiesFromApi'` | 'Lista todas as cidades no banco de dados'                  |
| POST     | `"importCities"`        | "Importa as cidades de um estado(Pi) para o banco de dados" |
| resource | `'index/store/destroy'` | 'Crud de endereços, exceto updade e show'                   |
| POST     | `"update"`              | "Atualiza um endereço"                                      |

## Validações
Feitas em Requests

## DB
* Crie sua database e no arquivo '.env', altere com seus dados: DB_DATABASE = ExemploDB, DB_USERNAME = ExemploRoot .
* Criação do banco de dados:
    execute o camando: php artisan migrate, ou php artisan migrate --seed (para criar tabelas populadas).

* MySQL

## Testes
* Sqlite

