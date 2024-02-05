<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel + Docker Compose + Code Base

Folow the steps below to configure a local development environment:

Clone this repository:
```bash
git clone https://github.com/VictorTurraF/laravel-docker-compose-template
```

Copy `.env.local.docker` file to `.env` file:
```bash
cp .env.local.docker .env
```

Fazer o build da imagem do docker com:
```bash
docker compose build app --build-arg="uid=$(id -u)"
```

Subir os serviços:
```bash
docker compose up -d
```

Instalar as dependencias:
```bash
docker compose exec app composer install
```

Setar a chave da aplicação:
```bash
docker compose exec app php artisan key:generate
```

Rodar as migrations:
> Rode se for um projeto do zero e caso não queira importar um banco de dados com um dump.
```bash
docker compose exec app php artisan migrate
```

### Dump do banco de dados:

Dump do imobiliarias do grupo kaza

Copiar arquivo para dentro do container

```bash
docker cp /path/to/machine.sql <container_id_mysql>:/
```

Entre no container com:

```bash
docker compose exec db bash
```

Importe o arquivo `.sql` para o banco de dados configurado no .env:

```bash
mysql -u root -p'<senha>' <nome_do_db> < dump-imobiliarias-api-local.sql
```

### Testando a conexão:

```bash
docker compose exec app bash php artisan tinker

> Property::first()
```

Se aparecer informações é porque a conexão está ok. Caso contrário irá aparecer algum erro.

### Testando a aplicação:

Obetenha o **ID** da imobiliária:

```bash
docker compose exec app php artisan tinker

> RealEstate::where('slug', 'grupo-kaza')->pluck('id')->first()
```
