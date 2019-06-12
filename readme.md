<p align="center"><img width="250" src="https://plugg.to/wp-content/uploads/2016/04/Mobly-300x203.png"></p>

## API Rest Test

###Conceitos Utilizados
- Rest API
- Repository Pattern
- Service Layer Pattern
- IOC - Inversion of Control
- Hexagonal Architecture

###Tecnologias e Ferramentas
- Docker Container(Nginx, MySQL)
- PHP 7.3 FPM
- Laravel 5.8

###Deploy
- Clonar o repositorio
- Rodar o docker-compose.yml para instanciar o ambiente
- Acessar o Container "mysql" com: "docker exec -ti mysql bash"
- Acessar a pasta "/opt/database"
- Executar "mysql -uroot -proot " para acessar o terminal mysql
- Executar "source db.sql; " para criar DB, Usuario e permissões
- Sair do Container "mysql" com "exit";
- Sair do Container "mysql" com "exit";
- Acessar o Container com: "docker exec -ti nginx bash"
- Acessar a pasta "/app"
- Executar "composer install"
- Executar "php artisan migrate"
- Executar "cp vhost.conf /opt/docker/etc/nginx" para copiar o arquivo de vhost com o dominio mobly.docker
- Executar "service nginx restart" para reiniciar o servidor web
- Adicionar "172.0.0.2 mobly.docker" no arquivo de hosts conforme o sistema operacional.

###URL
- http://mobly.docker ira listas todos os endpoints disponiveis

###PHPUnitTest
- Reproduzido os teste conforme collection do postman enviado como requisito
- Acessar o Container com: "docker exec -ti nginx bash"
- Acessar a pasta "/app"
- Executar 'vendor/bin/phpunit'

###Plus
- implementação de um endpoint de "search" dinamico
```json
{
	"params" : [
		{
			"field" : "last_name",
			"value" : "da Silva"
		},
                {
                    "field" : "xxxxxxx",
                    "value" : "xxxxxxxx"
                }
	]
}
```
- Utilizar o header "Accept: application/json" para receber possiveis mensagens de erro no formato:
```json
{
    "data": [],
    "success": false,
    "messages": [
        "error message"
    ]
}
```


## Responsavel

Mateus Macedo Dos Anjos <macedodosanjosmateus@gmail.com>
