# Desafio sistema agendamento de consultas médicas

## Instruções gerais

- Alterei a porta 80 do projeto para 8000. Pra evitar conflito com algum serviço rodando localmente na máquina de quem for testar.
- Criei uma Seed para cidades (fiz uma seleção de capitais, mas uma API publica poderia ser usada também), executar com o comando: 

```sh
 ./vendor/bin/sail artisan db:seed --class=CitySeeder
```
- Recomendo utilizar o clone da **collection do postman** que está localizado na pasta `/doc` do projeto, pois adicionei alguns prefixos de url a mais. A baixo segue as urls do projeto:

| Método    | Rota                                  | Ação                                                         |
|-----------|---------------------------------------|--------------------------------------------------------------|
| POST      | /api/auth/login                       | AuthController@login                                         |
| POST      | api/auth/logout                       | AuthController@logout                                        |
| POST      | api/auth/refresh                      | AuthController@refresh                                       |
| POST      | api/auth/register                     | AuthController@register                                      |
| GET       | api/auth/user                         | AuthController@getUser                                       |
| GET       | api/cidades                           | CityController@index                                         |
| GET       | api/cidades/{id_cidade}/medicos       | DoctorController@getDoctorsByCity                            |
| GET       | api/medicos                           | DoctorController@index                                       |
| POST      | api/medicos                           | DoctorController@create                                      |
| POST      | api/medicos/consulta                  | MedicalConsultationController@create                         |
| GET       | api/medicos/consulta                  | MedicalConsultationController@index                          |
| GET       | api/medicos/{id_medico}/pacientes     | MedicalConsultationController@getPatients                    |
| POST      | api/pacientes                         | PatientController@create                                     |
| PUT       | api/pacientes/{id_paciente}           | PatientController@update                                     |

P.S. Qualquer dúvida estou a disposição, via linkedin `https://www.linkedin.com/in/kaetaen`
