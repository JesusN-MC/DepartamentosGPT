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
    contacto Da
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


CREATE TABLE documentos_requeridos_inquilinos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_documentos_requeridos_nombre (nombre)
);


CREATE TABLE documentos (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_inquilino INT UNSIGNED NOT NULL,
    id_documento_requerido INT UNSIGNED NOT NULL,
    ruta_archivo VARCHAR(500) NOT NULL,
    estado ENUM('pendiente', 'aprobado', 'rechazado')
        NOT NULL DEFAULT 'pendiente',
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_documentos_inquilino (id_inquilino),
    KEY idx_documentos_tipo (id_documento_requerido),
    FOREIGN KEY (id_inquilino) REFERENCES usuarios(id),
    FOREIGN KEY (id_documento_requerido)
        REFERENCES documentos_requeridos_inquilinos(id)
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

-- 3. Insertar un registro en la tabla logs
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

DELIMITER ;