USE `tienda`;
DROP procedure IF EXISTS `sp_insertarFabricante`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_insertarFabricante (
in nombreI varchar(100)
)
BEGIN
INSERT INTO fabricante (nombre) VALUE (nombreI);
END$$

DELIMITER ;

USE `tienda`;
DROP procedure IF EXISTS `sp_insertarProducto`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_insertarProducto (
in nomProductoI varchar(100),
in costoProductoI double,
in codigoFabricanteI int
)
BEGIN
INSERT INTO producto (nombre, precio, codigo_fabricante) 
        VALUE (nomProductoI, costoProductoI, codigoFabricanteI);
END$$

DELIMITER ;

USE `tienda`;
DROP procedure IF EXISTS `sp_mostrarFabricantes`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_mostrarFabricantes ()
BEGIN
SELECT * FROM fabricante;

END$$

DELIMITER ;

USE `tienda`;
DROP procedure IF EXISTS `sp_mostrarProductos`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_mostrarProductos ()
BEGIN
SELECT producto.codigo, producto.nombre, producto.precio, fabricante.nombre AS fabricante
      FROM producto
      INNER JOIN fabricante
      ON producto.codigo_fabricante = fabricante.codigo ORDER BY producto.codigo ASC;
END$$

DELIMITER ;

USE `tienda`;
DROP procedure IF EXISTS `sp_eliminarFabricante`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_eliminarFabricante (
in codigoD int 
)
BEGIN
	DELETE FROM fabricante WHERE codigo = codigoD;
END$$

DELIMITER ;


USE `tienda`;
DROP procedure IF EXISTS `sp_editarFabricante`;

DELIMITER $$
USE `tienda`$$
CREATE PROCEDURE sp_editarFabricante (
	in nombreU varchar(100),
    in codigoU int
)
BEGIN
	UPDATE fabricante SET nombre = nombreU WHERE codigo = codigoU;

END$$

DELIMITER ;

