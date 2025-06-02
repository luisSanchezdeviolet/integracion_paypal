CREATE TABLE tm_categoria (
  cat_id INT PRIMARY KEY,
  cat_nom VARCHAR(50),
  est int
);

INSERT INTO tm_categoria (cat_id, cat_nom, est)
VALUES
  (1, 'Electrónicos', 1),
  (2, 'Ropa', 1),
  (3, 'Hogar', 1),
  (4, 'Alimentos', 1),
  (5, 'Belleza', 1);

CREATE TABLE tm_producto (
  prod_id INT PRIMARY KEY,
  cat_id INT,
  prod_nom VARCHAR(50),
  prod_precio DECIMAL(10,2),
  prod_img VARCHAR(200),
  est int
);

INSERT INTO tm_producto (prod_id, cat_id, prod_nom, prod_precio, prod_img, est)
VALUES
  (1, 1, 'Televisor LED 50', 500, 'https://www.example.com/img/tv-50-led.jpg', 1),
  (2, 1, 'Tablet Android 10', 100, 'https://www.example.com/img/tablet-10-android.jpg', 1),
  (3, 2, 'Polo Manga Corta', 20, 'https://www.example.com/img/polo-mc.jpg', 1),
  (4, 2, 'Jeans Talla 34x32', 40, 'https://www.example.com/img/jeans-34x32.jpg', 1),
  (5, 3, 'Juego de Cubiertos 16 Pzas.', 20, 'https://www.example.com/img/cubiertos-16p.jpg',1),
  (6, 3, 'Juego de Sábanas King Size', 70, 'https://www.example.com/img/sabanas-ks.jpg', 1),
  (7, 4, 'Arroz Blanco 2 Kg', 9, 'https://www.example.com/img/arroz-2kg.jpg', 1),
  (8, 4, 'Leche Descremada 1 Lt', 10, 'https://www.example.com/img/leche-descremada-1lt.jpg', 1),
  (9, 5, 'Lápiz Labial Rojo', 90, 'https://www.example.com/img/lapiz-labial-rojo.jpg', 1),
  (10, 5, 'Crema Facial Antiarrugas', 20, 'https://www.example.com/img/crema-facial-antiarrugas.jpg', 1),
  (11, 1, 'Equipo de Sonido 5.1', 200, 'https://www.example.com/img/eq-sonido-5.1.jpg', 1),
  (12, 1, 'Smartwatch con GPS', 100, 'https://www.example.com/img/smartwatch-gps.jpg', 1),
  (13, 2, 'Vestido Negro Talla M', 50, 'https://www.example.com/img/vestido-negro-m.jpg', 1),
  (14, 2, 'Zapatillas Deportivas Talla 9', 60, 'https://www.example.com/img/zapatillas-dep-9.jpg', 1),
  (15, 3, 'Juego de Toallas 6 Pzas.', 20, 'https://www.example.com/img/toallas-6p.jpg', 1);


CREATE TABLE tm_venta (
  vent_id INT AUTO_INCREMENT PRIMARY KEY,
  vent_nom VARCHAR(50),
  vent_ape VARCHAR(50),
  vent_telf VARCHAR(50),
  vent_email VARCHAR(50),
  vent_pais VARCHAR(50),
  vent_dire VARCHAR(50),
  vent_depa VARCHAR(50),
  vent_codpostal VARCHAR(50),
  vent_total NUMERIC(8,2)
);