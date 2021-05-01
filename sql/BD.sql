CREATE TABLE cuentas(
    id serial,
	referencia char(10),
    descripcion char(50),
    PRIMARY KEY(id)
);

CREATE TABLE poliza(
    id serial,
    no integer,
    fecha date,
    cuentaId char(10),
    DoH char(1),
    concepto char(250),
    saldo double(15,2),
    sumaDebe double(15,2),
    sumaHaber double(15,2),
    PRIMARY KEY(id)
);

INSERT INTO cuentas(referencia, descripcion) VALUES("1", "Activos");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1", "Activo corriente");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1.1", "Caja y bancos");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1.1.1", "Caja general");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1.1.1.1", "Caja chica O&M");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1.2", "Bancos Quetzales");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.1.2.1", "Banco G&T Cta. 1234567890 Q Test");
INSERT INTO cuentas(referencia, descripcion) VALUES("1.2", "Cuentas por cobrar");
