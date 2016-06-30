drop database museo;
create database museo;

use museo;

create table TIPO_EMPLEADO(
	id_temp int(1) not null AUTO_INCREMENT,
	tipo_emp varchar(30) not null,
	primary key(id_temp)
);

create table EMPLEADOS(
	id_emp int(2) not null AUTO_INCREMENT,
	nombre_emp varchar(30) not null,
	apellido_pat varchar(30) not null,
	apellido_mat varchar(30) not null,
	telefono_emp varchar(11) not null,
	correo_emp varchar(30) not null,
	contra_emp varchar(30) not null,
	primary key(id_emp)
);


create table DETALLE_TIPO_EMPLEADOS(
	id_emp int(2) not null,
	id_temp int(1) not null,
	fecha date not null,/*se agrego*/
	foreign key (id_emp) references EMPLEADOS(id_emp),
	foreign key (id_temp) references TIPO_EMPLEADO(id_temp)
);

create table TIPO_VISITANTE(
	id_tvis int(1) not null AUTO_INCREMENT,
	tipo_tvis varchar(20) not null,
	primary key(id_tvis)
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
	foreign key(id_del) references DELEGACIONES(id_del)
);


create table SALAS(
	id_sala int(2) not null AUTO_INCREMENT,
	id_mus int(2) not null,
	nombre_sala varchar(30) not null,
	primary key(id_sala),
	foreign key(id_mus) references MUSEOS(id_mus)
);

create table DETALLE_MUS_SAL(
	id_mus int(2) not null,
	id_sala int(2) not null,
	titulo varchar(30) not null,
	cuerpo BLOB not null,
	primary key(id_mus,id_sala),
	foreign key(id_mus) references MUSEOS(id_mus),
	foreign key(id_sala) references SALAS(id_sala)
);

create table ESTADOS(
	id_est int(2) not null AUTO_INCREMENT,
	estado varchar(30) not null,
	primary key(id_est)
);

create table EVALUACIONES(
	id_ev  int(4) not null AUTO_INCREMENT,
	puntaje_ev int(1) not null,
	opinion_ev varchar(255) not null,
	sexo varchar(1) not null,
	id_tvis int(1) not null,
	id_est int(2) not null,
	primary key(id_ev),
	foreign key(id_tvis) references TIPO_VISITANTE(id_tvis),
	foreign key(id_est) references ESTADOS(id_est)
);



/*POR SI VA LO DE LOS HORARIOS*/


create table DIAS(
	id_dia int(1) not null AUTO_INCREMENT,
	dia varchar(20) not null,
	primary key(id_dia)
);

create table HORARIOS(
	id_horario int(2) not null AUTO_INCREMENT,
	id_dia int(1) not null,
	id_mus int(2) not null,
	hora_in time not null,
	hora_fn time not null,
	primary key(id_horario),
	foreign key(id_dia) references DIAS(id_dia),
	foreign key(id_mus) references MUSEOS(id_mus)
);

/*esto es opcional*/