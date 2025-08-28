DELIMITER $$

/* =========================================
   LIVRO
========================================= */

DROP PROCEDURE IF EXISTS listar_livros$$
CREATE PROCEDURE listar_livros (
    IN  p_cd_livro INT,
    IN p_nm_livro VARCHAR(200),

    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200),

    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(100),

    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200),
    
    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200),
    
    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200),
    
    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
    SELECT DISTINCT l.*
    FROM livro l
    LEFT JOIN editora e ON l.cd_editora = e.cd_editora
    LEFT JOIN idioma i ON l.cd_idioma = i.cd_idioma
    LEFT JOIN colecao c ON l.cd_colecao = c.cd_colecao
    LEFT JOIN genero_livro gl ON l.cd_livro = gl.cd_livro
    LEFT JOIN genero g ON gl.cd_genero = g.cd_genero
    LEFT JOIN autor_livro al ON l.cd_livro = al.cd_livro
    LEFT JOIN autor a ON al.cd_autor = a.cd_autor
    LEFT JOIN assunto_livro asl ON l.cd_livro = asl.cd_livro
    LEFT JOIN assunto s ON asl.cd_assunto = s.cd_assunto
    WHERE 
        (p_cd_livro IS NULL OR l.cd_livro = p_cd_livro) AND
        (p_nm_livro IS NULL OR l.nm_livro = p_nm_livro) AND

        (p_cd_editora IS NULL OR l.cd_editora = p_cd_editora) AND
        (p_nm_editora IS NULL OR e.nm_editora = p_nm_editora) AND

        (p_cd_idioma IS NULL OR l.cd_idioma = p_cd_idioma) AND
        (p_nm_idioma IS NULL OR i.nm_idioma = p_nm_idioma) AND

        (p_cd_colecao IS NULL OR l.cd_colecao = p_cd_colecao) AND
        (p_nm_colecao IS NULL OR c.nm_colecao = p_nm_colecao) AND

        (p_cd_genero IS NULL OR gl.cd_genero = p_cd_genero) AND
        (p_nm_genero IS NULL OR g.nm_genero = p_nm_genero) AND

        (p_cd_autor IS NULL OR al.cd_autor = p_cd_autor) AND
        (p_nm_autor IS NULL OR a.nm_autor = p_nm_autor) AND

        (p_cd_assunto IS NULL OR asl.cd_assunto = p_cd_assunto) AND
        (p_nm_assunto IS NULL OR s.nm_assunto = p_nm_assunto);
        
        
END$$

/*CALL listar_livros(NULL, NULL, NULL, 'Editora Top', NULL, 'Português',  NULL, 'Parangolé',  NULL, 'Ficção',NULL, 'Clarice Lispector', NULL, 'Tecnologia');*/



DROP PROCEDURE IF EXISTS adicionar_livros$$
CREATE PROCEDURE adicionar_livros (
    IN p_cd_livro INT,
    IN p_nm_livro VARCHAR(200),

    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200),

    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(200),

    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200),
    
    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200),
    
    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200),
    
    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
	DECLARE v_cd_livro INT;
    DECLARE v_cd_genero INT;
    DECLARE v_cd_autor INT;
    DECLARE v_cd_assunto INT;
    DECLARE v_cd_editora INT;
    DECLARE v_cd_idioma INT;
    DECLARE v_cd_colecao INT;

    IF p_cd_livro IS NULL THEN
        SELECT COALESCE(MAX(cd_livro), 0) + 1 INTO v_cd_livro FROM livro;
        ELSE
        SET v_cd_livro = p_cd_livro;
    END IF;

    IF p_cd_editora IS NULL AND p_nm_editora IS NOT NULL THEN
        SELECT cd_editora INTO v_cd_editora
        FROM editora
        WHERE nm_editora = p_nm_editora
        LIMIT 1;
    ELSE
        SET v_cd_editora = p_cd_editora;
    END IF;

    IF p_cd_idioma IS NULL AND p_nm_idioma IS NOT NULL THEN
        SELECT cd_idioma INTO v_cd_idioma
        FROM idioma
        WHERE nm_idioma = p_nm_idioma
        LIMIT 1;
    ELSE
        SET v_cd_idioma = p_cd_idioma;
    END IF;

    IF p_cd_colecao IS NULL AND p_nm_colecao IS NOT NULL THEN
        SELECT cd_colecao INTO v_cd_colecao
        FROM colecao
        WHERE nm_colecao = p_nm_colecao
        LIMIT 1;
    ELSE
        SET v_cd_colecao = p_cd_colecao;
    END IF;

    IF p_cd_genero IS NULL AND p_nm_genero IS NOT NULL THEN
        SELECT cd_genero INTO v_cd_genero 
        FROM genero 
        WHERE nm_genero = p_nm_genero 
        LIMIT 1;
    ELSE
        SET v_cd_genero = p_cd_genero;
    END IF;

    IF p_cd_autor IS NULL AND p_nm_autor IS NOT NULL THEN
        SELECT cd_autor INTO v_cd_autor 
        FROM autor 
        WHERE nm_autor = p_nm_autor 
        LIMIT 1;
    ELSE
        SET v_cd_autor = p_cd_autor;
    END IF;

    IF p_cd_assunto IS NULL AND p_nm_assunto IS NOT NULL THEN
        SELECT cd_assunto INTO v_cd_assunto 
        FROM assunto 
        WHERE nm_assunto = p_nm_assunto 
        LIMIT 1;
    ELSE
        SET v_cd_assunto = p_cd_assunto;
    END IF;

    IF v_cd_livro IS NOT NULL AND 
       p_nm_livro IS NOT NULL AND 
       v_cd_editora IS NOT NULL AND 
       v_cd_idioma IS NOT NULL AND 
       v_cd_colecao IS NOT NULL AND
       v_cd_genero IS NOT NULL AND
       v_cd_autor IS NOT NULL AND
       v_cd_assunto IS NOT NULL THEN

        INSERT INTO livro 
        VALUES (v_cd_livro, p_nm_livro, v_cd_editora, v_cd_idioma, v_cd_colecao);

        INSERT INTO genero_livro VALUES (v_cd_livro, v_cd_genero);
        INSERT INTO autor_livro VALUES (v_cd_livro, v_cd_autor);
        INSERT INTO assunto_livro VALUES (v_cd_livro, v_cd_assunto);
    END IF;
END$$

/*CALL adicionar_livros(NULL, 'Aventuras no Código' , NULL , 'Editora Top' ,NULL, 'Português', NULL , 'Parangolé' , NULL , 'Ficção' ,NULL , 'Clarice Lispector' , NULL , 'Tecnologia');*/
    

DROP PROCEDURE IF EXISTS alterar_livros$$
CREATE PROCEDURE alterar_livros (
    IN p_cd_livro INT,
    IN p_nm_livro VARCHAR(200),

    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200),

    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(200),

    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200),

    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200),

    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200),

    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
    DECLARE v_cd_editora INT;
    DECLARE v_cd_idioma INT;
    DECLARE v_cd_colecao INT;
    DECLARE v_cd_genero INT;
    DECLARE v_cd_autor INT;
    DECLARE v_cd_assunto INT;


    IF p_cd_editora IS NULL AND p_nm_editora IS NOT NULL THEN
        SELECT cd_editora INTO v_cd_editora FROM editora WHERE nm_editora = p_nm_editora LIMIT 1;
    ELSE
        SET v_cd_editora = p_cd_editora;
    END IF;

    IF p_cd_idioma IS NULL AND p_nm_idioma IS NOT NULL THEN
        SELECT cd_idioma INTO v_cd_idioma FROM idioma WHERE nm_idioma = p_nm_idioma LIMIT 1;
    ELSE
        SET v_cd_idioma = p_cd_idioma;
    END IF;

    IF p_cd_colecao IS NULL AND p_nm_colecao IS NOT NULL THEN
        SELECT cd_colecao INTO v_cd_colecao FROM colecao WHERE nm_colecao = p_nm_colecao LIMIT 1;
    ELSE
        SET v_cd_colecao = p_cd_colecao;
    END IF;

    IF p_cd_genero IS NULL AND p_nm_genero IS NOT NULL THEN
        SELECT cd_genero INTO v_cd_genero FROM genero WHERE nm_genero = p_nm_genero LIMIT 1;
    ELSE
        SET v_cd_genero = p_cd_genero;
    END IF;

    IF p_cd_autor IS NULL AND p_nm_autor IS NOT NULL THEN
        SELECT cd_autor INTO v_cd_autor FROM autor WHERE nm_autor = p_nm_autor LIMIT 1;
    ELSE
        SET v_cd_autor = p_cd_autor;
    END IF;

    IF p_cd_assunto IS NULL AND p_nm_assunto IS NOT NULL THEN
        SELECT cd_assunto INTO v_cd_assunto FROM assunto WHERE nm_assunto = p_nm_assunto LIMIT 1;
    ELSE
        SET v_cd_assunto = p_cd_assunto;
    END IF;


    IF p_cd_livro IS NOT NULL THEN
        UPDATE livro
        SET 
            nm_livro   = COALESCE(p_nm_livro, nm_livro),
            cd_editora = COALESCE(v_cd_editora, cd_editora),
            cd_idioma  = COALESCE(v_cd_idioma, cd_idioma),
            cd_colecao = COALESCE(v_cd_colecao, cd_colecao)
        WHERE cd_livro = p_cd_livro;
    END IF;

    IF v_cd_genero IS NOT NULL THEN
        DELETE FROM genero_livro WHERE cd_livro = p_cd_livro;
        INSERT INTO genero_livro VALUES (p_cd_livro, v_cd_genero);
    END IF;

    IF v_cd_autor IS NOT NULL THEN
        DELETE FROM autor_livro WHERE cd_livro = p_cd_livro;
        INSERT INTO autor_livro VALUES (p_cd_livro, v_cd_autor);
    END IF;

    IF v_cd_assunto IS NOT NULL THEN
        DELETE FROM assunto_livro WHERE cd_livro = p_cd_livro;
        INSERT INTO assunto_livro VALUES (p_cd_livro, v_cd_assunto);
    END IF;
END$$

/*CALL alterar_livros(202,'Novo Título do Livro', NULL, NULL, NULL, 'Inglês',NULL, 'Coleção Nova', NULL, 'Drama',NULL, 'Machado de Assis',NULL, NULL);*/







DROP PROCEDURE IF EXISTS excluir_livros$$
CREATE PROCEDURE excluir_livros ()
BEGIN

END$$



/* =========================================
   IDIOMA
========================================= */
DROP PROCEDURE IF EXISTS listar_idiomas$$
CREATE PROCEDURE listar_idiomas(
    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(200)
)
BEGIN
    SELECT *
    FROM idioma
    WHERE (p_cd_idioma IS NULL OR cd_idioma = p_cd_idioma)
      AND (p_nm_idioma IS NULL OR nm_idioma = p_nm_idioma);
END$$

/*CALL listar_idiomas(null,'Português');*/

DROP PROCEDURE IF EXISTS adicionar_idioma$$
CREATE PROCEDURE adicionar_idioma(
    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(200)
)
BEGIN
    DECLARE v_cd_idioma INT;

    IF p_cd_idioma IS NULL THEN
        SELECT COALESCE(MAX(cd_idioma), 0) + 1 INTO v_cd_idioma FROM idioma;
    ELSE
        SET v_cd_idioma = p_cd_idioma;
    END IF;

    IF v_cd_idioma IS NOT NULL AND p_nm_idioma IS NOT NULL THEN
        INSERT INTO idioma VALUES (v_cd_idioma, p_nm_idioma);
    END IF;
END$$

/*CALL adicionar_idioma(null,'COREANO');*/

DROP PROCEDURE IF EXISTS alterar_idioma$$
CREATE PROCEDURE alterar_idioma(
    IN p_cd_idioma INT,
    IN p_nm_idioma VARCHAR(200)
)
BEGIN
    IF p_cd_idioma IS NOT NULL THEN
        UPDATE idioma
        SET nm_idioma = COALESCE(p_nm_idioma, nm_idioma)
        WHERE cd_idioma = p_cd_idioma;
    END IF;
END$$

/*CALL alterar_idioma(1,'JAPONÊS');*/

/* =========================================
   COLECAO
========================================= */
DROP PROCEDURE IF EXISTS listar_colecoes$$
CREATE PROCEDURE listar_colecoes(
    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200)
)
BEGIN
    SELECT *
    FROM colecao
    WHERE (p_cd_colecao IS NULL OR cd_colecao = p_cd_colecao)
      AND (p_nm_colecao IS NULL OR nm_colecao = p_nm_colecao);
END$$

/*CALL listar_colecoes(1,null);*/

DROP PROCEDURE IF EXISTS adicionar_colecao$$
CREATE PROCEDURE adicionar_colecao(
    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200)
)
BEGIN
    DECLARE v_cd_colecao INT;

    IF p_cd_colecao IS NULL THEN
        SELECT COALESCE(MAX(cd_colecao), 0) + 1 INTO v_cd_colecao FROM colecao;
    ELSE
        SET v_cd_colecao = p_cd_colecao;
    END IF;

    IF v_cd_colecao IS NOT NULL AND p_nm_colecao IS NOT NULL THEN
        INSERT INTO colecao VALUES (v_cd_colecao, p_nm_colecao);
    END IF;
END$$

/*CALL adicionar_colecao(null,'LUCAS TOP');*/

DROP PROCEDURE IF EXISTS alterar_colecao$$
CREATE PROCEDURE alterar_colecao(
    IN p_cd_colecao INT,
    IN p_nm_colecao VARCHAR(200)
)
BEGIN
    IF p_cd_colecao IS NOT NULL THEN
        UPDATE colecao
        SET nm_colecao = COALESCE(p_nm_colecao, nm_colecao)
        WHERE cd_colecao = p_cd_colecao;
    END IF;
END$$

/*CALL alterar_colecao(1,'PEDRO FÃ DO LINK DO ZAP');*/

/* =========================================
   GENERO
========================================= */
DROP PROCEDURE IF EXISTS listar_generos$$
CREATE PROCEDURE listar_generos(
    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200)
)
BEGIN
    SELECT *
    FROM genero
    WHERE (p_cd_genero IS NULL OR cd_genero = p_cd_genero)
      AND (p_nm_genero IS NULL OR nm_genero = p_nm_genero);
END$$

/*CALL listar_generos(null,'Terror');*/

DROP PROCEDURE IF EXISTS adicionar_genero$$
CREATE PROCEDURE adicionar_genero(
    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200)
)
BEGIN
    DECLARE v_cd_genero INT;

    IF p_cd_genero IS NULL THEN
        SELECT COALESCE(MAX(cd_genero), 0) + 1 INTO v_cd_genero FROM genero;
    ELSE
        SET v_cd_genero = p_cd_genero;
    END IF;

    IF v_cd_genero IS NOT NULL AND p_nm_genero IS NOT NULL THEN
        INSERT INTO genero VALUES (v_cd_genero, p_nm_genero);
    END IF;
END$$

/*CALL adicionar_genero(null,'Literatura da Capoeira Proibida');*/

DROP PROCEDURE IF EXISTS alterar_genero$$
CREATE PROCEDURE alterar_genero(
    IN p_cd_genero INT,
    IN p_nm_genero VARCHAR(200)
)
BEGIN
    IF p_cd_genero IS NOT NULL THEN
        UPDATE genero
        SET nm_genero = COALESCE(p_nm_genero, nm_genero)
        WHERE cd_genero = p_cd_genero;
    END IF;
END$$

/*CALL alterar_genero(1,'Buda Obliquo');*/

/* =========================================
   EDITORA
========================================= */
DROP PROCEDURE IF EXISTS listar_editoras$$
CREATE PROCEDURE listar_editoras(
    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200)
)
BEGIN
    SELECT *
    FROM editora
    WHERE (p_cd_editora IS NULL OR cd_editora = p_cd_editora)
      AND (p_nm_editora IS NULL OR nm_editora = p_nm_editora);
END$$

/*CALL listar_editoras(4, null);*/

DROP PROCEDURE IF EXISTS adicionar_editora$$
CREATE PROCEDURE adicionar_editora(
    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200)
)
BEGIN
    DECLARE v_cd_editora INT;

    IF p_cd_editora IS NULL THEN
        SELECT COALESCE(MAX(cd_editora), 0) + 1 INTO v_cd_editora FROM editora;
    ELSE
        SET v_cd_editora = p_cd_editora;
    END IF;

    IF v_cd_editora IS NOT NULL AND p_nm_editora IS NOT NULL THEN
        INSERT INTO editora VALUES (v_cd_editora, p_nm_editora);
    END IF;
END$$

/*CALL adicionar_editora(null, 'Editora Sombras Urbanas');*/

DROP PROCEDURE IF EXISTS alterar_editora$$
CREATE PROCEDURE alterar_editora(
    IN p_cd_editora INT,
    IN p_nm_editora VARCHAR(200)
)
BEGIN
    IF p_cd_editora IS NOT NULL THEN
        UPDATE editora
        SET nm_editora = COALESCE(p_nm_editora, nm_editora)
        WHERE cd_editora = p_cd_editora;
    END IF;
END$$

/*CALL alterar_editora(1, 'Editora Lua Nova');*/


/* =========================================
   AUTOR
========================================= */
DROP PROCEDURE IF EXISTS listar_autores$$
CREATE PROCEDURE listar_autores(
    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200),
    IN p_cd_livro INT
)
BEGIN
    SELECT  DISTINCT  *
    FROM autor a 
    LEFT JOIN autor_livro al ON a.cd_autor = al.cd_livro
    LEFT JOIN livro l ON al.cd_livro = l.cd_livro
    WHERE (p_cd_autor IS NULL OR a.cd_autor = p_cd_autor)
      AND (p_nm_autor IS NULL OR a.nm_autor = p_nm_autor)
      AND   (p_cd_livro IS NULL OR al.cd_livro = p_cd_livro); 
END$$
 
CALL listar_autores(null, null, 3);

DROP PROCEDURE IF EXISTS adicionar_autor$$
CREATE PROCEDURE adicionar_autor(
    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200)
)
BEGIN
    DECLARE v_cd_autor INT;

    IF p_cd_autor IS NULL THEN
        SELECT COALESCE(MAX(cd_autor), 0) + 1 INTO v_cd_autor FROM autor;
    ELSE
        SET v_cd_autor = p_cd_autor;
    END IF;

    IF v_cd_autor IS NOT NULL AND p_nm_autor IS NOT NULL THEN
        INSERT INTO autor VALUES (v_cd_autor, p_nm_autor);
    END IF;
END$$

/*CALL adicionar_autor(null, 'Zumbi dos Palmares');*/

DROP PROCEDURE IF EXISTS alterar_autor$$
CREATE PROCEDURE alterar_autor(
    IN p_cd_autor INT,
    IN p_nm_autor VARCHAR(200)
)
BEGIN
    IF p_cd_autor IS NOT NULL THEN
        UPDATE autor
        SET nm_autor = COALESCE(p_nm_autor, nm_autor)
        WHERE cd_autor = p_cd_autor;
    END IF;
END$$

/*CALL alterar_autor(1, 'Cauã');*/

/* =========================================
   ASSUNTO
========================================= */
DROP PROCEDURE IF EXISTS listar_assuntos$$
CREATE PROCEDURE listar_assuntos(
    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
    SELECT *
    FROM assunto
    WHERE (p_cd_assunto IS NULL OR cd_assunto = p_cd_assunto)
      AND (p_nm_assunto IS NULL OR nm_assunto = p_nm_assunto);
END$$

/*CALL listar_assuntos(null, 'Filosofia');*/

DROP PROCEDURE IF EXISTS adicionar_assunto$$
CREATE PROCEDURE adicionar_assunto(
    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
    DECLARE v_cd_assunto INT;

    IF p_cd_assunto IS NULL THEN
        SELECT COALESCE(MAX(cd_assunto), 0) + 1 INTO v_cd_assunto FROM assunto;
    ELSE
        SET v_cd_assunto = p_cd_assunto;
    END IF;

    IF v_cd_assunto IS NOT NULL AND p_nm_assunto IS NOT NULL THEN
        INSERT INTO assunto VALUES (v_cd_assunto, p_nm_assunto);
    END IF;
END$$

/*CALL adicionar_assunto(null, 'História da Resistência Negra');*/

DROP PROCEDURE IF EXISTS alterar_assunto$$
CREATE PROCEDURE alterar_assunto(
    IN p_cd_assunto INT,
    IN p_nm_assunto VARCHAR(200)
)
BEGIN
    IF p_cd_assunto IS NOT NULL THEN
        UPDATE assunto
        SET nm_assunto = COALESCE(p_nm_assunto, nm_assunto)
        WHERE cd_assunto = p_cd_assunto;
    END IF;
END$$

/*CALL alterar_assunto(1, 'Filosofia Afro-Brasileira');*/


/* =========================================
   BIBLIOTECA
========================================= */

DROP PROCEDURE IF EXISTS listar_bibliotecas$$
CREATE PROCEDURE listar_bibliotecas(
    IN p_cd_biblioteca INT,
    IN p_nm_biblioteca VARCHAR(200)
)
BEGIN
    SELECT *
    FROM biblioteca
    WHERE (p_cd_biblioteca IS NULL OR cd_biblioteca = p_cd_biblioteca)
      AND (p_nm_biblioteca IS NULL OR nm_biblioteca = p_nm_biblioteca);
END$$

/*CALL listar_bibliotecas(null, 'Parangolé');*/

DROP PROCEDURE IF EXISTS adicionar_biblioteca$$
CREATE PROCEDURE adicionar_biblioteca(
    IN p_cd_biblioteca INT,
    IN p_nm_biblioteca VARCHAR(200),
    IN p_nm_endereco VARCHAR(200)
)
BEGIN
    DECLARE v_cd_biblioteca INT;

    IF p_cd_biblioteca IS NULL THEN
        SELECT COALESCE(MAX(cd_biblioteca), 0) + 1 INTO v_cd_biblioteca FROM biblioteca;
    ELSE
        SET v_cd_biblioteca = p_cd_biblioteca;
    END IF;

    IF v_cd_biblioteca IS NOT NULL AND p_nm_biblioteca IS NOT NULL AND p_nm_endereco IS NOT NULL THEN
        INSERT INTO biblioteca VALUES (v_cd_biblioteca, p_nm_biblioteca, p_nm_endereco);
    END IF;
END$$

/*CALL adicionar_biblioteca(null, 'Biblioteca Mario Fagundes','Nautica');*/

DROP PROCEDURE IF EXISTS alterar_biblioteca$$
CREATE PROCEDURE alterar_biblioteca(
    IN p_cd_biblioteca INT,
    IN p_nm_biblioteca VARCHAR(200),
    IN p_nm_endereco VARCHAR(200)
)

BEGIN

IF p_cd_biblioteca IS NOT NULL THEN
        UPDATE biblioteca
        SET 
            nm_biblioteca   = COALESCE(p_nm_biblioteca, nm_biblioteca),
            nm_endereco = COALESCE(p_nm_endereco, nm_endereco)
        WHERE cd_biblioteca = p_cd_biblioteca;
    END IF;
END$$

/*CALL alterar_biblioteca(11, 'MUDEI',null);*/


/* =========================================
   EVENTO
========================================= */

DROP PROCEDURE IF EXISTS listar_eventos$$
CREATE PROCEDURE listar_eventos(
    IN p_cd_evento INT,
    IN p_dt_evento DATETIME,
    IN p_ds_evento TEXT,
    
    IN p_cd_biblioteca INT,
    IN p_nm_biblioteca VARCHAR(200),
    
    IN p_nm_responsavel VARCHAR(200),
    IN p_cd_cpf_responsavel VARCHAR(11),
    IN p_ic_confirmado TINYINT
)
BEGIN
	DECLARE v_cd_biblioteca INT;


	IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca  INTO v_cd_biblioteca FROM biblioteca WHERE nm_biblioteca = p_nm_biblioteca
    LIMIT 1;
    
    ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
    END IF;
    

    SELECT *
    FROM evento
    WHERE (p_cd_evento IS NULL OR cd_evento = p_cd_evento)
      AND (p_dt_evento IS NULL OR dt_evento = p_dt_evento)
      AND (p_ds_evento IS NULL OR ds_evento = p_ds_evento)
      AND (p_cd_biblioteca IS NULL OR cd_biblioteca = p_cd_biblioteca)
      AND (p_nm_responsavel IS NULL OR nm_responsavel = p_nm_responsavel)
      AND (p_cd_cpf_responsavel IS NULL OR p_cd_cpf_responsavel = p_cd_cpf_responsavel)
		AND (p_ic_confirmado IS NULL OR ic_confirmado = p_ic_confirmado);
END$$

/*CALL listar_eventos(null,null,null,null,'Parangolé',null,null,null);*/

DROP PROCEDURE IF EXISTS adicionar_evento$$
CREATE PROCEDURE adicionar_evento(
    IN p_cd_evento INT,
    IN p_dt_evento DATETIME,
    IN p_ds_evento TEXT,
    
    IN p_cd_biblioteca INT,
    IN p_nm_biblioteca VARCHAR(200),
    
    IN p_nm_responsavel VARCHAR(200),
    IN p_cd_cpf_responsavel VARCHAR(11),
    IN p_ic_confirmado TINYINT
)
BEGIN
	DECLARE v_cd_biblioteca INT;
	DECLARE v_cd_evento INT;
    
    IF p_cd_evento IS NULL THEN
        SELECT COALESCE(MAX(cd_evento), 0) + 1 INTO v_cd_evento FROM evento;
        ELSE
        SET v_cd_evento = p_cd_evento;
    END IF;
    
 	IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca  INTO v_cd_biblioteca FROM biblioteca WHERE nm_biblioteca = p_nm_biblioteca
    LIMIT 1;
    ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
    END IF;
    
     IF v_cd_evento IS NOT NULL AND 
       p_dt_evento IS NOT NULL AND 
       p_ds_evento IS NOT NULL AND 
       v_cd_biblioteca IS NOT NULL AND 
       p_nm_responsavel IS NOT NULL AND
       p_cd_cpf_responsavel IS NOT NULL THEN

        INSERT INTO evento 
        VALUES (v_cd_evento, p_dt_evento, p_ds_evento, v_cd_biblioteca, p_nm_responsavel, p_cd_cpf_responsavel, p_ic_confirmado);
    END IF;
    END$$
    
    /*CALL adicionar_evento(NULL, NOW() , 'DESCRIÇÃO TOP' , NULL ,'Parangolé', 'Jeferson', '50479150850' , NULL);*/
    
    
    
    /* =========================================
   EXEMPLARES
========================================= */
    
DROP PROCEDURE IF EXISTS listar_exemplares$$
CREATE PROCEDURE listar_exemplares(
  IN p_cd_exemplar INT,
  IN p_cd_livro INT,
  IN p_nm_livro VARCHAR(100),
  IN p_cd_biblioteca INT,
  IN p_nm_biblioteca VARCHAR(100),
  IN p_dt_insercao DATETIME,
  IN p_ic_reservado TINYINT
)
BEGIN
  DECLARE v_cd_livro INT;
  DECLARE v_cd_biblioteca INT;


  IF p_cd_livro IS NULL AND p_nm_livro IS NOT NULL THEN
    SELECT cd_livro INTO v_cd_livro
    FROM livro
    WHERE nm_livro = p_nm_livro
    LIMIT 1;
  ELSE
    SET v_cd_livro = p_cd_livro;
  END IF;


  IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca INTO v_cd_biblioteca
    FROM biblioteca
    WHERE nm_biblioteca = p_nm_biblioteca
    LIMIT 1;
  ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
  END IF;


  SELECT * FROM exemplar
   WHERE (p_cd_exemplar IS NULL OR cd_exemplar = p_cd_exemplar)
     AND (v_cd_livro IS NULL OR cd_livro = v_cd_livro)
     AND (v_cd_biblioteca IS NULL OR cd_biblioteca = v_cd_biblioteca)
     AND (p_dt_insercao IS NULL OR dt_insercao = p_dt_insercao)
     AND (p_ic_reservado IS NULL OR ic_reservado = p_ic_reservado);
END$$



DROP PROCEDURE IF EXISTS adicionar_exemplar$$
CREATE PROCEDURE adicionar_exemplar(
  IN p_cd_exemplar INT,
  IN p_cd_livro INT,
  IN p_nm_livro VARCHAR(100),
  IN p_cd_biblioteca INT,
  IN p_nm_biblioteca VARCHAR(100),
  IN p_dt_insercao DATETIME,
  IN p_ic_reservado TINYINT
)
BEGIN
  DECLARE v_cd_exemplar INT;
  DECLARE v_cd_livro INT;
  DECLARE v_cd_biblioteca INT;


  IF p_cd_exemplar IS NULL THEN
    SELECT COALESCE(MAX(cd_exemplar), 0) + 1 INTO v_cd_exemplar FROM exemplar;
  ELSE
    SET v_cd_exemplar = p_cd_exemplar;
  END IF;


  IF p_cd_livro IS NULL AND p_nm_livro IS NOT NULL THEN
    SELECT cd_livro INTO v_cd_livro
    FROM livro
    WHERE nm_livro = p_nm_livro
    LIMIT 1;
  ELSE
    SET v_cd_livro = p_cd_livro;
  END IF;


  IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca INTO v_cd_biblioteca
    FROM biblioteca
    WHERE nm_biblioteca = p_nm_biblioteca
    LIMIT 1;
  ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
  END IF;


  IF v_cd_exemplar IS NOT NULL AND v_cd_livro IS NOT NULL
     AND v_cd_biblioteca IS NOT NULL AND p_dt_insercao IS NOT NULL
     AND p_ic_reservado IS NOT NULL THEN
    INSERT INTO exemplar
      VALUES (v_cd_livro, v_cd_biblioteca, v_cd_exemplar, p_dt_insercao, p_ic_reservado);
  END IF;
END$$



DROP PROCEDURE IF EXISTS alterar_exemplar$$
CREATE PROCEDURE alterar_exemplar(
  IN p_cd_exemplar INT,
  IN p_cd_livro INT,
  IN p_nm_livro VARCHAR(100),
  IN p_cd_biblioteca INT,
  IN p_nm_biblioteca VARCHAR(100),
  IN p_dt_insercao DATETIME,
  IN p_ic_reservado TINYINT
)
BEGIN
  DECLARE v_cd_livro INT;
  DECLARE v_cd_biblioteca INT;


  IF p_cd_livro IS NULL AND p_nm_livro IS NOT NULL THEN
    SELECT cd_livro INTO v_cd_livro
    FROM livro
    WHERE nm_livro = p_nm_livro
    LIMIT 1;
  ELSE
    SET v_cd_livro = p_cd_livro;
  END IF;


  IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca INTO v_cd_biblioteca
    FROM biblioteca
    WHERE nm_biblioteca = p_nm_biblioteca
    LIMIT 1;
  ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
  END IF;


  IF p_cd_exemplar IS NOT NULL THEN
    UPDATE exemplar
      SET cd_livro = COALESCE(v_cd_livro, cd_livro),
          cd_biblioteca = COALESCE(v_cd_biblioteca, cd_biblioteca),
          dt_insercao = COALESCE(p_dt_insercao, dt_insercao),
          ic_reservado = COALESCE(p_ic_reservado, ic_reservado)
      WHERE cd_exemplar = p_cd_exemplar;
  END IF;
END$$

/* =========================================
   LEITOR
========================================= */
    
    DROP PROCEDURE IF EXISTS listar_leitores$$
CREATE PROCEDURE listar_leitores(
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_cpf VARCHAR(11),
  IN p_cd_telefone VARCHAR(11),
  IN p_ic_comprovante_residencia TINYINT
)
BEGIN
  SELECT * FROM leitor
     WHERE (p_cd_email_leitor IS NULL OR cd_email_leitor = p_cd_email_leitor)
       AND (p_nm_leitor IS NULL OR nm_leitor = p_nm_leitor)
       AND (p_cd_cpf IS NULL OR cd_cpf = p_cd_cpf)
       AND (p_cd_telefone IS NULL OR cd_telefone = p_cd_telefone)
       AND (p_ic_comprovante_residencia IS NULL OR ic_comprovante_residencia = p_ic_comprovante_residencia);
END$$

DROP PROCEDURE IF EXISTS adicionar_leitor$$
CREATE PROCEDURE adicionar_leitor(
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_cpf VARCHAR(11),
  IN p_cd_telefone VARCHAR(11),
  IN p_ic_comprovante_residencia TINYINT,
  IN p_nm_senha VARCHAR(64)
)
BEGIN
  DECLARE v_cd_email_leitor INT;

  IF p_cd_email_leitor IS NULL THEN
    SELECT COALESCE(MAX(cd_email_leitor), 0) + 1 INTO v_cd_email_leitor FROM leitor;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF v_cd_email_leitor IS NOT NULL AND p_nm_leitor IS NOT NULL
     AND p_cd_cpf IS NOT NULL AND p_cd_telefone IS NOT NULL
     AND p_ic_comprovante_residencia IS NOT NULL AND p_nm_senha IS NOT NULL THEN
    INSERT INTO leitor
      VALUES (v_cd_email_leitor, p_nm_leitor, p_cd_cpf, p_cd_telefone, p_ic_comprovante_residencia, p_nm_senha);
  END IF;
END$$

DROP PROCEDURE IF EXISTS alterar_leitor$$
CREATE PROCEDURE alterar_leitor(
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_cpf VARCHAR(11),
  IN p_cd_telefone VARCHAR(11),
  IN p_ic_comprovante_residencia TINYINT,
  IN p_nm_senha VARCHAR(64)
)
BEGIN
  IF p_cd_email_leitor IS NOT NULL THEN
    UPDATE leitor
      SET nm_leitor = COALESCE(p_nm_leitor, nm_leitor),
          cd_cpf = COALESCE(p_cd_cpf, cd_cpf),
          cd_telefone = COALESCE(p_cd_telefone, cd_telefone),
          ic_comprovante_residencia = COALESCE(p_ic_comprovante_residencia, ic_comprovante_residencia),
          nm_senha = COALESCE(p_nm_senha, nm_senha)
    WHERE cd_email_leitor = p_cd_email_leitor;
  END IF;
END$$


/* =========================================
   RESERVAS
========================================= */
    
    DROP PROCEDURE IF EXISTS listar_reservas$$
CREATE PROCEDURE listar_reservas(
  IN p_cd_reserva INT,
  IN p_dt_reserva DATETIME,
  IN p_cd_email_leitor INT,
  IN p_cd_exemplar INT,
  IN p_nm_leitor VARCHAR(200)
)
BEGIN
  SELECT r.*
    FROM reserva r
    JOIN leitor l ON r.cd_email_leitor = l.cd_email_leitor
   WHERE (p_cd_reserva IS NULL OR r.cd_reserva = p_cd_reserva)
     AND (p_dt_reserva IS NULL OR r.dt_reserva = p_dt_reserva)
     AND (p_cd_email_leitor IS NULL OR r.cd_email_leitor = p_cd_email_leitor)
     AND (p_cd_exemplar IS NULL OR r.cd_exemplar = p_cd_exemplar)
     AND (p_nm_leitor IS NULL OR l.nm_leitor = p_nm_leitor);
END$$


DROP PROCEDURE IF EXISTS adicionar_reserva$$
CREATE PROCEDURE adicionar_reserva(
  IN p_cd_reserva INT,
  IN p_dt_reserva DATETIME,
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_exemplar INT
)
BEGIN
  DECLARE v_cd_reserva INT;
  DECLARE v_cd_email_leitor INT;

  IF p_cd_reserva IS NULL THEN
    SELECT COALESCE(MAX(cd_reserva), 0) + 1 INTO v_cd_reserva FROM reserva;
  ELSE
    SET v_cd_reserva = p_cd_reserva;
  END IF;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor
      FROM leitor
     WHERE nm_leitor = p_nm_leitor
     LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF v_cd_reserva IS NOT NULL
     AND p_dt_reserva IS NOT NULL
     AND v_cd_email_leitor IS NOT NULL
     AND p_cd_exemplar IS NOT NULL THEN
    INSERT INTO reserva
      VALUES (v_cd_reserva, p_dt_reserva, v_cd_email_leitor, p_cd_exemplar);
  END IF;
END$$



DROP PROCEDURE IF EXISTS alterar_reserva$$
CREATE PROCEDURE alterar_reserva(
  IN p_cd_reserva INT,
  IN p_dt_reserva DATETIME,
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_exemplar INT
)
BEGIN
  DECLARE v_cd_email_leitor INT;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor
      FROM leitor
     WHERE nm_leitor = p_nm_leitor
     LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF p_cd_reserva IS NOT NULL THEN
    UPDATE reserva
       SET dt_reserva = COALESCE(p_dt_reserva, dt_reserva),
           cd_email_leitor = COALESCE(v_cd_email_leitor, cd_email_leitor),
           cd_exemplar = COALESCE(p_cd_exemplar, cd_exemplar)
     WHERE cd_reserva = p_cd_reserva;
  END IF;
END$$



/* =========================================
   DOAÇÕES
========================================= */
    
    DROP PROCEDURE IF EXISTS listar_doacoes$$
CREATE PROCEDURE listar_doacoes(
  IN p_cd_doacao INT,
  IN p_nm_livro VARCHAR(45),
  IN p_cd_biblioteca INT,
  IN p_cd_email_leitor INT,
  IN p_nm_biblioteca VARCHAR(200),
  IN p_nm_leitor VARCHAR(200)
)
BEGIN
  SELECT d.*
    FROM doacao d
    JOIN biblioteca b ON d.cd_biblioteca = b.cd_biblioteca
    JOIN leitor l ON d.cd_email_leitor = l.cd_email_leitor
   WHERE (p_cd_doacao IS NULL OR d.cd_doacao = p_cd_doacao)
     AND (p_nm_livro IS NULL OR d.nm_livro = p_nm_livro)
     AND (p_cd_biblioteca IS NULL OR d.cd_biblioteca = p_cd_biblioteca)
     AND (p_cd_email_leitor IS NULL OR d.cd_email_leitor = p_cd_email_leitor)
     AND (p_nm_biblioteca IS NULL OR b.nm_biblioteca = p_nm_biblioteca)
     AND (p_nm_leitor IS NULL OR l.nm_leitor = p_nm_leitor);
END$$


DROP PROCEDURE IF EXISTS adicionar_doacao$$
CREATE PROCEDURE adicionar_doacao(
  IN p_cd_doacao INT,
  IN p_nm_livro VARCHAR(45),
  IN p_cd_biblioteca INT,
  IN p_nm_biblioteca VARCHAR(200),
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200)
)
BEGIN
  DECLARE v_cd_doacao INT;
  DECLARE v_cd_biblioteca INT;
  DECLARE v_cd_email_leitor INT;

  IF p_cd_doacao IS NULL THEN
    SELECT COALESCE(MAX(cd_doacao), 0) + 1 INTO v_cd_doacao FROM doacao;
  ELSE
    SET v_cd_doacao = p_cd_doacao;
  END IF;

  IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca INTO v_cd_biblioteca FROM biblioteca WHERE nm_biblioteca = p_nm_biblioteca LIMIT 1;
  ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
  END IF;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor FROM leitor WHERE nm_leitor = p_nm_leitor LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF v_cd_doacao IS NOT NULL
     AND p_nm_livro IS NOT NULL
     AND v_cd_biblioteca IS NOT NULL
     AND v_cd_email_leitor IS NOT NULL THEN
    INSERT INTO doacao
      VALUES (v_cd_doacao, p_nm_livro, v_cd_biblioteca, v_cd_email_leitor);
  END IF;
END$$



DROP PROCEDURE IF EXISTS alterar_doacao$$
CREATE PROCEDURE alterar_doacao(
  IN p_cd_doacao INT,
  IN p_nm_livro VARCHAR(45),
  IN p_cd_biblioteca INT,
  IN p_nm_biblioteca VARCHAR(200),
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200)
)
BEGIN
  DECLARE v_cd_biblioteca INT;
  DECLARE v_cd_email_leitor INT;

  IF p_cd_biblioteca IS NULL AND p_nm_biblioteca IS NOT NULL THEN
    SELECT cd_biblioteca INTO v_cd_biblioteca FROM biblioteca WHERE nm_biblioteca = p_nm_biblioteca LIMIT 1;
  ELSE
    SET v_cd_biblioteca = p_cd_biblioteca;
  END IF;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor FROM leitor WHERE nm_leitor = p_nm_leitor LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF p_cd_doacao IS NOT NULL THEN
    UPDATE doacao
       SET nm_livro = COALESCE(p_nm_livro, nm_livro),
           cd_biblioteca = COALESCE(v_cd_biblioteca, cd_biblioteca),
           cd_email_leitor = COALESCE(v_cd_email_leitor, cd_email_leitor)
     WHERE cd_doacao = p_cd_doacao;
  END IF;
END$$

/* =========================================
   EMPRESTIMOS
========================================= */
    
    DROP PROCEDURE IF EXISTS listar_emprestimos$$
CREATE PROCEDURE listar_emprestimos(
  IN p_cd_emprestimo INT,
  IN p_dt_emprestimo DATETIME,
  IN p_dt_devolucao_esperada DATETIME,
  IN p_dt_devolucao DATETIME,
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_exemplar INT
)
BEGIN
  SELECT e.*
    FROM emprestimo e
    JOIN leitor l ON e.cd_email_leitor = l.cd_email_leitor
   WHERE (p_cd_emprestimo IS NULL OR e.cd_emprestimo = p_cd_emprestimo)
     AND (p_dt_emprestimo IS NULL OR e.dt_emprestimo = p_dt_emprestimo)
     AND (p_dt_devolucao_esperada IS NULL OR e.dt_devolucao_esperada = p_dt_devolucao_esperada)
     AND (p_dt_devolucao IS NULL OR e.dt_devolucao = p_dt_devolucao)
     AND (p_cd_email_leitor IS NULL OR e.cd_email_leitor = p_cd_email_leitor)
     AND (p_nm_leitor IS NULL OR l.nm_leitor = p_nm_leitor)
     AND (p_cd_exemplar IS NULL OR e.cd_exemplar = p_cd_exemplar);
END$$


DROP PROCEDURE IF EXISTS adicionar_emprestimo$$
CREATE PROCEDURE adicionar_emprestimo(
  IN p_cd_emprestimo INT,
  IN p_dt_emprestimo DATETIME,
  IN p_dt_devolucao_esperada DATETIME,
  IN p_dt_devolucao DATETIME,
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_exemplar INT
)
BEGIN
  DECLARE v_cd_emprestimo INT;
  DECLARE v_cd_email_leitor INT;

  IF p_cd_emprestimo IS NULL THEN
    SELECT COALESCE(MAX(cd_emprestimo), 0) + 1 INTO v_cd_emprestimo FROM emprestimo;
  ELSE
    SET v_cd_emprestimo = p_cd_emprestimo;
  END IF;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor
      FROM leitor
     WHERE nm_leitor = p_nm_leitor
     LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF v_cd_emprestimo IS NOT NULL
     AND p_dt_emprestimo IS NOT NULL
     AND p_dt_devolucao_esperada IS NOT NULL
     AND v_cd_email_leitor IS NOT NULL
     AND p_cd_exemplar IS NOT NULL THEN
    INSERT INTO emprestimo
      VALUES (v_cd_emprestimo, p_dt_emprestimo, p_dt_devolucao_esperada, p_dt_devolucao, v_cd_email_leitor, p_cd_exemplar);
  END IF;
END$$


DROP PROCEDURE IF EXISTS alterar_emprestimo$$
CREATE PROCEDURE alterar_emprestimo(
  IN p_cd_emprestimo INT,
  IN p_dt_emprestimo DATETIME,
  IN p_dt_devolucao_esperada DATETIME,
  IN p_dt_devolucao DATETIME,
  IN p_cd_email_leitor INT,
  IN p_nm_leitor VARCHAR(200),
  IN p_cd_exemplar INT
)
BEGIN
  DECLARE v_cd_email_leitor INT;

  IF p_cd_email_leitor IS NULL AND p_nm_leitor IS NOT NULL THEN
    SELECT cd_email_leitor INTO v_cd_email_leitor
      FROM leitor
     WHERE nm_leitor = p_nm_leitor
     LIMIT 1;
  ELSE
    SET v_cd_email_leitor = p_cd_email_leitor;
  END IF;

  IF p_cd_emprestimo IS NOT NULL THEN
    UPDATE emprestimo
       SET dt_emprestimo = COALESCE(p_dt_emprestimo, dt_emprestimo),
           dt_devolucao_esperada = COALESCE(p_dt_devolucao_esperada, dt_devolucao_esperada),
           dt_devolucao = COALESCE(p_dt_devolucao, dt_devolucao),
           cd_email_leitor = COALESCE(v_cd_email_leitor, cd_email_leitor),
           cd_exemplar = COALESCE(p_cd_exemplar, cd_exemplar)
     WHERE cd_emprestimo = p_cd_emprestimo;
  END IF;
END$$

    
    /* =========================================
   BIBLIOTECARIOS
========================================= */
    
    DROP PROCEDURE IF EXISTS listar_bibliotecarios$$
CREATE PROCEDURE listar_bibliotecarios(
  IN p_cd_bibliotecario INT,
  IN p_nm_bibliotecario VARCHAR(200),
  IN p_cd_registro VARCHAR(10),
  IN p_cd_biblioteca INT
)
BEGIN
  SELECT b.*
    FROM bibliotecario b
    LEFT JOIN bibliotecario_biblioteca bb ON b.cd_bibliotecario = bb.cd_bibliotecario
   WHERE (p_cd_bibliotecario IS NULL OR b.cd_bibliotecario = p_cd_bibliotecario)
     AND (p_nm_bibliotecario IS NULL OR b.nm_bibliotecario = p_nm_bibliotecario)
     AND (p_cd_registro IS NULL OR b.cd_registro = p_cd_registro)
     AND (p_cd_biblioteca IS NULL OR bb.cd_biblioteca = p_cd_biblioteca);
END$$


DROP PROCEDURE IF EXISTS adicionar_bibliotecario$$
CREATE PROCEDURE adicionar_bibliotecario(
  IN p_cd_bibliotecario INT,
  IN p_nm_bibliotecario VARCHAR(200),
  IN p_nm_senha VARCHAR(64),
  IN p_cd_registro VARCHAR(10),
  IN p_cd_biblioteca INT
)
BEGIN
  DECLARE v_cd_bibliotecario INT;

  IF p_cd_bibliotecario IS NULL THEN
    SELECT COALESCE(MAX(cd_bibliotecario), 0) + 1 INTO v_cd_bibliotecario FROM bibliotecario;
  ELSE
    SET v_cd_bibliotecario = p_cd_bibliotecario;
  END IF;

  IF v_cd_bibliotecario IS NOT NULL
     AND p_nm_bibliotecario IS NOT NULL
     AND p_nm_senha IS NOT NULL
     AND p_cd_registro IS NOT NULL
     AND p_cd_biblioteca IS NOT NULL THEN

    INSERT INTO bibliotecario (cd_bibliotecario, nm_bibliotecario, nm_senha, cd_registro)
    VALUES (v_cd_bibliotecario, p_nm_bibliotecario, p_nm_senha, p_cd_registro);

    INSERT INTO bibliotecario_biblioteca (cd_bibliotecario, cd_biblioteca)
    VALUES (v_cd_bibliotecario, p_cd_biblioteca);
  END IF;
END$$


DROP PROCEDURE IF EXISTS alterar_bibliotecario$$
CREATE PROCEDURE alterar_bibliotecario(
  IN p_cd_bibliotecario INT,
  IN p_nm_bibliotecario VARCHAR(200),
  IN p_nm_senha VARCHAR(64),
  IN p_cd_registro VARCHAR(10),
  IN p_cd_biblioteca INT
)
BEGIN
  IF p_cd_bibliotecario IS NOT NULL THEN
    UPDATE bibliotecario
       SET nm_bibliotecario = COALESCE(p_nm_bibliotecario, nm_bibliotecario),
           nm_senha = COALESCE(p_nm_senha, nm_senha),
           cd_registro = COALESCE(p_cd_registro, cd_registro)
     WHERE cd_bibliotecario = p_cd_bibliotecario;

    IF p_cd_biblioteca IS NOT NULL THEN
      DELETE FROM bibliotecario_biblioteca WHERE cd_bibliotecario = p_cd_bibliotecario;
      INSERT INTO bibliotecario_biblioteca (cd_bibliotecario, cd_biblioteca)
      VALUES (p_cd_bibliotecario, p_cd_biblioteca);
    END IF;
  END IF;
END$$

    
    
    
$$
DELIMITER ;


/*USE INFORMATION_SCHEMA;
SELECT * FROM INFORMATION_SCHEMA.PARAMETERS WHERE SPECIFIC_NAME = "listar_eventos";*/
