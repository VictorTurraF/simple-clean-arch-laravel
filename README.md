<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel + Docker Compose + Clean Architecture

O objetivo desse projeto é ser uma aplicação com uma única funcionalidade para ser simples implementar um exemplo utilizando a arquitetura limpa. Nesse exemplo em implementei um único caso de uso (funcionalidade) e fiz uma implementação para ser possível interagir com ele através de um endpoint web (rest).

Esse projeto possui apenas uma funcionalidade:
- Cadastrar vendedores

Onde cada vendedor possui apenas os seguintes campos:
- Nome
- Email

O domínio da aplicação (core) terá apenas um único caso de uso:
- CreateSellerUseCase
> O caso de uso corresponde a única funcionalidade

Os serviços externos se resumem aos `Repositories`, que fazer o acesso a dados através de interfaces
