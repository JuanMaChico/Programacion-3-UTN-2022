INSERT INTO usuario 
  (id_autoIncrement,nombre,apellido,clave,mail,fecha_de_registro,localidad) 
    VALUES 
      (101,'Esteban','Madou','2334', 'ggerram1@hud.gov','2021-7-1','Berazategui'),
      (102,'German','Gerram','1234','ggerram1@hud.gov','2020-08-05','Berazategui'),
      (103,'Deloris','Fosis','5678','bsharpe2@wisc.edu','2020-11-18','Avellaneda'),
      ( 104,'Brok','Neiner','4567','bblazic3@desdev.con','2020-12-08','Quilmes'),
      (105,'Garrick','Brent','6789', 'gbrent4@theguardian.com',  '2020-12-17', 'Moron'),
      (106,'Bili','Baus','0123','bhoff5@addthis.com','2020-11-27','Moreno');

 INSERT INTO producto 
  (codigo_de_barras,nombre,tipo,stock,fecha_de_creacion,fecha_de_modificacion,precio)
 VALUES 
 (77900362 ,'Spirit ','solido ',45 ,'2020-09-18','2020-04-14',69.74),
 (77900363, 'Newgrosh', 'polvo', 14, '2020-11-29', '2021-11-2', 68.19),
 (77900364 , 'McNickle ', 'polvo ', 19 , '2020-11-28', '2020-4-17',53.51),
 (77900365, 'Hudd ', 'solido ', 68 , '2020-12-19', '2020-6-19',26.56), 
 (77900366 , 'Schrader ', 'polvo ', 17 , '2020-2-8', '2020-4-18',96.54), 
 (77900367 , 'Bachellier ', 'solido ', 59 , '2021-1-30', '2020-6-7',69.17), 
 (77900368, 'Fleming ', 'solido ', 38 , '2021-10-26', '2020-3-10',66.77), 
 (77900369 , 'Hurry ', 'solido ', 44 , '2021-4-7', '2020-5-30',43.01),
 (77900310 , 'Krauss ', 'polvo ', 73 , '2021-3-3', '2021-8-30',35.73);

INSERT INTO ventas 
(id,id_producto,id_usuario,cantidad,fecha_de_venta) 
  VALUES
(1001, 101, 2, '2020-09-19'),
(1008, 102, 3, '2020-08-16'),
(1007, 102, 4, '2021-01-24'),
(1006, 103, 5, '2021-01-14'),
(1003, 104, 6, '2021-03-20'),
(1005, 105, 7, '2021-02-22'),
(1003, 104, 6, '2020-12-02'),
(1003, 106, 6, '2020-10-06'),
(1002, 106, 6, '2021-02-04'),
(1001, 106, 1, '2020-05-17');


/*

    ** Realizar las siguientes consultas **

1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
2. Obtener los detalles completos de todos los productos líquidos.
3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
4. Obtener la cantidad total de todos los productos vendidos.
5. Mostrar los primeros 3 números de productos que se han enviado.
6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
7. Indicar el monto (cantidad * precio) por cada una de las ventas.
8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’.
10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.
11. Traer las ventas entre junio del 2020 y febrero 2021.
12. Obtener los usuarios registrados antes del 2021.
13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
14.Insertar un nuevo usuario .
15.Cambiar los precios de los productos de tipo sólido a 66,60.
16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores
a 20 inclusive.
17.Eliminar el producto número 1010.
18.Eliminar a todos los usuarios que no han vendido productos.

*/



-- 1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
SELECT * FROM usuario ORDER BY nombre ASC;

-- 2. Obtener los detalles completos de todos los productos líquidos.
SELECT * FROM producto WHERE tipo = 'liquido';

-- 3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
SELECT * FROM ventas WHERE cantidad BETWEEN 6 AND 10;

-- 4. Obtener la cantidad total de todos los productos vendidos.
SELECT SUM(cantidad) FROM ventas;

-- 5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT * FROM producto ORDER BY id ASC LIMIT 3;

-- 6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
SELECT producto.nombre as nombreProducto, 
       usuario.apellido as apelldio, 
       usuario.nombre as nombre 
FROM producto, usuario, ventas 
WHERE producto.id = ventas.id_producto 
AND usuario.id_autoIncrement = ventas.id_usuario;

-- 7. Indicar el monto (cantidad * precio) por cada una de las ventas.
SELECT ventas.id as id_venta ,producto.nombre,ventas.cantidad,producto.precio, producto.precio * ventas.cantidad as precioPorVenta FROM ventas, producto 
WHERE producto.id = ventas.id_producto;

-- 8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
SELECT SUM(ventas.cantidad) FROM ventas, producto WHERE producto.id = 1003 AND ventas.id_usuario = 104;

-- 9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’.
SELECT DISTINCT ventas.id_producto,usuario.nombre ,usuario.localidad FROM ventas, usuario 
WHERE usuario.localidad = 'Avellaneda' AND ventas.id_usuario = usuario.id_autoIncrement;

-- 10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.
SELECT * FROM usuario WHERE nombre LIKE '%u%';

-- 12. Obtener los usuarios registrados antes del 2021.
SELECT * FROM usuario WHERE fecha_de_registro < '2020-12-31';

-- 13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
INSERT INTO producto (codigo_de_barras,nombre, tipo,fecha_de_creacion,fecha_de_modificacion,stock ,precio) 
VALUES (97900361,'Chocolate','solido',CURDATE(),CURDATE(),200,25.35);

-- 14.Insertar un nuevo usuario .
INSERT INTO usuario 
(nombre,apellido,fecha_de_registro,clave,mail,localidad)
VALUES ('Juan','Chico',CURDATE(),1234,'juanmanuelchico@hotmail.com','Quilmes');

-- 15.Cambiar los precios de los productos de tipo sólido a 66,60.
UPDATE producto SET precio = 66.60 WHERE tipo = 'solido';

-- 16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores a 20 inclusive.
UPDATE producto SET stock = 0 WHERE stock <= 20;

-- 17.Eliminar el producto número 1010.
DELETE FROM producto WHERE id = 1010;

-- 18.Eliminar a todos los usuarios que no han vendido productos.
DELETE FROM usuario WHERE id_autoIncrement NOT IN (SELECT id_usuario FROM ventas);
