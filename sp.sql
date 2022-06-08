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
