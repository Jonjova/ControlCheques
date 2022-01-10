create database if not exists sis_cc;
 drop  database sis_cc;
use sis_cc;

/*========================================================
						Tabla de tipo de bancos 													   
==========================================================*/
create table if not exists tipo_bancos(
	id_tipo_banco int not null primary key auto_increment,
	nombre_banco varchar(250) not null
);
/*========================================================
						Tabla de datos cuenta 													   
==========================================================*/
create table if not exists datos_cuenta(
  id_datos_cuenta int not null primary key auto_increment,
  digitos_cuenta varchar(25) not null,
  nombre_de varchar(250) not null,
  id_tipo_banco int not null,
  foreign key (id_tipo_banco) references tipo_bancos(id_tipo_banco)
);

/*========================================================
						Tabla de cheques 													   
==========================================================*/
create table if not exists cheques(
	id_cheques  int not null primary key auto_increment ,
    numero_cheque varchar(15) not null,
    id_datos_cuenta int not null,
    fecha_chueque date not null,
    foto varchar(200) not null ,
    monto int not null,
	foreign key (id_datos_cuenta) references datos_cuenta(id_datos_cuenta)
);


-- create table tipo
select * from datos_cuenta;
select * from tipo_bancos;
select * from cheques;


