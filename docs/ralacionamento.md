```mermaid
erDiagram
 Usuarios{
        int id pk
        varchar(50) nome
        varchar(50) email
        varchar(13) senha
    }
        SHOWS {
        int id PK
        string titulo
        timestamp data_hora
        text descricao
        int banda_id FK
    }
    Bandas{
            int id pk
            varchar(255) nome
            varchar(255) cidade 
            text bio
            string url
        }