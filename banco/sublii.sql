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
	CONSTRAINT fk_editora FOREIGN KEY (cd_editora) REFERENCES editora(cd_editora) ON UPDATE CASCADE,
    CONSTRAINT fk_idioma FOREIGN KEY (cd_idioma) REFERENCES idioma(cd_idioma) ON UPDATE CASCADE,
    CONSTRAINT fk_colecao FOREIGN KEY (cd_colecao) REFERENCES colecao(cd_colecao) ON UPDATE CASCADE
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
    CONSTRAINT fk_leitor FOREIGN KEY (cd_email) REFERENCES leitor(cd_email) ON UPDATE CASCADE,
    CONSTRAINT fk_biblioteca FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca) ON UPDATE CASCADE
);


CREATE TABLE exemplar(
	cd_livro INT,
    cd_biblioteca INT,
    cd_exemplar INT,
    dt_insercao DATETIME,
    ic_reservado TINYTEXT,
    /*qtd_exemplar INT,*/
    CONSTRAINT pk_exemplar PRIMARY KEY (cd_exemplar),
	CONSTRAINT fk_biblioteca_livro FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca) ON UPDATE CASCADE,
    CONSTRAINT fk_livro_biblioteca FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro) ON UPDATE CASCADE
);

CREATE TABLE doacao (
	cd_doacao INT,
    nm_livro VARCHAR(200),
    nm_autor VARCHAR(200),
    cd_biblioteca INT,
    cd_email VARCHAR(200),
    ic_aprovado TINYINT,
    CONSTRAINT pk_doacao PRIMARY KEY (cd_doacao),
    CONSTRAINT fk_biblioteca_doacao FOREIGN KEY (cd_biblioteca) REFERENCES  biblioteca(cd_biblioteca) ON UPDATE CASCADE,
    CONSTRAINT  fk_email_leitor_doacao FOREIGN KEY (cd_email) REFERENCES leitor(cd_email) ON UPDATE CASCADE
);

CREATE TABLE emprestimo(
	cd_emprestimo INT,
	dt_emprestimo DATETIME,
    dt_devolucao_esperada VARCHAR(200),
	dt_devolucao DATE,
    cd_email VARCHAR(200),
    cd_livro INT,
    cd_biblioteca INT,
    ic_ativa TINYINT,
    CONSTRAINT fk_leitor_emprestimo FOREIGN KEY (cd_email) REFERENCES leitor (cd_email) ON UPDATE CASCADE,
    CONSTRAINT fk_livro_emprestimo FOREIGN KEY (cd_livro) REFERENCES livro (cd_livro) ON UPDATE CASCADE,
	CONSTRAINT fk_biblioteca_emprestimo FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca (cd_biblioteca) ON UPDATE CASCADE,
	CONSTRAINT pk_emprestimo PRIMARY KEY (cd_emprestimo) 
);

CREATE TABLE reserva(
	cd_reserva INT,
	dt_reserva DATETIME,
    cd_email VARCHAR(200),
    cd_livro INT,
    cd_biblioteca INT,
    ic_ativa TINYINT,
    CONSTRAINT fk_leitor_reserva FOREIGN KEY (cd_email) REFERENCES leitor(cd_email) ON UPDATE CASCADE,
    CONSTRAINT fk_livro_reserva FOREIGN KEY (cd_livro) REFERENCES livro (cd_livro) ON UPDATE CASCADE,
    CONSTRAINT fk_biblioteca_reserva FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca (cd_biblioteca) ON UPDATE CASCADE,
	CONSTRAINT pk_reserva PRIMARY KEY (cd_reserva)
);


CREATE TABLE bibliotecario_biblioteca(
	cd_bibliotecario INT,
    cd_biblioteca INT,
    CONSTRAINT pk_bibliotecario_biblioteca PRIMARY KEY (cd_bibliotecario, cd_biblioteca),
	CONSTRAINT fk_bibliotecario_biblioteca FOREIGN KEY (cd_bibliotecario) REFERENCES bibliotecario(cd_bibliotecario) ON UPDATE CASCADE,
    CONSTRAINT fk_biblioteca_bibliotecario FOREIGN KEY (cd_biblioteca) REFERENCES biblioteca(cd_biblioteca) ON UPDATE CASCADE
);


CREATE TABLE assunto_livro(
	cd_livro INT,
    cd_assunto INT,
    CONSTRAINT pk_assunto_livro PRIMARY KEY (cd_livro, cd_assunto),
	CONSTRAINT fk_assunto_livro FOREIGN KEY (cd_assunto) REFERENCES assunto(cd_assunto) ON UPDATE CASCADE,
    CONSTRAINT fk_livro_assunto FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro) ON UPDATE CASCADE
);

CREATE TABLE autor_livro(
	cd_livro INT,
    cd_autor INT,
    CONSTRAINT pk_livro_autor PRIMARY KEY (cd_livro, cd_autor),
	CONSTRAINT fk_autor_livro FOREIGN KEY (cd_autor) REFERENCES autor(cd_autor) ON UPDATE CASCADE,
    CONSTRAINT fk_livro_autor FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro) ON UPDATE CASCADE
);

CREATE TABLE genero_livro(
	cd_livro INT,
    cd_genero INT,
	CONSTRAINT pk_livro_genero PRIMARY KEY (cd_livro, cd_genero),
    CONSTRAINT fk_livro_genero FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro) ON UPDATE CASCADE,
	CONSTRAINT fk_genero FOREIGN KEY (cd_genero) REFERENCES genero(cd_genero) ON UPDATE CASCADE
);


/*CREATE TABLE favorito(
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

CREATE TABLE favorito(
    cd_livro INT,
    cd_email VARCHAR(200),
	CONSTRAINT pk_favorito PRIMARY KEY (cd_livro, cd_email),
    CONSTRAINT fk_livro FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro),
	CONSTRAINT fk_leitor FOREIGN KEY (cd_email) REFERENCES leitor(cd_email)
);

CREATE TABLE favorito (
    cd_livro INT,
    cd_email VARCHAR(200),
    dt_favorito DATETIME DEFAULT NOW(),
    CONSTRAINT pk_favorito PRIMARY KEY (cd_livro, cd_email),
    CONSTRAINT fk_livro_favorito FOREIGN KEY (cd_livro) REFERENCES livro(cd_livro) ON UPDATE CASCADE,
    CONSTRAINT fk_leitor_favorito FOREIGN KEY (cd_email) REFERENCES leitor(cd_email) ON UPDATE CASCADE
);*/

/*Leitores*/
INSERT INTO leitor VALUES ('pedro.favoritos@gmail.com', 'Pedro', '59433067850', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado', '00000000');
INSERT INTO leitor VALUES ('pedro@gmail.com', 'Pedro Miguel', '57652987341', '13903890782', true, '123','20/3/2008','Rua Osvaldo Cochrane, nº155', '00000000');
INSERT INTO leitor VALUES ('lucas@gmail.com', 'Lucas', '89265301925', '13903890782', true, '123','20/3/2008','Rua Lucas Alcoforado, nº68', '00000000');
INSERT INTO leitor VALUES ('caua@gmail.com', 'Cauã', '19287602634', '13903890782', true, '123','20/3/2008','Rua Oito, s/n', '00000000');
INSERT INTO leitor VALUES ('arthur@gmail.com', 'Arhtur', '82736540912', '13903890782', true, '123','20/3/2008','Rua Alfaia Rodrigues. nº30', '00000000');
INSERT INTO leitor VALUES ('anny@gmail.com', 'Anny', '92736452039', '13903890782', true, '123','20/3/2008','Rua Iara Nascimento Santni, nº 923', '00000000');
INSERT INTO leitor VALUES ('luanna@gmail.com', 'Luanna', '01827364926', '13903890782', true, '123','20/3/2008','Rua Elisa Gonçalves, nº632', '00000000');
INSERT INTO leitor VALUES ('ana@gmail.com', 'Ana', '67392835402', '13903890782', true, '123','20/3/2008','Rua Conselheiro Nébias, nº131', '00000000');
INSERT INTO leitor VALUES ('mariana@gmail.com', 'Mariana', '84762098312', '13903890782', true, '123','20/3/2008','Rua São Paulo, nº1039', '00000000');
INSERT INTO leitor VALUES ('liam@gmail.com', 'Liam', '54166842838', '13903890782', true, '123','20/3/2008','Rua Alagoas, nº111', '00000000');

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
INSERT INTO biblioteca VALUES (1, 'Biblioteca Mario fária',' Avenida Bartolomeu de Gusmão, S/N Posto 6');
INSERT INTO biblioteca VALUES (2, 'Gibiteca Municipal Marcel Rodrigues',' Av. Bartholomeu de Gusmão, S/N - Boqueirão');
INSERT INTO biblioteca VALUES (3, 'Biblioteca Municipal Alberto Souza','Praça Patriarca José Bonifácio, 58 - Centro, Santos');
INSERT INTO biblioteca VALUES (4, 'Biblioteca do Sesc',' Rua Conselheiro Ribas, 136');

/*Eventos*/
INSERT INTO evento VALUES ('Leitura de Livros de Suspense', 1,NOW(), 'SHBJHSDAUOHAFSIL', 1,'lucas@gmail.com', true);
INSERT INTO evento VALUES ('Leitura de Livros de Romance', 2,NOW(), 'SHBJHSDAUOHAFSIL', 2,'lucas@gmail.com', false);
INSERT INTO evento VALUES ('Divulgação do meu Livro', 3,NOW(), 'SHBJHSDAUOHAFSIL', 1,'pedro.favoritos@gmail.com', true);
INSERT INTO evento VALUES ('Clube do Livro de Outubro', 4,NOW(), 'SHBJHSDAUOHAFSIL', 3,'lucas@gmail.com', NULL);

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
(3, 'Colleen Hoover'),
(4, 'Jorge Amado'),
(5, 'Jojo Moyes'),
(6, 'Stela Barbieri'),
(7,'Sun Tzu'),
(8,'Antoine de Saint-Exupéry'),
(9,'Dan Brown'),
(10,'Patrick Rothfuss'),
(11,'Paulo Coelho'),
(12,'Hal Elrod'),
(13, 'Graciliano ramos'),
(14, 'Machado de Assis'),
(15, 'Silvia Federici'),
(16, 'George Orwell'),
(17, 'R. J. Palacio'),
(18, 'J. K. Rowling'),
(19, 'John Green'),
(20, 'J. R. R. Tolkien'),
(21, 'Árthur Conan Doyle'),
(22, 'Bram Stoker'),
(23, 'Gabriel García Márquez'),
(24, 'Carol Dweck'),
(25, 'Douglas Adams'),
(26, 'Albert Camus'),
(27, 'Stephenie Meyer'),
(28, 'Stephen King'),
(29, 'Neil Gaiman'),
(30, 'Graciliano ramos');



-- ===== LIVROS =====
INSERT INTO livro (cd_livro, nm_livro, cd_editora, cd_idioma, cd_colecao, ds_sinopse) VALUES
(1, 'A Bruxa e o Calibã', 2, 1, 2, 'Este romance histórico e épico de Mary Renault, notória por sua recriação do mundo grego antigo, mergulha na **mitologia e história clássica**, explorando temas complexos como o destino, a relação entre civilização e selvageria, e as tensões sociopolíticas da época. É um mergulho profundo nas fontes da cultura ocidental.'),
(2, 'O Sol é para todos', 1, 1, 1, 'Obra clássica da literatura americana, este **romance de formação (coming-of-age)** de Harper Lee aborda o **preconceito racial e a injustiça social** no sul dos Estados Unidos durante a Grande Depressão. Contada através dos olhos inocentes da jovem Scout Finch, a narrativa foca no julgamento de um homem negro falsamente acusado, e na coragem moral de seu pai, o advogado Atticus Finch.'),
(3, 'É assim que acaba', 3, 1, 3, 'Um **romance contemporâneo** altamente influente de Colleen Hoover que aborda de forma sensível e direta o tema da **violência doméstica e os ciclos de abuso**. A história acompanha Lily Bloom em sua jornada para quebrar o padrão de relacionamentos destrutivos, destacando a complexidade das emoções envolvidas e a força necessária para buscar o fim de um ciclo doloroso.'),
(4, 'Capitães da Areia', 2, 1, 4, 'Clássico do romance social brasileiro de Jorge Amado. A obra é um retrato vívido e poético da vida, das aventuras e dos dramas de um grupo de meninos de rua, os "capitães da areia", que vivem de pequenos furtos e da solidariedade em um trapiche abandonado em Salvador. É uma poderosa denúncia da miséria e da exclusão social.'),
(5, 'Como eu era Antes de Você', 2, 1, 5, 'Um **drama romântico** e best-seller de Jojo Moyes. A narrativa explora a improvável e intensa história de amor e amizade entre Louisa Clark, que se torna cuidadora, e Will Traynor, um jovem tetraplégico que perdeu a vontade de viver. O livro levanta questões éticas e emocionais profundas sobre o direito à escolha, a qualidade de vida e a eutanásia.'),
(6, 'Como Mudar o Mundo', 2, 1, 6, 'Clássico e fundacional da **ficção científica** de Isaac Asimov. Esta coletânea de contos, que popularizou as **Três Leis da Robótica**, explora as implicações éticas, filosóficas e sociais da coexistência entre humanos e robôs, examinando o potencial e os perigos da inteligência artificial e suas regras de convivência.'),
(7, 'Dom Casmurro', 1, 1, 4, 'Uma das obras-primas da literatura brasileira, este **romance realista-psicológico** de Machado de Assis é uma profunda análise da mente humana e da natureza do ciúme. Contado em primeira pessoa pelo narrador Bento Santiago, o livro constrói o eterno enigma sobre a suposta traição de sua esposa, Capitu, deixando a ambiguidade da verdade para o leitor julgar.'),
(8, '1984', 3, 3, 6, 'A seminal **distopia política** de George Orwell, que é um alerta atemporal contra o totalitarismo, a vigilância e a manipulação da linguagem. O livro acompanha Winston Smith, que tenta manter sua individualidade e memória em um regime opressor onde o Partido e o Grande Irmão controlam todos os aspectos da vida e da história, por meio do "Novidioma" e da "Duplipensar".'),
(9, 'A Arte da Guerra', 1, 1, 1, 'O mais famoso e influente **tratado militar** da história, escrito pelo estrategista chinês Sun Tzu há mais de dois milênios. Esta obra vai além das táticas de batalha, oferecendo princípios de liderança, planejamento estratégico, e a importância de conhecer a si mesmo e ao inimigo, sendo largamente aplicado em administração e negócios.'),
(10, 'O Pequeno Príncipe', 2, 1, 3, 'Uma **fábula filosófica** e poética do autor e aviador Antoine de Saint-Exupéry, considerada um clássico mundial da literatura infantojuvenil e adulta. O livro utiliza a metáfora do encontro de um aviador com um pequeno príncipe no deserto para criticar a superficialidade do mundo adulto e ressaltar a importância da imaginação, da amizade e da essência invisível das coisas.'),
(11, 'O Código Da Vinci', 2, 1, 1, 'Um **thriller de conspiração** e aventura de Dan Brown. A trama segue o simbologista de Harvard, Robert Langdon, em uma caçada frenética por Paris e Londres para decifrar enigmas ocultos em obras de arte e arquitetura, desvendando segredos históricos e religiosos controversos ligados ao Santo Graal, à Igreja e à figura de Maria Madalena.'),
(12, 'O Nome do Vento', 2, 3, 2, 'O primeiro volume da aclamada série **épica de fantasia** "A Crônica do Matador do Rei", de Patrick Rothfuss. A história, contada em formato de memórias, narra a infância, juventude e ascensão do lendário Kvothe: músico, mago e herói recluso. É conhecido pela riqueza de sua prosa e a complexa construção de seu universo e sistema de magia.'),
(13, 'O Alquimista', 3, 1, 1, 'Um dos livros mais traduzidos e vendidos no mundo, este **romance alegórico** e de autoajuda de Paulo Coelho segue a jornada de Santiago, um pastor andaluz que viaja do sul da Espanha até o Egito em busca de um tesouro material. A narrativa se concentra na filosofia de **seguir a Lenda Pessoal** (o grande sonho da vida) e na crença nos sinais do universo.'),
(14, 'Extraordinário', 2, 1, 3, 'Este **romance infanto-juvenil** de R.J. Palacio, que se tornou um símbolo de combate ao bullying, narra a história tocante de August Pullman, um garoto de 10 anos com uma deformidade facial grave, ao enfrentar seu primeiro ano em uma escola regular. O livro, contado em múltiplas perspectivas, é um poderoso chamado à empatia, aceitação e à prática da gentileza.'),
(15, 'Vidas Secas', 1, 1, 4, 'Uma obra-prima do **Graciliano Ramos**, considerada um marco do Modernismo brasileiro e do **romance regionalista**. O livro é um retrato brutal e minimalista da luta pela sobrevivência da família de retirantes Fabiano no sertão nordestino, marcada pela seca, a miséria e a animalização do ser humano, sendo um documento poderoso da condição social da época.'),
(16, 'Harry Potter e a Pedra Filosofal', 2, 1, 3, 'O início da série de **fantasia juvenil** que se tornou um fenômeno global, escrito por J.K. Rowling. O livro apresenta o órfão Harry Potter que, ao completar 11 anos, descobre ser um bruxo e é levado para o mundo mágico na Escola de Magia e Bruxaria de Hogwarts, onde faz amigos e começa a desvendar o mistério da Pedra Filosofal.'),
(17, 'A Culpa é das Estrelas', 2, 1, 5, 'Um **romance dramático e juvenil (Young Adult)** de John Green. A história narra a intensa e agridoce história de amor entre Hazel Grace e Augustus Waters, dois adolescentes inteligentes e sarcásticos que se conhecem em um grupo de apoio a pacientes com câncer. A obra explora temas como o amor, a mortalidade, a dor e a busca por deixar uma marca no mundo.'),
(18, 'O Senhor dos Anéis: A Sociedade do Anel', 3, 3, 1, 'O primeiro volume da **trilogia épica de alta fantasia** de J.R.R. Tolkien, que estabeleceu os pilares do gênero moderno. A aventura começa na Terra-média quando o hobbit Frodo Bolseiro herda um anel maligno e deve, com um grupo de companheiros de diversas raças (A Sociedade do Anel), iniciar uma jornada para destruí-lo nas forjas de Mordor.'),
(19, 'Sherlock Holmes', 1, 1, 1, 'Esta coletânea, escrita por Arthur Conan Doyle, engloba as mais famosas aventuras do detetive mais icônico da literatura: **Sherlock Holmes**, mestre da ciência da dedução, e seu fiel biógrafo, Dr. John Watson. As histórias são a essência do **romance policial e de mistério** na Londres vitoriana, influenciando o gênero até hoje.'),
(20, 'Drácula', 1, 3, 1, 'Um dos pilares do **romance gótico e de terror** de Bram Stoker. Escrito em formato epistolar (diários e cartas), o livro narra a aterrorizante história de como o vampiro Conde Drácula, uma figura ancestral e maligna da Transilvânia, se transfere para a Inglaterra e a caçada empreendida por um grupo de defensores da vida para detê-lo, popularizando o mito do vampiro.'),
(21, 'Cem Anos de Solidão', 2, 2, 1, 'A obra-prima do Nobel de Literatura, Gabriel García Márquez, e um dos livros mais importantes do século XX. Este **romance de realismo mágico** narra a saga de sete gerações da família Buendía e a história da fundação e queda da cidade fictícia de Macondo, explorando temas universais como o tempo, a memória, o incesto e a solidão que permeia a história latino-americana.'),
(22, 'O Milagre da Manhã', 3, 1, 1, 'Um popular **livro de autoajuda e desenvolvimento pessoal** de Hal Elrod. O livro propõe uma metodologia chamada "Salvadores de Vida" (S.A.V.E.R.S.), que consiste em seis hábitos matinais específicos (Silêncio, Afirmações, Visualização, Exercícios, Leitura, Escrita) para aumentar drasticamente a produtividade, a saúde e o bem-estar.'),
(23, 'Mindset: A Nova Psicologia do Sucesso', 3, 1, 1, 'Um influente **livro de psicologia e desenvolvimento pessoal** da Dra. Carol S. Dweck. A obra explora a descoberta científica de que o sucesso não é determinado apenas por talentos inatos, mas pela nossa **mentalidade (mindset)**, mostrando como a adoção de uma mentalidade de crescimento (growth mindset) pode transformar a forma como lidamos com desafios e alcançamos o sucesso.'),
(24, 'A Revolução dos Bichos', 1, 1, 6, 'Uma **alegoria política** e **sátira distópica** de George Orwell. O livro usa a rebelião dos animais de uma fazenda contra seus donos humanos como uma crítica direta aos rumos da Revolução Russa e à corrupção do poder. A famosa máxima "Todos os animais são iguais, mas alguns são mais iguais que outros" resume o desvio da utopia para a tirania.'),
(25, 'O Guia do Mochileiro das Galáxias', 2, 3, 6, 'Um clássico do **humor e da ficção científica cômica** de Douglas Adams. A saga começa quando o inglês Arthur Dent é o único humano a sobreviver à destruição da Terra para dar lugar a uma via expressa intergaláctica. Ele se lança em uma série de desventuras absurdas pelo universo, sempre carregando seu guia e aprendendo que a resposta para a Vida, o Universo e Tudo Mais é 42.'),
(26, 'Extraordinário', 2, 1, 5, 'Outro **romance juvenil** de R.J. Palacio, que foca na importância de "escolher a gentileza". O livro aprofunda as questões de **bullying, aceitação e amizade**, através da perspectiva de Auggie Pullman e das pessoas ao seu redor, reforçando a mensagem de que as aparências e as diferenças não devem definir o tratamento que damos uns aos outros.'),
(27, 'O Estrangeiro', 1, 1, 1, 'Um marco do **existencialismo e do romance filosófico** de Albert Camus. O livro narra a vida de Meursault, um personagem que demonstra uma profunda apatia e indiferença diante das normas sociais e das emoções humanas, culminando em um ato de violência. A obra explora o tema do **Absurdo**, a falta de sentido da vida e a solidão do indivíduo no universo.'),
(28, 'A Hospedeira', 2, 3, 6, 'Um **romance de ficção científica** com forte apelo romântico de Stephenie Meyer. A trama se passa em um futuro onde a Terra foi invadida por alienígenas parasitas chamados "Almas", que habitam corpos humanos. A história se concentra no conflito interno de uma Alma, Melanie, que não consegue sufocar a personalidade de sua hospedeira humana, criando um triângulo amoroso e uma luta pela liberdade.'),
(29, 'O Alienista', 1, 1, 4, 'Um famoso **conto satírico e psicológico** de Machado de Assis. A narrativa gira em torno do Dr. Simão Bacamarte, um médico que funda um hospício na cidade de Itaguaí e inicia um estudo ambicioso para classificar a loucura, mas sua definição de normalidade se torna tão restritiva que ele passa a internar uma parcela cada vez maior da população, questionando os limites entre a ciência, o poder e a insanidade.'),
(30, 'IT - A Coisa', 3, 3, 1, 'Um clássico monumental do **terror psicológico e sobrenatural** de Stephen King. A história se desenrola em duas linhas temporais, seguindo um grupo de crianças, o "Clube dos Perdedores", que enfrenta uma criatura maligna metamorfa que se manifesta como o palhaço Pennywise e se alimenta do medo. O livro é uma exploração profunda do trauma de infância, da amizade e da memória.'),
(31, 'Coraline', 1, 1, 3, 'Certas portas não devem ser abertas. E Coraline descobre isso pouco tempo depois de chegar com os pais à sua nova casa, um apartamento em um casarão antigo ocupado por vizinhos excêntricos e envolto por uma névoa insistente, um mundo de estranhezas e magia, o tipo de universo que apenas Neil Gaiman pode criar.');

-- ===== RELACIONAMENTO LIVRO ↔ AUTOR =====
INSERT INTO autor_livro (cd_livro, cd_autor) VALUES
(1, 15), -- A bruxa e o calibã - Silvia Federici
(2, 2), -- O Sol é para todos - Harper Lee
(3, 3), -- É assim que acaba - Coleen Hoover
(4, 4), -- Capitães de Areia - Jorge Amado
(5, 5), -- Como eu era antes de você - Jojo Moyes
(6, 6), -- Como mudar o Mundo - Stela Barbieri
(7, 14), -- Dom Casmurro - Machado de Assis
(8, 16), -- 1984 - George Orwell
(9, 7), -- A Arte da Guerra - Sun Tzu
(10, 8), -- O Pequeno Principe - Antoine de Saint-Exupéry
(11, 9), -- O codigo da vinci - Dan Brown
(12, 10), -- O nome do vento - Patrick Rothfuss
(13, 11), -- O alquimista - Paulo Coelho 
(14, 17), -- O Extraordinario - R. J. Palacio
(15, 13), -- Vidas Secas - Graciliano ramos
(16, 18), -- Harry Potter - J. K. Rowling
(17, 19), -- A culpa é das estrelas - John Green
(18, 20), -- O senhor dos anéis - J. R. R. Tolkien
(19, 21), -- Sherlock Holmes - Árthur Conan Doyle
(20, 22), -- Dracula - Bram Stoker
(21, 23), -- Cem anos de solidao - García Márquez
(22, 12), -- o milagre da manhã - Hal Elrod
(23, 24), -- mindset - Carol Dweck
(24, 16), -- a revolução dos bichos - George Orwell
(25, 25), -- o mochileiro das galaxias - Douglas Adams
(26, 17), -- o extraordinario TA REPETIDO !!!!!!!
(27, 26), -- O estrangeiro - Albert Camus
(28, 27), -- a hospedeira - Stephenie Meyer
(29, 14), -- O Alienista - Machado de Assis
(30, 28),  -- IT a coisa - Stephen King
(31, 29); -- Coraline - Neil Gaiman

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
(30, 5), -- IT - A Coisa - Terror
(31, 5); -- Coraline - terror

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
(16, 10), -- Harry Potter e a Pedra Filosofal - Fantasia (Novo Assunto)
(17, 2), -- A Culpa é das Estrelas - Psicologia
(18, 10), -- O Senhor dos Anéis: A Sociedade do Anel - Fantasia (Assunto reutilizado)
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
INSERT INTO exemplar VALUES (4, 4, 2, NOW(), false);
INSERT INTO exemplar VALUES (2, 3, 3, NOW(), false);
INSERT INTO exemplar VALUES (6, 4, 4, NOW(), false);
INSERT INTO exemplar VALUES (1, 3, 5, NOW(), false);
INSERT INTO exemplar VALUES (5, 1, 6, NOW(), false);
INSERT INTO exemplar VALUES (2, 3, 7, NOW(), false);
INSERT INTO exemplar VALUES (4, 4, 8, NOW(), false);
INSERT INTO exemplar VALUES (6, 4, 9, NOW(), false);
INSERT INTO exemplar VALUES (3, 4, 10, NOW(), false);
INSERT INTO exemplar VALUES (1, 2, 11, NOW(), false);
INSERT INTO exemplar VALUES (5, 1, 12, NOW(), false);
INSERT INTO exemplar VALUES (3, 2, 13, NOW(), false);
INSERT INTO exemplar VALUES (6, 3, 14, NOW(), false);
INSERT INTO exemplar VALUES (5, 1, 15, NOW(), false);
INSERT INTO exemplar VALUES (4, 1, 16, NOW(), false);
INSERT INTO exemplar VALUES (3, 1, 17, NOW(), false);
INSERT INTO exemplar VALUES (2, 1, 18, NOW(), false);
INSERT INTO exemplar VALUES (1, 1, 19, NOW(), false);
INSERT INTO exemplar VALUES (6, 1, 20, NOW(), false);
INSERT INTO exemplar VALUES (7, 1, 21, NOW(), false);
INSERT INTO exemplar VALUES (8, 1, 22, NOW(), false);
INSERT INTO exemplar VALUES (9, 1, 23, NOW(), false);
INSERT INTO exemplar VALUES (10, 1, 24, NOW(), false);
INSERT INTO exemplar VALUES (11, 1, 25, NOW(), false);
INSERT INTO exemplar VALUES (12, 1, 26, NOW(), false);
INSERT INTO exemplar VALUES (13, 1, 27, NOW(), false);
INSERT INTO exemplar VALUES (14, 1, 28, NOW(), false);
INSERT INTO exemplar VALUES (15, 1, 29, NOW(), false);
INSERT INTO exemplar VALUES (16, 1, 30, NOW(), false);
INSERT INTO exemplar VALUES (17, 1, 31, NOW(), false);
INSERT INTO exemplar VALUES (18, 1, 32, NOW(), false);
INSERT INTO exemplar VALUES (19, 1, 33, NOW(), false);
INSERT INTO exemplar VALUES (20, 1, 34, NOW(), false);
INSERT INTO exemplar VALUES (21, 1, 35, NOW(), false);
INSERT INTO exemplar VALUES (22, 1, 36, NOW(), false);
INSERT INTO exemplar VALUES (23, 1, 37, NOW(), false);
INSERT INTO exemplar VALUES (24, 1, 38, NOW(), false);
INSERT INTO exemplar VALUES (25, 1, 39, NOW(), false);
INSERT INTO exemplar VALUES (26, 1, 40, NOW(), false);
INSERT INTO exemplar VALUES (27, 1, 41, NOW(), false);
INSERT INTO exemplar VALUES (28, 1, 42, NOW(), false);
INSERT INTO exemplar VALUES (29, 1, 43, NOW(), false);
INSERT INTO exemplar VALUES (30, 1, 44, NOW(), false);

/*Bibliotecarios*/
INSERT INTO bibliotecario VALUES (1,'Liam da Silva',123,'AAA');
INSERT INTO bibliotecario_biblioteca VALUES (1,1);

INSERT INTO bibliotecario VALUES(2,'Jeferson José',123,'BBB');
INSERT INTO bibliotecario_biblioteca VALUES(2,2);

INSERT INTO bibliotecario VALUES(3,'Caua do amanhã',123,'CCC');
INSERT INTO bibliotecario_biblioteca VALUES(3,3);

INSERT INTO bibliotecario VALUES(4,'Lucas do Hoje',123,'DDD');
INSERT INTO bibliotecario_biblioteca VALUES(4,4);

/*Doações*/
INSERT INTO doacao VALUES (1,'Cronicas Malucas','Jeferson',1,'luanna@gmail.com', true);
INSERT INTO doacao VALUES (2,'Como Dominar a Arte da Sabedoria','Mary Renault',1,'pedro@gmail.com', false);
INSERT INTO doacao VALUES (3,'Genocidas','Caua Nunes da Silva',1,'caua@gmail.com',false);
INSERT INTO doacao VALUES (4,'Romeu e Julieta' ,'William Shakespeare',2,'liam@gmail.com', false);
INSERT INTO doacao VALUES (5,'Relatos de um gato viajante' ,'Hiro Arikawa',2,'anny@gmail.com', false);
INSERT INTO doacao VALUES (6,'O Inferno de Dante' ,'Dante Alighieri',2,'lucas@gmail.com', false);
INSERT INTO doacao VALUES (7,'A biblioteca da meia noite' ,'Matt Haig',3,'ana@gmail.com', false);
INSERT INTO doacao VALUES (8,'A garota do lago' ,'Charlie Donlea',3,'luanna@gmail.com', false);
INSERT INTO doacao VALUES (9,'Em agosto nos vemos' ,'Gabriel García Marquez',3,'pedro@gmail.com', false);
INSERT INTO doacao VALUES (10,'A menina que roubava livros' ,'Markus Zusak',4,'caua@gmail.com', false);
INSERT INTO doacao VALUES (11,'Orgulho e Preconceito' ,'Jane Austen',4,'anny@gmail.com', false);


/*Emprestimo*/
INSERT INTO emprestimo VALUES(1,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',1,1, true);
INSERT INTO emprestimo VALUES(2,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',2,2, true);
INSERT INTO emprestimo VALUES(3,'2025-09-01','2025-10-05',NULL,'pedro@gmail.com',4,2, true);
INSERT INTO emprestimo VALUES(4,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',5,4, true);
INSERT INTO emprestimo VALUES(5,'2025-09-01','2025-10-05',NULL,'caua@gmail.com',6,3, true);
INSERT INTO emprestimo VALUES(6,'2025-09-01','2025-10-05',NULL,'caua@gmail.com',29,3, true);
INSERT INTO emprestimo VALUES(7,'2025-09-01','2025-10-05',NULL,'liam@gmail.com',13,1, true);
INSERT INTO emprestimo VALUES(8,'2025-09-01','2025-10-05',NULL,'luanna@gmail.com',11,1, true);
INSERT INTO emprestimo VALUES(9,'2025-09-01','2025-10-05',NULL,'ana@gmail.com',8,1, true);
INSERT INTO emprestimo VALUES(10,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',29,1, true);
INSERT INTO emprestimo VALUES(11,'2025-09-01','2025-10-05',NULL,'caua@gmail.com',15,1, true);
INSERT INTO emprestimo VALUES(12,'2025-09-01','2025-10-05',NULL,'pedro@gmail.com',25,1, true);
INSERT INTO emprestimo VALUES(13,'2025-09-01','2025-10-05',NULL,'mariana@gmail.com',26,1, true);
INSERT INTO emprestimo VALUES(14,'2025-09-01','2025-10-05',NULL,'anny@gmail.com',20,1, true);
INSERT INTO emprestimo VALUES(15,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',9,2, true);
INSERT INTO emprestimo VALUES(16,'2025-09-01','2025-10-05',NULL,'anny@gmail.com',10,2, true);
INSERT INTO emprestimo VALUES(17,'2025-09-01','2025-10-05',NULL,'liam@gmail.com',3,2, true);
INSERT INTO emprestimo VALUES(18,'2025-09-01','2025-10-05',NULL,'ana@gmail.com',2,3, true);
INSERT INTO emprestimo VALUES(19,'2025-09-01','2025-10-05',NULL,'mariana@gmail.com',8,3, true);
/*
INSERT INTO emprestimo VALUES(6,'2025-09-01','2025-10-05',NULL,'lucas@gmail.com',6,4, false);
INSERT INTO emprestimo VALUES(7,'2025-09-01','2025-10-05','2025-10-01','pedro.favoritos@gmail.com',1,1, false);
INSERT INTO emprestimo VALUES(8,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',2,1, false);
INSERT INTO emprestimo VALUES(9,'2025-09-01','2025-10-05',NULL,'pedro.favoritos@gmail.com',2,1, false);
*/

/*Reservas*/
INSERT INTO reserva VALUES (1,NOW(),'lucas@gmail.com',1,1,true),
(2,NOW(),'lucas@gmail.com',8,1,true),
(3,NOW(),'arthur@gmail.com',15,1,true),
(4,NOW(),'caua@gmail.com',18,2,true),
(5,NOW(),'caua@gmail.com',30,2,true),
(6,NOW(),'pedro@gmail.com',24,3,true),
(7,NOW(),'pedro@gmail.com',19,3,true),
(8,NOW(),'anny@gmail.com',22,3,true),
(9,NOW(),'mariana@gmail.com',5,3,true),
(10,NOW(),'anny@gmail.com',16,4,true),
(11,NOW(),'luanna@gmail.com',10,4,true),
(12,NOW(),'ana@gmail.com',9,2,true);


/*
select * from reserva;
select * from livro;
select * from idioma;
select * from colecao;
select * from genero;
select * from editora;
select * from autor;
select * from assunto;
select * from biblioteca;
select * from evento;
select * from leitor;
*/



