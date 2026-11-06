CREATE TABLE departamentos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_numero VARCHAR(50) NOT NULL,
    edificio VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    piso VARCHAR(20) NOT NULL,
    habitaciones TINYINT UNSIGNED NOT NULL,
    banos DECIMAL(3,1) UNSIGNED NOT NULL,
    descripcion TEXT NULL,
    precio_renta DECIMAL(10,2) UNSIGNED NOT NULL,
    deposito DECIMAL(10,2) UNSIGNED NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    contacto VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    KEY idx_departamentos_direccion (direccion)
);


CREATE TABLE imagenes (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_departamento INT UNSIGNED NOT NULL,
    ruta VARCHAR(500) NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_imagenes_departamento (id_departamento),
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id)
);


CREATE TABLE usuarios (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NULL,
    apellidos VARCHAR(100) NULL,
    fecha_nacimiento DATE NULL,
    telefono VARCHAR(20) NULL,
    correo VARCHAR(254) NOT NULL,
    contrasena VARCHAR(255) NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    rol TINYINT UNSIGNED NOT NULL DEFAULT 1,
    estado TINYINT UNSIGNED NOT NULL DEFAULT 1,
    token_usuario VARCHAR(255) NOT NULL,

    PRIMARY KEY (id),
    UNIQUE KEY uq_usuarios_correo (correo),
    UNIQUE KEY uq_usuarios_token (token_usuario),

    CHECK (rol IN (1, 2, 3)),
    CHECK (estado IN (0, 1))
);

CREATE TABLE contratos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    folio VARCHAR(30) NOT NULL,
    id_departamento INT UNSIGNED NOT NULL,
    id_inquilino INT UNSIGNED NOT NULL,
    fecha_inicio DATE NOT NULL,
    cantidad_meses SMALLINT UNSIGNED NOT NULL,
    fecha_salida DATE NULL,
    renta_mensual DECIMAL(10,2) UNSIGNED NOT NULL,
    dia_pago TINYINT UNSIGNED NOT NULL,
    deposito DECIMAL(10,2) UNSIGNED NOT NULL,
    fecha_firma DATE NULL,
    estado ENUM(
        'borrador',
        'pendiente_firma',
        'vigente',
        'vencido',
        'terminado',
        'cancelado'
    ) NOT NULL DEFAULT 'borrador',
    observaciones TEXT NULL,
    ruta_archivo VARCHAR(500) NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_contratos_folio (folio),
    KEY idx_contratos_departamento (id_departamento),
    KEY idx_contratos_inquilino (id_inquilino),
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id),
    FOREIGN KEY (id_inquilino) REFERENCES usuarios(id),
    CHECK (cantidad_meses > 0),
    CHECK (dia_pago BETWEEN 1 AND 31)
);


CREATE TABLE rentas (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_contrato INT UNSIGNED NOT NULL,
    numero_renta SMALLINT UNSIGNED NOT NULL,
    periodo CHAR(7) NOT NULL,
    estado ENUM('pendiente', 'vencido', 'completado')
        NOT NULL DEFAULT 'pendiente',
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_rentas_contrato_numero (id_contrato, numero_renta),
    UNIQUE KEY uq_rentas_contrato_periodo (id_contrato, periodo),
    FOREIGN KEY (id_contrato) REFERENCES contratos(id),
    CHECK (numero_renta > 0)
);


CREATE TABLE pagos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_renta INT UNSIGNED NOT NULL,
    fecha_pago DATE NOT NULL,
    monto DECIMAL(10,2) UNSIGNED NOT NULL,
    metodo_pago ENUM('efectivo', 'transferencia') NOT NULL,
    referencia VARCHAR(100) NULL,
    comprobante VARCHAR(500) NULL,
    estado ENUM('pendiente', 'rechazado', 'aprobado')
        NOT NULL DEFAULT 'pendiente',
    id_usuario_revisor INT UNSIGNED NULL,
    observaciones TEXT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_pagos_renta (id_renta),
    KEY idx_pagos_usuario_revisor (id_usuario_revisor),
    FOREIGN KEY (id_renta) REFERENCES rentas(id),
    FOREIGN KEY (id_usuario_revisor) REFERENCES usuarios(id)
);


CREATE TABLE mantenimientos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_departamento INT UNSIGNED NOT NULL,
    id_usuario_registro INT UNSIGNED NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_reporte DATETIME NOT NULL,
    fecha_inicio DATETIME NULL,
    fecha_finalizacion DATETIME NULL,
    estado ENUM(
        'pendiente',
        'programado',
        'en_proceso',
        'finalizado',
        'cancelado'
    ) NOT NULL DEFAULT 'pendiente',
    responsable VARCHAR(150) NULL,
    costo DECIMAL(10,2) UNSIGNED NULL,
    observaciones TEXT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_mantenimientos_departamento (id_departamento),
    KEY idx_mantenimientos_usuario_registro (id_usuario_registro),
    FOREIGN KEY (id_departamento) REFERENCES departamentos(id),
    FOREIGN KEY (id_usuario_registro) REFERENCES usuarios(id)
);


CREATE TABLE logs (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    mensaje TEXT NOT NULL,
    fecha_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_usuario INT UNSIGNED NULL,

    PRIMARY KEY (id),
    KEY idx_logs_usuario (id_usuario),

    CONSTRAINT fk_logs_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE SET NULL
);

-- 1. Buscar un usuario por su correo
DELIMITER $$
CREATE PROCEDURE buscar_usuario(
    IN p_correo VARCHAR(254)
)
BEGIN
    SELECT
        id,
        nombre,
        apellidos,
        correo,
        rol,
        estado,
        fecha_registro
    FROM usuarios
    WHERE correo = p_correo
    LIMIT 1;
END$$


-- 2. Insertar un registro en la tabla logs
CREATE PROCEDURE insertar_log(
    IN p_mensaje TEXT,
    IN p_id_usuario INT UNSIGNED
)
BEGIN
    INSERT INTO logs (
        mensaje,
        fecha_hora,
        id_usuario
    )
    VALUES (
        p_mensaje,
        NOW(),
        p_id_usuario
    );
END$$


-- 3. Insertar un nuevo usuario y devolver el ID generado
CREATE PROCEDURE insertar_usuario(
    IN p_correo VARCHAR(254),
    IN p_token_usuario VARCHAR(255)
)
BEGIN
    INSERT INTO usuarios (
        correo,
        token_usuario
    )
    VALUES (
        p_correo,
        p_token_usuario
    );

    SELECT LAST_INSERT_ID() AS nuevo_id;
END$$

-- 4. Insertar un nuevo departamento y devolver el ID generado
CREATE PROCEDURE insertar_departamento (
    p_nombre_numero VARCHAR(50),
    p_edificio VARCHAR(100),
    p_direccion VARCHAR(255),
    p_piso VARCHAR(20),
    p_habitaciones TINYINT UNSIGNED,
    p_banos DECIMAL(3,1) UNSIGNED,
    p_descripcion TEXT,
    p_precio_renta DECIMAL(10,2) UNSIGNED ,
    p_deposito DECIMAL(10,2) UNSIGNED,
    p_contacto VARCHAR(100)
)
BEGIN
    INSERT INTO departamentos (
        nombre_numero,
        edificio,
        direccion,
        piso,
        habitaciones,
        banos,
        descripcion,
        precio_renta,
        deposito,
        contacto
    )
    VALUES (
        p_nombre_numero,
        p_edificio,
        p_direccion,
        p_piso,
        p_habitaciones,
        p_banos,
        p_descripcion,
        p_precio_renta,
        p_deposito,
        p_contacto
    );

    SELECT LAST_INSERT_ID() AS nuevo_id;
END$$

-- 5. Actualizar un departamento
CREATE PROCEDURE actualizar_departamento (
    IN p_id INT UNSIGNED,
    IN p_nombre_numero VARCHAR(50),
    IN p_edificio VARCHAR(100),
    IN p_direccion VARCHAR(255),
    IN p_piso VARCHAR(20),
    IN p_habitaciones TINYINT UNSIGNED,
    IN p_banos DECIMAL(3,1) UNSIGNED,
    IN p_descripcion TEXT,
    IN p_precio_renta DECIMAL(10,2) UNSIGNED,
    IN p_deposito DECIMAL(10,2) UNSIGNED,
    IN p_contacto VARCHAR(100)
)
BEGIN
    UPDATE departamentos
    SET nombre_numero = COALESCE(p_nombre_numero, nombre_numero),
        edificio = COALESCE(p_edificio, edificio),
        direccion = COALESCE(p_direccion, direccion),
        piso = COALESCE(p_piso, piso),
        habitaciones = COALESCE(p_habitaciones, habitaciones),
        banos = COALESCE(p_banos, banos),
        descripcion = p_descripcion,
        precio_renta = COALESCE(p_precio_renta, precio_renta),
        deposito = COALESCE(p_deposito, deposito),
        contacto = COALESCE(p_contacto, contacto)
    WHERE id = p_id;
END$$


-- 6. Insertar una imagen a un departamento
CREATE PROCEDURE insertar_imagen (
    IN p_id_departamento INT UNSIGNED,
    IN p_ruta TEXT
)
BEGIN
    INSERT INTO imagenes (
        id_departamento,
        ruta
    )
    VALUES (
        p_id_departamento,
        p_ruta
    );
END$$


-- 7. Eliminar una imagen de un departamento
CREATE PROCEDURE eliminar_imagen (
    IN p_id_imagen INT UNSIGNED
)
BEGIN
    DELETE FROM imagenes
    WHERE id = p_id_imagen;
END$$


-- 8. Consultar departamentos e incluir sus imagenes en un arreglo 
CREATE PROCEDURE consultar_departamentos ()
BEGIN
    -- Falta verificar que no existan contratos vigentes y mantenmientos pendientes para asignar un estado
    SELECT d.*, 
           COALESCE(
               (
                   SELECT JSON_ARRAYAGG(i.ruta)
                   FROM imagenes i
                   WHERE i.id_departamento = d.id
               ),
               JSON_ARRAY()
           ) AS imagenes
    FROM departamentos d;
END$$


-- 9. Insertar un mantenimiento y devolver el ID generado
CREATE PROCEDURE insertar_mantenimiento (
    IN p_id_departamento INT UNSIGNED,
    IN p_id_usuario_registro INT UNSIGNED,
    IN p_titulo VARCHAR(150),
    IN p_descripcion TEXT,
    IN p_fecha_reporte DATETIME,
    IN p_fecha_inicio DATETIME,
    IN p_fecha_finalizacion DATETIME,
    IN p_responsable VARCHAR(150),
    IN p_costo DECIMAL(10,2) UNSIGNED,
    IN p_observaciones TEXT
)
BEGIN
INSERT INTO mantenimientos (
    id_departamento,
    id_usuario_registro,
    titulo,
    descripcion,
    fecha_reporte,
    fecha_inicio,
    fecha_finalizacion,
    responsable,
    costo,
    observaciones
)
VALUES (
    p_id_departamento,
    p_id_usuario_registro,
    p_titulo,
    p_descripcion,
    p_fecha_reporte,
    p_fecha_inicio,
    p_fecha_finalizacion,
    p_responsable,
    p_costo,
    p_observaciones
);

 SELECT LAST_INSERT_ID() AS nuevo_id;
END$$


 -- 10. Consultar todos los mantenimientos
CREATE PROCEDURE consultar_mantenimientos ()
BEGIN
    SELECT *
    FROM mantenimientos;
END$$


 -- 11. Actualizar un mantenimiento; los campos nullable aceptan NULL
CREATE PROCEDURE actualizar_mantenimiento (
    IN p_id INT UNSIGNED,
    IN p_id_departamento INT UNSIGNED,
    IN p_id_usuario_registro INT UNSIGNED,
    IN p_titulo VARCHAR(150),
    IN p_descripcion TEXT,
    IN p_fecha_reporte DATETIME,
    IN p_fecha_inicio DATETIME,
    IN p_fecha_finalizacion DATETIME,
    IN p_estado ENUM('pendiente', 'programado', 'en_proceso', 'finalizado', 'cancelado'),
    IN p_responsable VARCHAR(150),
    IN p_costo DECIMAL(10,2) UNSIGNED,
    IN p_observaciones TEXT
)
BEGIN
    UPDATE mantenimientos
    SET id_departamento = COALESCE(p_id_departamento, id_departamento),
        id_usuario_registro = COALESCE(p_id_usuario_registro, id_usuario_registro),
        titulo = COALESCE(p_titulo, titulo),
        descripcion = COALESCE(p_descripcion, descripcion),
        fecha_reporte = COALESCE(p_fecha_reporte, fecha_reporte),
        fecha_inicio = p_fecha_inicio,
        fecha_finalizacion = p_fecha_finalizacion,
        estado = COALESCE(p_estado, estado),
        responsable = p_responsable,
        costo = p_costo,
        observaciones = p_observaciones
    WHERE id = p_id;
END$$

-- 12. Eliminar un mantenimiento
CREATE PROCEDURE eliminar_mantenimiento (
    IN p_id INT UNSIGNED
)
BEGIN
    DELETE FROM mantenimientos
    WHERE id = p_id;
END$$

DELIMITER ;