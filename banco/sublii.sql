DROP DATABASE IF EXISTS subli;
CREATE DATABASE subli;
USE subli;

CREATE TABLE genero(
	cd_genero INT,
    nm_genero VARCHAR(200),
    CONSTRAINT pk_genero PRIMARY KEY (cd_genero)
);
 
CREATE TABLE editora(
	cd_editora INT,
	nm_editora VARCHAR(200),
	CONSTRAINT pk_editora PRIMARY KEY (cd_editora)
);

CREATE TABLE idioma(
	cd_idioma INT,
	nm_idioma VARCHAR(200),
	CONSTRAINT pk_idioma PRIMARY KEY (cd_idioma)
);

CREATE TABLE colecao(
	cd_colecao INT,
	nm_colecao VARCHAR(200),
	CONSTRAINT pk_colecao PRIMARY KEY (cd_colecao)
);

CREATE TABLE assunto(
	cd_assunto INT,
	nm_assunto VARCHAR(200),
	CONSTRAINT pk_assunto PRIMARY KEY (cd_assunto)
);

CREATE TABLE autor(
	cd_autor INT,
    nm_autor VARCHAR(200),
    CONSTRAINT pk_autor PRIMARY KEY (cd_autor)
);

CREATE TABLE livro(
	cd_livro INT,
	nm_livro  VARCHAR(200),
	cd_editora INT,
    cd_idioma INT,
    cd_colecao INT,
    ds_sinopse TEXT,
	CONSTRAINT pk_livro PRIMARY KEY (cd_livro), 
	CONSTRAINT fk_editora FOREIGN KEY (cd_editora) REFERENCES editora(cd_editora),
    CONSTRAINT fk_idioma FOREIGN KEY (cd_idioma) REFERENCES idioma(cd_idioma),
    CONSTRAINT fk_colecao FOREIGN KEY (cd_colecao) REFERENCES colecao(cd_colecao)
);

CREATE TABLE biblioteca(
	cd_biblioteca INT,
	nm_biblioteca VARCHAR(200),
	nm_endereco VARCHAR(200),
	CONSTRAINT pk_biblioteca PRIMARY KEY (cd_biblioteca)
);


CREATE TABLE bibliotecario(
	cd_bibliotecario INT,
	nm_bibliotecario VARCHAR(200),
    nm_senha VARCHAR(64),
    cd_registro VARCHAR(10),
	CONSTRAINT pk_bibliotecario PRIMARY KEY (cd_bibliotecario)
);

CREATE TABLE leitor(
	cd_email VARCHAR(200),
	nm_leitor VARCHAR(200),
    cd_cpf VARCHAR (11),
    cd_telefone VARCHAR (11),
    ic_comprovante_residencia TINYINT,
    nm_senha VARCHAR(64),
	dt_nascimento VARCHAR(200),
    nm_endereco VARCHAR(200),
    cd_cep VARCHAR(8),
	CONSTRAINT pk_leitor PRIMARY KEY (cd_email)
);


CREATE TABLE evento(
	nm_evento VARCHAR(200),
	cd_evento INT,
	dt_evento DATETIME,
    ds_evento TEXT,
    cd_biblioteca INT,
    cd_email VARCHAR(200),
    ic_confirmado TINYINT,
	CONSTRAINT pk_evento PRIMARY KEY (cd_evento),
    CONSTRAINT fk_leitor FOREIGN KEY (cd_email) REFERENCES leitor(cd_email),
    CONSTRAINT fk_biblioteca FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca)
);


CREATE TABLE exemplar(
	cd_livro INT,
    cd_biblioteca INT,
    cd_exemplar INT,
    dt_insercao DATETIME,
    ic_reservado TINYTEXT,
    CONSTRAINT pk_exemplar PRIMARY KEY (cd_exemplar),
	CONSTRAINT fk_biblioteca_livro FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca),
    CONSTRAINT fk_livro_biblioteca FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
);

CREATE TABLE doacao (
	cd_doacao INT,
    cd_livro INT,
    cd_biblioteca INT,
    cd_email VARCHAR(200),
    ic_aprovado TINYINT,
    CONSTRAINT pk_doacao PRIMARY KEY (cd_doacao),
    CONSTRAINT fk_biblioteca_doacao FOREIGN KEY (cd_biblioteca) REFERENCES  biblioteca(cd_biblioteca),
    CONSTRAINT fk_livro_doacao FOREIGN KEY (cd_livro) REFERENCES  livro(cd_livro),
    CONSTRAINT  fk_email_leitor_doacao FOREIGN KEY (cd_email) REFERENCES leitor(cd_email)
);

CREATE TABLE emprestimo(
	cd_emprestimo INT,
	dt_emprestimo DATETIME,
    dt_devolucao_esperada DATETIME,
	dt_devolucao DATETIME,
    cd_email VARCHAR(200),
    cd_livro INT,
    cd_biblioteca INT,
    CONSTRAINT fk_leitor_emprestimo FOREIGN KEY (cd_email) REFERENCES leitor (cd_email),
    CONSTRAINT fk_livro_emprestimo FOREIGN KEY (cd_livro) REFERENCES livro (cd_livro),
	CONSTRAINT fk_biblioteca_emprestimo FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca (cd_biblioteca),
	CONSTRAINT pk_emprestimo PRIMARY KEY (cd_emprestimo)
);

CREATE TABLE reserva(
	cd_reserva INT,
	dt_reserva DATETIME,
    cd_email VARCHAR(200),
    cd_exemplar INT,
    CONSTRAINT fk_leitor_reserva FOREIGN KEY (cd_email) REFERENCES leitor(cd_email),
    CONSTRAINT fk_exemplar_reserva FOREIGN KEY (cd_exemplar) REFERENCES exemplar (cd_exemplar),
	CONSTRAINT pk_reserva PRIMARY KEY (cd_reserva)
);


CREATE TABLE bibliotecario_biblioteca(
	cd_bibliotecario INT,
    cd_biblioteca INT,
    CONSTRAINT pk_bibliotecario_biblioteca PRIMARY KEY (cd_bibliotecario, cd_biblioteca),
	CONSTRAINT fk_bibliotecario_biblioteca FOREIGN KEY (cd_bibliotecario) REFERENCES bibliotecario(cd_bibliotecario),
    CONSTRAINT fk_biblioteca_bibliotecario FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca)
);


CREATE TABLE assunto_livro(
	cd_livro INT,
    cd_assunto INT,
    CONSTRAINT pk_assunto_livro PRIMARY KEY (cd_livro, cd_assunto),
	CONSTRAINT fk_assunto_livro FOREIGN KEY (cd_assunto) REFERENCES assunto(cd_assunto),
    CONSTRAINT fk_livro_assunto FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
);

CREATE TABLE autor_livro(
	cd_livro INT,
    cd_autor INT,
    CONSTRAINT pk_livro_autor PRIMARY KEY (cd_livro, cd_autor),
	CONSTRAINT fk_autor_livro FOREIGN KEY (cd_autor) REFERENCES autor(cd_autor),
    CONSTRAINT fk_livro_autor FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
);

CREATE TABLE genero_livro(
	cd_livro INT,
    cd_genero INT,
	CONSTRAINT pk_livro_genero PRIMARY KEY (cd_livro, cd_genero),
    CONSTRAINT fk_livro_genero FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro),
	CONSTRAINT fk_genero FOREIGN KEY (cd_genero) REFERENCES genero(cd_genero)
);

/*
CREATE TABLE favorito(
    cd_livro INT,
    cd_email_leitor INT,
    CONSTRAINT pk_livro PRIMARY KEY (cd_livro),
    CONSTRAINT fk_email_leitor_livro FOREIGN KEY (cd_email_leitor) REFERENCES leitor(cd_email_leitor)
);

CREATE TABLE favorito_leitor(
	cd_livro INT,
    cd_email_leitor INT,
    CONSTRAINT pk_livro_livro PRIMARY KEY (cd_livro, cd_email_leitor),
	CONSTRAINT fk_email_leitor FOREIGN KEY (cd_email_leitor) REFERENCES leitor(cd_email_leitor),
    CONSTRAINT fk_cd_livro FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
);

/*CREATE TABLE favorito(
    cd_livro INT,
    cd_email VARCHAR(200),
	CONSTRAINT pk_favorito PRIMARY KEY (cd_livro, cd_email),
    CONSTRAINT fk_livro FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro),
	CONSTRAINT fk_leitor FOREIGN KEY (cd_email) REFERENCES leitor(cd_email)
);*/



/*Leitores*/
INSERT INTO leitor VALUES ('pedro.favoritos@gmail.com', 'Pedro', '59433067850', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado', '00000000');
INSERT INTO leitor VALUES ('pedro@gmail.com', 'Pedro Miguel', '59433067852', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado', '00000000');
INSERT INTO leitor VALUES ('lucas@gmail.com', 'Lucas', '59433067855', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado', '00000000');
INSERT INTO leitor VALUES ('caua@gmail.com', 'Cauã', '59433097850', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado', '00000000');

/*Generos*/
INSERT INTO genero VALUES (1, 'Ficção');
INSERT INTO genero VALUES (2, 'Fantasia');
INSERT INTO genero VALUES (3, 'Romance');
INSERT INTO genero VALUES (4, 'Mistério');
INSERT INTO genero VALUES (5, 'Terror');
INSERT INTO genero VALUES (6, 'História');
INSERT INTO genero VALUES (7, 'Ciência');
INSERT INTO genero VALUES (8, 'Autoajuda');
INSERT INTO genero VALUES (9, 'Biografia');
INSERT INTO genero VALUES (10, 'Aventura');

/*Autores*/
INSERT INTO autor VALUES (1, 'Machado de Assis');
INSERT INTO autor VALUES (2, 'Clarice Lispector');
INSERT INTO autor VALUES (3, 'José de Alencar');
INSERT INTO autor VALUES (4, 'Monteiro Lobato');
INSERT INTO autor VALUES (5, 'Graciliano Ramos');
INSERT INTO autor VALUES (6, 'Carlos Drummond de Andrade');
INSERT INTO autor VALUES (7, 'Cecília Meireles');
INSERT INTO autor VALUES (8, 'Jorge Amado');
INSERT INTO autor VALUES (9, 'Lygia Fagundes Telles');
INSERT INTO autor VALUES (10, 'João Cabral de Melo Neto');

/*Assuntos*/
INSERT INTO assunto VALUES (1, 'Literatura Brasileira');
INSERT INTO assunto VALUES (2, 'Psicologia');
INSERT INTO assunto VALUES (3, 'Filosofia');
INSERT INTO assunto VALUES (4, 'Tecnologia');
INSERT INTO assunto VALUES (5, 'Educação');
INSERT INTO assunto VALUES (6, 'Saúde');
INSERT INTO assunto VALUES (7, 'Religião');
INSERT INTO assunto VALUES (8, 'Política');
INSERT INTO assunto VALUES (9, 'Economia');
INSERT INTO assunto VALUES (10, 'Ecologia');

/*Editoras*/
INSERT INTO editora VALUES (1, 'Editora Top');
INSERT INTO editora VALUES (2, 'Editora Alfa');
INSERT INTO editora VALUES (3, 'Editora Beta');
INSERT INTO editora VALUES (4, 'Editora Gama');
INSERT INTO editora VALUES (5, 'Editora Delta');
INSERT INTO editora VALUES (6, 'Editora Omega');
INSERT INTO editora VALUES (7, 'Editora Nova Era');
INSERT INTO editora VALUES (8, 'Editora Saber');
INSERT INTO editora VALUES (9, 'Editora Horizonte');
INSERT INTO editora VALUES (10, 'Editora Luz');

/*Idiomas*/
INSERT INTO idioma VALUES (1, 'Inglês');
INSERT INTO idioma VALUES (2, 'Português');
INSERT INTO idioma VALUES (3, 'Espanhol');
INSERT INTO idioma VALUES (4, 'Francês');
INSERT INTO idioma VALUES (5, 'Alemão');
INSERT INTO idioma VALUES (6, 'Italiano');
INSERT INTO idioma VALUES (7, 'Japonês');
INSERT INTO idioma VALUES (8, 'Chinês');
INSERT INTO idioma VALUES (9, 'Russo');
INSERT INTO idioma VALUES (10, 'Árabe');

/*Coleções*/
INSERT INTO colecao VALUES (1, 'Parangolé');
INSERT INTO colecao VALUES (2, 'Aurora');
INSERT INTO colecao VALUES (3, 'Luz do Saber');
INSERT INTO colecao VALUES (4, 'Infantojuvenil');
INSERT INTO colecao VALUES (5, 'Clássicos do Mundo');
INSERT INTO colecao VALUES (6, 'Científica Moderna');
INSERT INTO colecao VALUES (7, 'História Viva');
INSERT INTO colecao VALUES (8, 'Ficção Sem Limites');
INSERT INTO colecao VALUES (9, 'Mundo Animal');
INSERT INTO colecao VALUES (10, 'Arte e Cultura');


/*Bibliotecas*/
INSERT INTO biblioteca VALUES (1, 'Parangolé','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (2, 'Aurora','Cauã Nunes da Silva');
INSERT INTO biblioteca VALUES (3, 'Luz do Saber','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (4, 'Infantojuvenil','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (5, 'Clássicos do Mundo','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (6, 'Científica Moderna','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (7, 'História Viva','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (8, 'Ficção Sem Limites','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (9, 'Mundo Animal','Rua Lucas Alcoforado');
INSERT INTO biblioteca VALUES (10, 'Arte e Cultura','Rua Lucas Alcoforado');


/*Eventos*/
INSERT INTO evento VALUES ('Divulgação do meu Livro', 1,NOW(), 'SHBJHSDAUOHAFSIL', 1,'pedro.favoritos@gmail.com', NULL);
INSERT INTO evento VALUES ('Leitura de Livros de Suspense', 2,NOW(), 'SHBJHSDAUOHAFSIL', 10,'pedro.favoritos@gmail.com', NULL);

/* Livro 1 */
INSERT INTO livro VALUES (1, 'Livro Top', 3, 8, 10,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (1, 1);
INSERT INTO autor_livro VALUES (1, 5);
INSERT INTO autor_livro VALUES (1, 6);
INSERT INTO genero_livro VALUES (1, 7);

/* Livro 2 */
INSERT INTO livro VALUES (2, 'Vidas Secas', 2, 5, 7,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (2, 4);
INSERT INTO autor_livro VALUES (2, 2);
INSERT INTO genero_livro VALUES (2, 7);

/* Livro 3 */
INSERT INTO livro VALUES (3, 'Ruído Branco', 5, 4, 9,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (3, 3);
INSERT INTO autor_livro VALUES (3, 6);
INSERT INTO genero_livro VALUES (3, 3);

/* Livro 4 */
INSERT INTO livro VALUES (4, 'Pelas Entranhas', 1, 2, 3,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (4, 6);
INSERT INTO autor_livro VALUES (4, 1);
INSERT INTO genero_livro VALUES (4, 3);

/* Livro 5 */
INSERT INTO livro VALUES (5, 'Morangos Mofados', 4, 3, 1,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (5, 5);
INSERT INTO autor_livro VALUES (5, 9);
INSERT INTO genero_livro VALUES (5, 10);

/* Livro 6 */
INSERT INTO livro VALUES (6, 'A Visão das Plantas', 6, 6, 4,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (6, 6);
INSERT INTO autor_livro VALUES (6, 8);
INSERT INTO genero_livro VALUES (6, 9);

/* Livro 7 */
INSERT INTO livro VALUES (7, 'O Pequeno Princípe', 7, 1, 5,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (7, 7);
INSERT INTO autor_livro VALUES (7, 9);
INSERT INTO genero_livro VALUES (7, 10);

/* Livro 8 */
INSERT INTO livro VALUES (8, 'Divina Comédia', 8, 7, 2,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (8, 10);
INSERT INTO autor_livro VALUES (8, 9);
INSERT INTO genero_livro VALUES (8, 10);

/* Livro 9 */
INSERT INTO livro VALUES (9, 'O Chamado de Chutullu', 9, 10, 6,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (9, 10);
INSERT INTO autor_livro VALUES (9, 4);
INSERT INTO genero_livro VALUES (9, 3);

/* Livro 10 */
INSERT INTO livro VALUES (10, 'Vivendo uma Vida Autentica', 10, 9, 8,'SINOPSE AAAAAAAAA');
INSERT INTO assunto_livro VALUES (10, 2);
INSERT INTO autor_livro VALUES (10, 1);
INSERT INTO genero_livro VALUES (10, 1);


/*Favoritos
INSERT INTO  favorito VALUES (1, 'pedro.favoritos@gmail.com');*/


/*Exemplares*/
INSERT INTO exemplar VALUES (1, 2, 1, NOW(), false);
INSERT INTO exemplar VALUES (9, 1, 2, NOW(), false);
INSERT INTO exemplar VALUES (4, 6, 3, NOW(), false);
INSERT INTO exemplar VALUES (2, 10, 4, NOW(), false);
INSERT INTO exemplar VALUES (7, 3, 5, NOW(), false);
INSERT INTO exemplar VALUES (6, 4, 6, NOW(), false);
INSERT INTO exemplar VALUES (1, 9, 7, NOW(), false);
INSERT INTO exemplar VALUES (5, 2, 8, NOW(), false);
INSERT INTO exemplar VALUES (8, 5, 9, NOW(), false);
INSERT INTO exemplar VALUES (10, 1, 10, NOW(), false);
INSERT INTO exemplar VALUES (2, 8, 11, NOW(), false);
INSERT INTO exemplar VALUES (4, 7, 12, NOW(), false);
INSERT INTO exemplar VALUES (6, 3, 13, NOW(), false);
INSERT INTO exemplar VALUES (9, 6, 14, NOW(), false);
INSERT INTO exemplar VALUES (3, 10, 15, NOW(), false);
INSERT INTO exemplar VALUES (7, 1, 16, NOW(), false);
INSERT INTO exemplar VALUES (1, 5, 17, NOW(), false);
INSERT INTO exemplar VALUES (8, 2, 18, NOW(), false);
INSERT INTO exemplar VALUES (10, 4, 19, NOW(), false);
INSERT INTO exemplar VALUES (5, 9, 20, NOW(), false);
INSERT INTO exemplar VALUES (3, 7, 21, NOW(), false);

/*Bibliotecarios*/
INSERT INTO bibliotecario VALUES (1,'LABUBU','AAAAA','BBB');
INSERT INTO bibliotecario_biblioteca VALUES (1,1);


/*Doações*/
INSERT INTO doacao VALUES (1,2,2,'pedro.favoritos@gmail.com', true);
INSERT INTO doacao VALUES (2,5,1,'pedro.favoritos@gmail.com', false);
INSERT INTO doacao VALUES (3,1,3,'pedro.favoritos@gmail.com',false);



/*Emprestimo*/
INSERT INTO emprestimo VALUES(1,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',1,1);
INSERT INTO emprestimo VALUES(2,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',2,2);
INSERT INTO emprestimo VALUES(3,'2025-09-01','2025-10-05',NULL,'pedro@gmail.com',7,2);
INSERT INTO emprestimo VALUES(4,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',5,4);
INSERT INTO emprestimo VALUES(5,'2025-09-01','2025-10-05',NULL,'caua@gmail.com',6,9);




/*
select * from livro;
select * from idioma;
select * from colecao;
select * from genero;
select * from editora;
select * from autor;
select * from assunto;
select * from biblioteca;
select * from evento;
*/


------------------------------------------------------------------------------------------------------------

-- ===== EDITORAS =====
INSERT INTO editora (cd_editora, nm_editora) VALUES
(1, 'Martin Claret'),
(2, 'Record'),
(3, 'Agir');

-- ===== IDIOMA =====
INSERT INTO idioma (cd_idioma, nm_idioma) VALUES
(1, 'Português');

-- ===== COLEÇÕES =====
INSERT INTO colecao (cd_colecao, nm_colecao) VALUES
(1, 'Clássicos'),
(2, 'Romance histórico'),
(3, 'Infantojuvenil'),
(4, 'Literatura Brasileira'),
(5, 'Romance Adolescente'),
(6, 'Ficção Científica');

-- ===== AUTORES =====
INSERT INTO autor (cd_autor, nm_autor) VALUES
(1, 'Nicolau Maquiavel'),
(2, 'Mary Renault'),
(3, 'Antoine de Saint-Exupéry'),
(4, 'Graciliano Ramos'),
(5, 'Stephen Chbosky'),
(6, 'Isaac Asimov');

-- ===== LIVROS =====
INSERT INTO livro (cd_livro, nm_livro, cd_editora, cd_idioma, cd_colecao, ds_sinopse) VALUES
(1, 'O Príncipe', 1, 1, 1, 'Obra clássica de Maquiavel sobre política e poder.'),
(2, 'A Bruxa e o Calibã', 2, 1, 2, 'Romance histórico de Mary Renault, explorando temas clássicos e mitológicos.'),
(3, 'O Pequeno Príncipe', 3, 1, 3, 'Fábula poética sobre amizade, amor e a essência da vida.'),
(4, 'Vidas Secas', 2, 1, 4, 'Romance realista que retrata a vida de uma família sertaneja nordestina em meio à seca.'),
(5, 'As Vantagens de Ser Invisível', 2, 1, 5, 'Romance epistolar que acompanha a adolescência de Charlie, explorando amizade, amor e amadurecimento.'),
(6, 'Eu, Robô', 2, 1, 6, 'Clássico da ficção científica de Asimov que reúne contos sobre a relação entre humanos e robôs, incluindo as Três Leis da Robótica.');

-- ===== RELACIONAMENTO LIVRO ↔ AUTOR =====
INSERT INTO autor_livro (cd_livro, cd_autor) VALUES
(1, 1), -- O Príncipe - Maquiavel
(2, 2), -- A Bruxa e o Calibã - Mary Renault
(3, 3), -- O Pequeno Príncipe - Saint-Exupéry
(4, 4), -- Vidas Secas - Graciliano Ramos
(5, 5), -- As Vantagens de Ser Invisível - Stephen Chbosky
(6, 6); -- Eu, Robô - Isaac Asimov




