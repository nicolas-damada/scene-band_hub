# SCENA

O **SCENA** é um sistema web simples para cadastro, listagem e pesquisa de shows.

O projeto nasceu com a ideia de **fortalecer a cena musical**, facilitando a divulgação de eventos de forma rápida, parecida com uma rede social, mas com foco em shows, bandas, locais e datas.

## Objetivo

Criar uma plataforma simples onde usuários possam cadastrar shows e visualizar eventos publicados no feed.

A proposta principal é manter o sistema fácil de usar, sem formulários complexos e sem excesso de informações.

## Funcionalidades

- Cadastro de usuários
- Login e logout
- Cadastro de shows
- Cadastro de várias bandas por show
- Listagem de shows no feed
- Pesquisa de shows
- Exclusão de shows por usuário administrador

## Tecnologias utilizadas

- PHP
- PostgreSQL
- HTML
- CSS
- PDO para conexão com o banco de dados

## Estrutura básica do projeto

```txt
scena/
├── app/
│   ├── create.php
│   ├── delete.php
│   └── search.php
├── css/
│   └── style.css
├── database/
│   ├── conect.php
│   └── tabelas.sql
├── docs/
│   ├── documentacao.md
│   └── relacionamento.md
├── images/
│   └── logo2.png
├── includes/
│   ├── footer.php
│   ├── functions.php
│   └── header.php
├── login/
│   ├── cadastrar.php
│   ├── login.php
│   ├── logout.php
│   └── verifica.php
└── index.php