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
INSERT INTO leitor VALUES ('pedro.favoritos@gmail.com', 'Pedro', '59433067850', '13903890782', true, '123');
INSERT INTO leitor VALUES ('pedro@gmail.com', 'Pedro Miguel', '59433067852', '13903890782', true, '123');
INSERT INTO leitor VALUES ('lucas@gmail.com', 'Lucas', '59433067855', '13903890782', true, '123');
INSERT INTO leitor VALUES ('caua@gmail.com', 'Cauã', '59433097850', '13903890782', true, '123');

/*Generos*/
INSERT INTO genero VALUES (1, 'História');
INSERT INTO genero VALUES (2, 'Direitos Humanos');
INSERT INTO genero VALUES (3, 'Romance');
INSERT INTO genero VALUES (4, 'Romance Contemporâneo');
INSERT INTO genero VALUES (5, 'Ficção Brasileira');
INSERT INTO genero VALUES (6, 'Autobiografia Filosófica');
INSERT INTO genero VALUES (7, 'Filosofia');
INSERT INTO genero VALUES (8, 'Ensaios');
INSERT INTO genero VALUES (9, 'Sociologia');
INSERT INTO genero VALUES (10, 'Humor');

/*Autores*/
INSERT INTO autor VALUES (1, 'Silvia Federici');
INSERT INTO autor VALUES (2, 'Harper Lee');
INSERT INTO autor VALUES (3, 'Colleen Hoover');
INSERT INTO autor VALUES (4, 'Jorge Amado');
INSERT INTO autor VALUES (5, 'Jojo Moyes');
INSERT INTO autor VALUES (6, 'Erik Hobsbawm');
INSERT INTO autor VALUES (7, 'Cristy Lefteri');
INSERT INTO autor VALUES (8, 'Victor Hugo');
INSERT INTO autor VALUES (9, 'Friedrich Nietzsche');
INSERT INTO autor VALUES (10, 'Léo Lins');

/*Assuntos*/
INSERT INTO assunto VALUES (1, 'História Feminista');
INSERT INTO assunto VALUES (2, 'Justiça e Racismo');
INSERT INTO assunto VALUES (3, 'Relacionamentos');
INSERT INTO assunto VALUES (4, 'Infância e Exclusão');
INSERT INTO assunto VALUES (5, 'Deficiência e Amor');
INSERT INTO assunto VALUES (6, 'Movimentos Sociais');
INSERT INTO assunto VALUES (7, 'Espiritualidade');
INSERT INTO assunto VALUES (8, 'Romantismo Clássico');
INSERT INTO assunto VALUES (9, 'Moralidade');
INSERT INTO assunto VALUES (10, 'Humor Irônico');

/*Editoras*/
INSERT INTO editora VALUES (1, 'Elefante');
INSERT INTO editora VALUES (2, 'Galera Record');
INSERT INTO editora VALUES (3, 'José Olympio');
INSERT INTO editora VALUES (4, 'Intrínseca');
INSERT INTO editora VALUES (5, 'Companhia das Letras');
INSERT INTO editora VALUES (6, 'Martin Claret');
INSERT INTO editora VALUES (7, 'L&PM Pocket');
INSERT INTO editora VALUES (8, 'Literare Books');
INSERT INTO editora VALUES (9, 'Geração Editorial');
INSERT INTO editora VALUES (10, 'Boitempo');

/*Idiomas*/
INSERT INTO idioma VALUES (1, 'Português');
INSERT INTO idioma VALUES (2, 'Inglês');

/*Coleções*/
INSERT INTO colecao VALUES (1, 'Feminismos & História');
INSERT INTO colecao VALUES (2, 'Clássicos da Justiça');
INSERT INTO colecao VALUES (3, 'Romance Contemporâneo');
INSERT INTO colecao VALUES (4, 'Literatura Infantojuvenil');
INSERT INTO colecao VALUES (5, 'Romance Internacional');
INSERT INTO colecao VALUES (6, 'História e Política');
INSERT INTO colecao VALUES (7, 'Espiritualidade Ficção');
INSERT INTO colecao VALUES (8, 'Clássicos Mundiais');
INSERT INTO colecao VALUES (9, 'Filosofia Moderna');
INSERT INTO colecao VALUES (10, 'Humor e Irreverência');

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
INSERT INTO livro VALUES (1, 'Calibã e a Bruxa', 1, 1, 1, 'Análise da caça às bruxas e o surgimento do capitalismo centrado na opressão às mulheres.');
INSERT INTO assunto_livro VALUES (1, 1);
INSERT INTO autor_livro VALUES (1, 1);
INSERT INTO genero_livro VALUES (1, 1);

/* Livro 2 */
INSERT INTO livro VALUES (2, 'O Sol é para Todos', 3, 1, 2, 'Advocacia, justiça social e crescimento no sul dos EUA, com Atticus Finch como símbolo moral.');
INSERT INTO assunto_livro VALUES (2, 2);
INSERT INTO autor_livro VALUES (2, 2);
INSERT INTO genero_livro VALUES (2, 2);

/* Livro 3 */
INSERT INTO livro VALUES (3, 'É Assim que Acaba', 2, 1, 3, 'Romance contemporâneo que retrata um relacionamento abusivo e escolhas de sobrevivência emocional.');
INSERT INTO assunto_livro VALUES (3, 3);
INSERT INTO autor_livro VALUES (3, 3);
INSERT INTO genero_livro VALUES (3, 4);

/* Livro 4 */
INSERT INTO livro VALUES (4, 'Capitães da Areia', 5, 1, 4, 'A vida de crianças de rua em Salvador e sua luta por liberdade.');
INSERT INTO assunto_livro VALUES (4, 4);
INSERT INTO autor_livro VALUES (4, 4);
INSERT INTO genero_livro VALUES (4, 5);

/* Livro 5 */
INSERT INTO livro VALUES (5, 'Como Eu Era Antes de Você', 4, 1, 5, 'Amor transformador, deficiência e autonomia emocional entre Louisa e Will.');
INSERT INTO assunto_livro VALUES (5, 5);
INSERT INTO autor_livro VALUES (5, 5);
INSERT INTO genero_livro VALUES (5, 3);

/* Livro 6 */
INSERT INTO livro VALUES (6, 'Como Mudar o Mundo', 10, 1, 6, 'Reflexão histórica sobre os movimentos socialistas e suas tentativas de transformação global.');
INSERT INTO assunto_livro VALUES (6, 6);
INSERT INTO autor_livro VALUES (6, 6);
INSERT INTO genero_livro VALUES (6, 6);

/* Livro 7 */
INSERT INTO livro VALUES (7, 'O Homem que Escutava as Abelhas', 8, 1, 7, 'Ficção espiritual que explora a relação entre homem e natureza inspirada em experiências reais.');
INSERT INTO assunto_livro VALUES (7, 7);
INSERT INTO autor_livro VALUES (7, 7);
INSERT INTO genero_livro VALUES (7, 7);

/* Livro 8 */
INSERT INTO livro VALUES (8, 'Os Miseráveis', 6, 1, 8, 'Clássico de Victor Hugo sobre redenção e justiça na França pós‑revolução.');
INSERT INTO assunto_livro VALUES (8, 8);
INSERT INTO autor_livro VALUES (8, 8);
INSERT INTO genero_livro VALUES (8, 8);

/* Livro 9 */
INSERT INTO livro VALUES (9, 'Genealogia da Moral', 7, 1, 9, 'Nietzsche analisa a origem dos valores morais ocidentais e as formas de poder.');
INSERT INTO assunto_livro VALUES (9, 9);
INSERT INTO autor_livro VALUES (9, 9);
INSERT INTO genero_livro VALUES (9, 9);

/* Livro 10 */
INSERT INTO livro VALUES (10, 'Livro dos Insultos', 9, 1, 10, 'Coletânea bem-humorada de insultos organizados por temas.');
INSERT INTO assunto_livro VALUES (10, 10);
INSERT INTO autor_livro VALUES (10, 10);
INSERT INTO genero_livro VALUES (10, 10);


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
INSERT INTO doacao VALUES (1,2,2,'pedro.favoritos@gmail.com');
INSERT INTO doacao VALUES (2,5,1,'pedro.favoritos@gmail.com');
INSERT INTO doacao VALUES (3,1,3,'pedro.favoritos@gmail.com');

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


