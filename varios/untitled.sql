drop database museo;
create database museo;

use museo;

create table TIPO_EMPLEADO(
	id_temp int(1) not null AUTO_INCREMENT,
	tipo_emp varchar(30) not null,
	primary key(id_temp),
	unique(tipo_emp)
);

create table EMPLEADOS(
	id_emp int(2) not null AUTO_INCREMENT,
	nombre_emp varchar(30) not null,
	apellido_pat varchar(30) not null,
	apellido_mat varchar(30) not null,
	telefono_emp varchar(11) not null,
	correo_emp varchar(30) not null,
	contra_emp varchar(30) not null,
	primary key(id_emp),
	unique(correo_emp)
);


create or replace table DETALLE_TIPO_EMPLEADOS(
	id_emp int(2) not null,
	id_temp int(1) not null,
	fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    primary key(id_emp,id_temp),
	foreign key (id_emp) references EMPLEADOS(id_emp),
	foreign key (id_temp) references TIPO_EMPLEADO(id_temp)
);

create table TIPO_VISITANTE(
	id_tvis int(1) not null AUTO_INCREMENT,
	tipo_tvis varchar(20) not null,
	primary key(id_tvis),
	unique(tipo_tvis)
);

create table DELEGACIONES(
	id_del int(2) not null AUTO_INCREMENT,
	delegacion varchar(30) not null,
	primary key(id_del)
);

create table MUSEOS(
	id_mus int(2) not null AUTO_INCREMENT,
	id_del int(2) not null,
	imagen_mus varchar(50) not null,
	nombre_mus varchar(30) not null,
	desc_mus BLOB not null,
	dir_mus varchar(50) not null,
	precio_mus numeric(4,1) not null,
	primary key(id_mus),
	foreign key(id_del) references DELEGACIONES(id_del),
	unique(nombre_mus)
);

create table SALAS(
	id_sala int(2) not null AUTO_INCREMENT,
	id_mus int(2) not null,
	nombre_sala varchar(30) not null,
	cuerpo_sala blob not null,
	primary key(id_sala,id_mus),
	foreign key(id_mus) references MUSEOS(id_mus),
	unique(id_mus,nombre_sala)
);

create table ESTADOS(
	id_est int(2) not null AUTO_INCREMENT,
	estado varchar(30) not null,
	primary key(id_est)
);

create table EVALUACIONES(
	id_ev  int(4) not null AUTO_INCREMENT,
	id_tvis int(1) not null,
	id_est int(2) not null,
	id_mus int(2) not null,
	puntaje_ev int(1) not null,
	opinion_ev varchar(255) not null,
	sexo varchar(1) not null,
	primary key(id_ev),
	foreign key(id_tvis) references TIPO_VISITANTE(id_tvis),
	foreign key(id_est) references ESTADOS(id_est),
	foreign key(id_mus) references MUSEOS(id_mus)

);