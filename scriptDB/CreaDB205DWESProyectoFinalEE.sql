USE dbs9174047;

CREATE TABLE IF NOT EXISTS T02_Departamento (
  T02_CodDepartamento VARCHAR(3) NOT NULL PRIMARY KEY,
  T02_DescDepartamento VARCHAR (255) NOT NULL,
  T02_FechaCreacionDepartamento DATETIME NOT NULL,
  T02_VolumenNegocio FLOAT NOT NULL,
  T02_FechaBaja DATETIME) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS T01_Usuario (
  T01_CodUsuario VARCHAR(8) NOT NULL PRIMARY KEY,
  T01_Password VARCHAR (255) NOT NULL,
  T01_DescUsuario VARCHAR(255) NOT NULL,
  T01_NumConexiones INT NOT NULL,
  T01_FechaHoraUltimaConexion DATETIME NOT NULL,
  T01_Perfil ENUM('usuario','administrador') NOT NULL,
  T01_ImagenUsuario LONGBLOB) ENGINE = INNODB;


