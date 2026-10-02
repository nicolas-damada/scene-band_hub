
-- =====================================
-- SCENA - GERENCIADOR DE SHOWS
-- =====================================


-- 1. TABELA DE USUÁRIOS

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);


-- 2. TABELA DE SHOWS

CREATE TABLE shows (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data_show DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,

    usuario_id INT,

    FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE SET NULL
);


-- 3. TABELA DE BANDAS DOS SHOWS

CREATE TABLE shows_bandas (
    show_id INT NOT NULL,
    nome_banda VARCHAR(255) NOT NULL,

    PRIMARY KEY (show_id, nome_banda),

    FOREIGN KEY (show_id)
        REFERENCES shows(id)
        ON DELETE CASCADE
);



--testado o insert nas tabelas

INSERT INTO usuarios (nome, email, senha)
VALUES ('Teste', 'teste@scena.com', 'senha_teste')
RETURNING id;



INSERT INTO shows
(titulo, data_show, endereco, usuario_id)

VALUES
('Rock Festival', '2026-12-10', 'São Paulo', 1)

RETURNING id;


INSERT INTO shows_bandas
(show_id, nome_banda)

VALUES
(1, 'Metallica'),
(1, 'Slipknot'),
(1, 'Iron Maiden');



--select pra testar né pae

SELECT
    s.titulo,
    s.data_show,
    b.nome_banda

FROM shows s

INNER JOIN shows_bandas b
    ON s.id = b.show_id;