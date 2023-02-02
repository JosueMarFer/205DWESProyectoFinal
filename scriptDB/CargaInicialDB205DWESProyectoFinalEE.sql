USE dbs9174047;

INSERT INTO T02_Departamento VALUES 
    (UPPER("con"), "contabilidad", NOW(), 45000, null),
    (UPPER("dir"), "direccion", NOW(), 500000, null),
    (UPPER("idi"), "investigacion desarrollo inovacion", NOW(), 60000, null),
    (UPPER("rhu"), "recursos humanos", NOW(), 20000, null),
    (UPPER("man"), "mantenimiento", NOW(), 50000, null);


INSERT INTO T01_Usuario VALUES 
  ("josue", SHA2(concat("josue","paso"),256), "josue martinez fernandez", 0, NOW(), "administrador", null),
  ("alex", SHA2(concat("alex","paso"),256), "alejandro otalvaro marulanda", 0, NOW(), "usuario", null),
  ("david", SHA2(concat("david","paso"),256), "david aparicio sir", 0, NOW(), "usuario", null),
  ("ricardo", SHA2(concat("ricardo","paso"),256), "ricardo santiago tome", 0, NOW(), "usuario", null),
  ("manuel", SHA2(concat("manuel","paso"),256), "manuel martin alonso", 0, NOW(), "usuario", null),
  ("luis", SHA2(concat("luis","paso"),256), "luis perez astorga", 0, NOW(), "usuario", null),
  ("alberto", SHA2(concat("alberto","paso"),256), "alberto bahillo fernandez", 0, NOW(), "administrador", null),
  ("heraclio", SHA2(concat("heraclio","paso"),256), "heraclio borbujo moran", 0, NOW(), "administrador", null);