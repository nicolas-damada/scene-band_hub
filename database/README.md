# Banco de dados do SCENA

- `conect.php`: configuração da conexão PHP/PDO com o PostgreSQL.
- `tabelas atuais.sql`: único script oficial de criação das tabelas `usuarios`, `shows` e `shows_bandas`.
- `dados_teste.sql`: dados e consulta de exemplo, opcionais para desenvolvimento.

Para uma instalação nova, execute `tabelas atuais.sql` em um banco vazio. Esse script cria a estrutura sem inserir usuários ou shows de teste. Ele não é uma migração para bancos existentes.

Em desenvolvimento, execute `dados_teste.sql` após a criação das tabelas, uma única vez por banco. A conta criada é `teste@scena.com`, com senha `ScenaTeste123!` e sem permissão de administrador. O script utiliza os IDs retornados pelo banco, sem depender de valores fixos. Se esse e-mail já existir, a inserção falha e a transação é desfeita.

O modelo armazena os nomes das bandas diretamente em `shows_bandas.nome_banda`. Não há uma tabela independente `bandas`; o antigo arquivo `CREATE TABLE usuarios.sql` foi removido por representar outro modelo.

O campo `usuarios.is_admin` tem padrão `FALSE` no banco consultado. Para novas instalações, o script também define `NOT NULL`, conforme a definição acordada. O banco existente aceita nulo nesse campo e não foi modificado nesta atualização dos arquivos.
