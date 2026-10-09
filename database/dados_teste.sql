-- SCENA - DADOS E CONSULTA DE EXEMPLO
-- Opcional: executar somente em um banco de desenvolvimento/testes,
-- após a criação das tabelas. Executar uma única vez por banco.
-- Conta de exemplo: teste@scena.com / ScenaTeste123!
-- A senha abaixo é um hash gerado com password_hash() do PHP.

BEGIN;

-- RETURNING repassa os IDs gerados sem presumir que sejam iguais a 1.
WITH usuario_teste AS (
    INSERT INTO usuarios (nome, email, senha)
    VALUES (
        'Teste',
        'teste@scena.com',
        '$2y$12$HvIKwpbjmOjHjuYy15StIe9bB72LIQoGKciXG9g3gMAPtANE/H4XW'
    )
    RETURNING id
), show_teste AS (
    INSERT INTO shows (titulo, data_show, endereco, usuario_id)
    SELECT 'Rock Festival', DATE '2026-12-10', 'São Paulo', id
    FROM usuario_teste
    RETURNING id
)
INSERT INTO shows_bandas (show_id, nome_banda)
SELECT show_teste.id, bandas.nome_banda
FROM show_teste
CROSS JOIN (
    VALUES ('Metallica'), ('Slipknot'), ('Iron Maiden')
) AS bandas(nome_banda);

COMMIT;

-- Consulta de exemplo: eventos e bandas participantes.
SELECT
    s.titulo,
    s.data_show,
    b.nome_banda
FROM shows s
INNER JOIN shows_bandas b
    ON s.id = b.show_id
ORDER BY s.data_show, s.id, b.nome_banda;
