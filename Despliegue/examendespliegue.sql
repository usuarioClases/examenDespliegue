SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS examendespliegue DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE examendespliegue;

CREATE TABLE artículos (
  Código int(11) NOT NULL,
  Descripción varchar(50) NOT NULL,
  Precio int(4) NOT NULL,
  Albarán varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO artículos (Código, Descripción, Precio, Albarán) VALUES(123456789, 'Es un tornillo de estrella', 1, 'abc');

CREATE TABLE cabecera_de_ventas (
  Albarán varchar(40) NOT NULL,
  Factura varchar(40) NOT NULL,
  Fecha varchar(10) NOT NULL,
  DNI varchar(10) NOT NULL,
  Total int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO cabecera_de_ventas (Albarán, Factura, Fecha, DNI, Total) VALUES('abc', '3 Tornillos', '10/03/2021', '11111111T', 3);

CREATE TABLE clientes (
  DNI varchar(10) NOT NULL,
  Nombre varchar(30) NOT NULL,
  Dirección varchar(30) NOT NULL,
  Teléfono int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO clientes (DNI, Nombre, Dirección, Teléfono) VALUES('11111111T', 'Julian', 'Instituto', 111111111);


ALTER TABLE artículos
  ADD PRIMARY KEY (Código);

ALTER TABLE cabecera_de_ventas
  ADD PRIMARY KEY (Albarán);

ALTER TABLE clientes
  ADD PRIMARY KEY (DNI);


ALTER TABLE artículos
  MODIFY Código int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
