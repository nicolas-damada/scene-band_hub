CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50),
    email VARCHAR(255),
    senha VARCHAR(255)
);

CREATE TABLE bandas (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cidade VARCHAR(255),
    url TEXT,
    bio TEXT
);

CREATE TABLE shows (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data_show DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    usuario_id INT REFERENCES usuarios(id) ON DELETE SET NULL
);

CREATE TABLE shows_bandas (
    show_id INT REFERENCES shows(id) ON DELETE CASCADE,
    banda_id INT REFERENCES bandas(id) ON DELETE CASCADE,
    PRIMARY KEY (show_id, banda_id)
);

SELECT * FROM usuarios, shows, bandas;