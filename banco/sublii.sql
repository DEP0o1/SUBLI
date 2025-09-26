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
	dt_evento VARCHAR(200),
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
    /*qtd_exemplar INT,*/
    CONSTRAINT pk_exemplar PRIMARY KEY (cd_exemplar),
	CONSTRAINT fk_biblioteca_livro FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca),
    CONSTRAINT fk_livro_biblioteca FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro)
);

CREATE TABLE doacao (
	cd_doacao INT,
    nm_livro VARCHAR(200),
    nm_autor VARCHAR(200),
    cd_biblioteca INT,
    cd_email VARCHAR(200),
    ic_aprovado TINYINT,
    CONSTRAINT pk_doacao PRIMARY KEY (cd_doacao),
    CONSTRAINT fk_biblioteca_doacao FOREIGN KEY (cd_biblioteca) REFERENCES  biblioteca(cd_biblioteca),
    CONSTRAINT  fk_email_leitor_doacao FOREIGN KEY (cd_email) REFERENCES leitor(cd_email)
);

CREATE TABLE emprestimo(
	cd_emprestimo INT,
	dt_emprestimo DATETIME,
    dt_devolucao_esperada VARCHAR(200),
	dt_devolucao DATETIME,
    cd_email VARCHAR(200),
    cd_livro INT,
    cd_biblioteca INT,
    ic_ativa TINYINT,
    CONSTRAINT fk_leitor_emprestimo FOREIGN KEY (cd_email) REFERENCES leitor (cd_email),
    CONSTRAINT fk_livro_emprestimo FOREIGN KEY (cd_livro) REFERENCES livro (cd_livro),
	CONSTRAINT fk_biblioteca_emprestimo FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca (cd_biblioteca),
	CONSTRAINT pk_emprestimo PRIMARY KEY (cd_emprestimo)
);

CREATE TABLE reserva(
	cd_reserva INT,
	dt_reserva DATETIME,
    cd_email VARCHAR(200),
    cd_livro INT,
    cd_biblioteca INT,
    ic_ativa TINYINT,
    CONSTRAINT fk_leitor_reserva FOREIGN KEY (cd_email) REFERENCES leitor(cd_email),
    CONSTRAINT fk_livro_reserva FOREIGN KEY (cd_livro) REFERENCES livro (cd_livro),
    CONSTRAINT fk_biblioteca_reserva FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca (cd_biblioteca),
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

/*Eventos*/
INSERT INTO evento VALUES ('Divulgação do meu Livro', 1,NOW(), 'SHBJHSDAUOHAFSIL', 1,'pedro.favoritos@gmail.com', NULL);
INSERT INTO evento VALUES ('Leitura de Livros de Suspense', 2,NOW(), 'SHBJHSDAUOHAFSIL', 10,'pedro.favoritos@gmail.com', NULL);

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




-- ===== EDITORAS =====
INSERT INTO editora (cd_editora, nm_editora) VALUES
(1, 'Martin Claret'),
(2, 'Record'),
(3, 'Agir');

-- ===== IDIOMA =====
INSERT INTO idioma (cd_idioma, nm_idioma) VALUES
(1, 'Português'),
(2, 'Espanhol'),
(3, 'inglês');

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
(1, 'Mary Renault'),
(2, 'Harper Lee'),
(3, 'Collen Hoover'),
(4, 'Jorge Amado'),
(5, 'Jojo Moyes'),
(6, 'Fernando Vilela');

-- ===== LIVROS =====
INSERT INTO livro (cd_livro, nm_livro, cd_editora, cd_idioma, cd_colecao, ds_sinopse) VALUES
(1, 'A Bruxa e o Calibã', 2, 1, 2, 'Romance histórico de Mary Renault, explorando temas clássicos e mitológicos.'),
(2, 'O Sol é para todos', 1, 1, 1, 'Obra clássica de Maquiavel sobre política e poder.'),
(3, 'É assim que acaba', 3, 1, 3, 'Fábula poética sobre amizade, amor e a essência da vida.'),
(4, 'Capitães da Areia', 2, 1, 4, 'Romance realista que retrata a vida de uma família sertaneja nordestina em meio à seca.'),
(5, 'Como eu era Antes de Você', 2, 1, 5, 'Romance epistolar que acompanha a adolescência de Charlie, explorando amizade, amor e amadurecimento.'),
(6, 'Como Mudar o Mundo', 2, 1, 6, 'Clássico da ficção científica de Asimov que reúne contos sobre a relação entre humanos e robôs, incluindo as Três Leis da Robótica.'),
(7, 'Dom Casmurro', 1, 1, 4, 'Clássico da literatura brasileira de Machado de Assis que narra a história do ciumento Bento Santiago e o enigma de Capitu.'),
(8, '1984', 3, 3, 6, 'Distopia de George Orwell sobre um regime totalitário sob a vigilância do Grande Irmão.'),
(9, 'A Arte da Guerra', 1, 1, 1, 'Tratado militar de Sun Tzu que oferece estratégias e táticas atemporais de liderança e conflito.'),
(10, 'O Pequeno Príncipe', 2, 1, 3, 'Fábula filosófica de Antoine de Saint-Exupéry sobre a importância da amizade e dos valores humanos.'),
(11, 'O Código Da Vinci', 2, 1, 1, 'Thriller de Dan Brown que segue o simbologista Robert Langdon em uma investigação que desvenda segredos históricos e religiosos.'),
(12, 'O Nome do Vento', 2, 3, 2, 'Primeiro volume da épica saga de Patrick Rothfuss, sobre a vida lendária de Kvothe, um músico e mago.'),
(13, 'O Alquimista', 3, 1, 1, 'Livro de Paulo Coelho sobre um pastor que viaja em busca de um tesouro, aprendendo sobre a importância de seguir a Lenda Pessoal.'),
(14, 'Extraordinário', 2, 1, 3, 'História de R.J. Palacio sobre Auggie Pullman, um garoto com deformidade facial, ao iniciar o quinto ano escolar.'),
(15, 'Vidas Secas', 1, 1, 4, 'Obra de Graciliano Ramos que retrata a luta pela sobrevivência da família de retirantes Fabiano no sertão nordestino.'),
(16, 'Harry Potter e a Pedra Filosofal', 2, 1, 3, 'Primeiro livro da série de J.K. Rowling, apresentando o órfão Harry Potter e o mundo bruxo.'),
(17, 'A Culpa é das Estrelas', 2, 1, 5, 'Romance de John Green sobre a história de amor entre dois adolescentes com câncer, Hazel e Augustus.'),
(18, 'O Senhor dos Anéis: A Sociedade do Anel', 3, 3, 1, 'Aventura de J.R.R. Tolkien, onde Frodo precisa destruir um anel maligno na Terra-média.'),
(19, ' Sherlock Holmes', 1, 1, 1, 'Coletânea das aventuras do detetive mais famoso do mundo, Sherlock Holmes, e seu parceiro Dr. Watson.'),
(20, 'Drácula', 1, 3, 1, 'Clássico gótico de Bram Stoker que popularizou a figura do vampiro Conde Drácula.'),
(21, 'Cem Anos de Solidão', 2, 2, 1, 'Obra de Gabriel García Márquez que narra a história da família Buendía em Macondo, explorando o realismo mágico.'),
(22, 'O Milagre da Manhã', 3, 1, 1, 'Guia de autoajuda de Hal Elrod que propõe hábitos matinais para transformar a vida.'),
(23, 'Mindset: A Nova Psicologia do Sucesso', 3, 1, 1, 'Livro de Carol S. Dweck que explora como a mentalidade fixa ou de crescimento afeta o sucesso.'),
(24, 'A Revolução dos Bichos', 1, 1, 6, 'Sátira política de George Orwell sobre a corrupção do poder em uma fazenda controlada por animais.'),
(25, 'O Guia do Mochileiro das Galáxias', 2, 3, 6, 'Ficção científica cômica de Douglas Adams que começa com a destruição da Terra.'),
(26, 'Extraordinário', 2, 1, 5, 'Outro livro de R.J. Palacio, focado em questões de bullying, aceitação e amizade.'),
(27, 'O Estrangeiro', 1, 1, 1, 'Romance existencialista de Albert Camus que reflete sobre a condição humana e o absurdo da vida.'),
(28, 'A Hospedeira', 2, 3, 6, 'Ficção científica de Stephenie Meyer onde alienígenas invadem a Terra e habitam corpos humanos.'),
(29, 'O Alienista', 1, 1, 4, 'Conto de Machado de Assis que satiriza a ciência e a loucura através da figura do Dr. Simão Bacamarte.'),
(30, 'IT - A Coisa', 3, 3, 1, 'Clássico do terror de Stephen King sobre um grupo de crianças que enfrenta uma criatura maligna que se manifesta como o palhaço Pennywise.');

-- ===== RELACIONAMENTO LIVRO ↔ AUTOR =====
INSERT INTO autor_livro (cd_livro, cd_autor) VALUES
(1, 1), -- O Príncipe - Maquiavel
(1,2),
(2, 2), -- A Bruxa e o Calibã - Mary Renault
(3, 3), -- O Pequeno Príncipe - Saint-Exupéry
(4, 4), -- Vidas Secas - Graciliano Ramos
(5, 5), -- As Vantagens de Ser Invisível - Stephen Chbosky
(6, 6), -- Eu, Robô - Isaac Asimov*/
(7, 7),  -- Dom Casmurro - Machado de Assis
(8, 8),  -- 1984 - George Orwell
(9, 9),  -- A Arte da Guerra - Sun Tzu
(10, 10), -- O Pequeno Príncipe - Antoine de Saint-Exupéry
(11, 11), -- O Código Da Vinci - Dan Brown
(12, 12), -- O Nome do Vento - Patrick Rothfuss
(13, 13), -- O Alquimista - Paulo Coelho
(14, 14), -- Extraordinário - R.J. Palacio
(15, 15), -- Vidas Secas - Graciliano Ramos
(16, 16), -- Harry Potter e a Pedra Filosofal - J.K. Rowling
(17, 17), -- A Culpa é das Estrelas - John Green
(18, 18), -- O Senhor dos Anéis: A Sociedade do Anel - J.R.R. Tolkien
(19, 19), -- Box Sherlock Holmes - Arthur Conan Doyle
(20, 20), -- Drácula - Bram Stoker
(21, 21), -- Cem Anos de Solidão - Gabriel García Márquez
(22, 22), -- O Milagre da Manhã - Hal Elrod
(23, 23), -- Mindset: A Nova Psicologia do Sucesso - Carol S. Dweck
(24, 8),  -- A Revolução dos Bichos - George Orwell (Autor reutilizado)
(25, 24), -- O Guia do Mochileiro das Galáxias - Douglas Adams
(26, 14), -- Extraordinário (2) - R.J. Palacio (Autor reutilizado)
(27, 25), -- O Estrangeiro - Albert Camus
(28, 26), -- A Hospedeira - Stephenie Meyer
(29, 7),  -- O Alienista - Machado de Assis (Autor reutilizado, assumindo que Machado é o 7)
(30, 27); -- IT - A Coisa - Stephen King

-- ===== RELACIONAMENTO LIVRO ↔ GENERO =====
INSERT INTO genero_livro (cd_livro, cd_genero) VALUES
(1, 1), -- O Príncipe - Maquiavel
(2, 2), -- A Bruxa e o Calibã - Mary Renault
(3, 3), -- O Pequeno Príncipe - Saint-Exupéry
(4, 4), -- Vidas Secas - Graciliano Ramos
(5, 5), -- As Vantagens de Ser Invisível - Stephen Chbosky
(6, 6), -- Eu, Robô - Isaac Asimov*/
(7, 1),  -- Dom Casmurro - Ficção
(8, 1),  -- 1984 - Ficção (Distopia)
(9, 6),  -- A Arte da Guerra - História
(10, 2), -- O Pequeno Príncipe - Fantasia
(11, 4), -- O Código Da Vinci - Mistério
(12, 2), -- O Nome do Vento - Fantasia
(13, 3), -- O Alquimista - Romance
(14, 3), -- Extraordinário - Romance (Young Adult)
(15, 1), -- Vidas Secas - Ficção (Regionalista)
(16, 2), -- Harry Potter e a Pedra Filosofal - Fantasia
(17, 3), -- A Culpa é das Estrelas - Romance
(18, 2), -- O Senhor dos Anéis: A Sociedade do Anel - Fantasia
(19, 4), -- Box Sherlock Holmes - Mistério
(20, 5), -- Drácula - Terror
(21, 1), -- Cem Anos de Solidão - Ficção (Realismo Mágico)
(22, 8), -- O Milagre da Manhã - Autoajuda
(23, 8), -- Mindset: A Nova Psicologia do Sucesso - Autoajuda
(24, 1), -- A Revolução dos Bichos - Ficção (Sátira)
(25, 10), -- O Guia do Mochileiro das Galáxias - Aventura
(26, 3), -- Extraordinário (2) - Romance
(27, 3), -- O Estrangeiro - Romance (Existencialista)
(28, 1), -- A Hospedeira - Ficção (Ficção Científica)
(29, 1), -- O Alienista - Ficção
(30, 5); -- IT - A Coisa - Terror

-- ===== RELACIONAMENTO LIVRO ↔ ASSUNTO =====
INSERT INTO assunto_livro (cd_livro, cd_assunto) VALUES
(1, 1), -- O Príncipe - Maquiavel
(2, 2), -- A Bruxa e o Calibã - Mary Renault
(3, 3), -- O Pequeno Príncipe - Saint-Exupéry
(4, 4), -- Vidas Secas - Graciliano Ramos
(5, 5), -- As Vantagens de Ser Invisível - Stephen Chbosky
(6, 6), -- Eu, Robô - Isaac Asimov*/
(7, 1),  -- Dom Casmurro - Literatura Brasileira
(8, 8),  -- 1984 - Política
(9, 3),  -- A Arte da Guerra - Filosofia
(10, 5), -- O Pequeno Príncipe - Educação
(11, 7), -- O Código Da Vinci - Religião
(12, 1), -- O Nome do Vento - Literatura Brasileira (Fantasia)
(13, 3), -- O Alquimista - Filosofia
(14, 5), -- Extraordinário - Educação
(15, 1), -- Vidas Secas - Literatura Brasileira
(16, 11), -- Harry Potter e a Pedra Filosofal - Fantasia (Novo Assunto)
(17, 2), -- A Culpa é das Estrelas - Psicologia
(18, 11), -- O Senhor dos Anéis: A Sociedade do Anel - Fantasia (Assunto reutilizado)
(19, 4), -- Box Sherlock Holmes - Tecnologia (Investigação)
(20, 5), -- Drácula - Terror (Educação - tema amplo)
(21, 1), -- Cem Anos de Solidão - Literatura Brasileira
(22, 6), -- O Milagre da Manhã - Saúde
(23, 2), -- Mindset: A Nova Psicologia do Sucesso - Psicologia
(24, 8), -- A Revolução dos Bichos - Política
(25, 4), -- O Guia do Mochileiro das Galáxias - Tecnologia
(26, 5), -- Extraordinário (2) - Educação
(27, 3), -- O Estrangeiro - Filosofia
(28, 4), -- A Hospedeira - Tecnologia
(29, 1), -- O Alienista - Literatura Brasileira
(30, 2); -- IT - A Coisa - Psicologia (Medo/Infância)

/*Favoritos*/


/*Exemplares*/
INSERT INTO exemplar VALUES (1, 1, 1, NOW(), false);
INSERT INTO exemplar VALUES (4, 6, 2, NOW(), false);
INSERT INTO exemplar VALUES (2, 10, 3, NOW(), false);
INSERT INTO exemplar VALUES (6, 4, 4, NOW(), false);
INSERT INTO exemplar VALUES (1, 9, 5, NOW(), false);
INSERT INTO exemplar VALUES (5, 2, 6, NOW(), false);
INSERT INTO exemplar VALUES (2, 8, 7, NOW(), false);
INSERT INTO exemplar VALUES (4, 7, 8, NOW(), false);
INSERT INTO exemplar VALUES (6, 3, 9, NOW(), false);
INSERT INTO exemplar VALUES (3, 10, 10, NOW(), false);
INSERT INTO exemplar VALUES (1, 5, 11, NOW(), false);
INSERT INTO exemplar VALUES (5, 9, 12, NOW(), false);
INSERT INTO exemplar VALUES (3, 7, 13, NOW(), false);
INSERT INTO exemplar VALUES (6, 1, 14, NOW(), false);
INSERT INTO exemplar VALUES (5, 1, 15, NOW(), false);
INSERT INTO exemplar VALUES (4, 1, 16, NOW(), false);
INSERT INTO exemplar VALUES (3, 1, 17, NOW(), false);
INSERT INTO exemplar VALUES (2, 1, 18, NOW(), false);
INSERT INTO exemplar VALUES (1, 1, 19, NOW(), false);
/*Bibliotecarios*/
INSERT INTO bibliotecario VALUES (1,'LABUBU','AAAAA','BBB');
INSERT INTO bibliotecario_biblioteca VALUES (1,1);


/*Doações*/
INSERT INTO doacao VALUES (1,'Cronicas Malucas','Jeferson',2,'pedro.favoritos@gmail.com', true);
INSERT INTO doacao VALUES (2,'Como Dominar a Arte da Sabedoria','Mary Renault',1,'pedro.favoritos@gmail.com', false);
INSERT INTO doacao VALUES (3,'Genocidas','Caua Nunes da Silva',3,'pedro.favoritos@gmail.com',false);
INSERT INTO doacao VALUES (4,'Como Dominar a Arte da Sabedoria 2' ,'Mary Renault',1,'pedro.favoritos@gmail.com', null);


/*Emprestimo*/
INSERT INTO emprestimo VALUES(1,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',1,1, true);
INSERT INTO emprestimo VALUES(2,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',2,2, true);
INSERT INTO emprestimo VALUES(3,'2025-09-01','2025-10-05',NULL,'pedro@gmail.com',4,2, true);
INSERT INTO emprestimo VALUES(4,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',5,4, true);
INSERT INTO emprestimo VALUES(5,'2025-09-01','2025-10-05',NULL,'caua@gmail.com',6,9, true);


/*Reservas*/

INSERT INTO reserva VALUES (1,NOW(),'lucas@gmail.com',1,1,true);


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



