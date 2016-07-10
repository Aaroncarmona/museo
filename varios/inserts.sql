insert into DELEGACIONES(delegacion) values ('Álvaro Obregón');
insert into DELEGACIONES(delegacion) values ('Azcapotzalco');
insert into DELEGACIONES(delegacion) values ('Benito Juárez');
insert into DELEGACIONES(delegacion) values ('Coyoacán');
insert into DELEGACIONES(delegacion) values ('Cuajimalpa de Morelos');
insert into DELEGACIONES(delegacion) values ('Cuauhtémoc');
insert into DELEGACIONES(delegacion) values ('Gustavo A. Madero');
insert into DELEGACIONES(delegacion) values ('Iztacalco');
insert into DELEGACIONES(delegacion) values ('Iztapalapa');
insert into DELEGACIONES(delegacion) values ('Magdalena Contreras');
insert into DELEGACIONES(delegacion) values ('Miguel Hidalgo');
insert into DELEGACIONES(delegacion) values ('Milpa Alta');
insert into DELEGACIONES(delegacion) values ('Tláhuac');
insert into DELEGACIONES(delegacion) values ('Tlalpan');
insert into DELEGACIONES(delegacion) values ('Venustiano Carranza');
insert into DELEGACIONES(delegacion) values ('Xochimilco');


insert into ESTADOS(estado) values('Aguascalientes');
insert into ESTADOS(estado) values('Baja California');
insert into ESTADOS(estado) values('Baja California Sur');
insert into ESTADOS(estado) values('Campeche');
insert into ESTADOS(estado) values('Coahuila de Zaragoza');
insert into ESTADOS(estado) values('Colima');
insert into ESTADOS(estado) values('Chiapas');
insert into ESTADOS(estado) values('Chihuahua');
insert into ESTADOS(estado) values('Distrito Federal');
insert into ESTADOS(estado) values('Durango');
insert into ESTADOS(estado) values('Guanajuato');
insert into ESTADOS(estado) values('Guerrero');
insert into ESTADOS(estado) values('Hidalgo');
insert into ESTADOS(estado) values('Jalisco');
insert into ESTADOS(estado) values('México');
insert into ESTADOS(estado) values('Michoacán de Ocampo');
insert into ESTADOS(estado) values('Morelos');
insert into ESTADOS(estado) values('Nayarit');
insert into ESTADOS(estado) values('Nuevo León');
insert into ESTADOS(estado) values('Oaxaca');
insert into ESTADOS(estado) values('Puebla');
insert into ESTADOS(estado) values('Querétaro');
insert into ESTADOS(estado) values('Quintana Roo');
insert into ESTADOS(estado) values('San Luis Potosí');
insert into ESTADOS(estado) values('Sinaloa');
insert into ESTADOS(estado) values('Sonora');
insert into ESTADOS(estado) values('Tabasco');
insert into ESTADOS(estado) values('Tamaulipas');
insert into ESTADOS(estado) values('Tlaxcala');
insert into ESTADOS(estado) values('Veracruz de Ignacio de la Llave');
insert into ESTADOS(estado) values('Yucatán');
insert into ESTADOS(estado) values('Zacatecas');
insert into ESTADOS(estado) values('Otro');

insert into TIPO_VISITANTE(tipo_tvis) values('Niño');
insert into TIPO_VISITANTE(tipo_tvis) values('Estudiantes');
insert into TIPO_VISITANTE(tipo_tvis) values('Adultos');
insert into TIPO_VISITANTE(tipo_tvis) values('Trabajadores');
insert into TIPO_VISITANTE(tipo_tvis) values(' Viejo');


insert into TIPO_EMPLEADO(tipo_emp) values('Admin');
insert into TIPO_EMPLEADO(tipo_emp) values('Empleado');


insert into MUSEOS(id_del,imagen_mus,nombre_mus,desc_mus,dir_mus,precio_mus) values(1,'museos.museo.png','El chido','klajsdklfjaksldjfkaldjfkaj','kjadjlkajdf',200);

insert into HORARIOS(id_dia,id_mus,hora_in,hora_fn) values(1,1,'08:00:00','06:00:00');


/*CONTROL DE USUARIOS*/
insert into EMPLEADOS(nombre_emp,apellido_pat,apellido_mat,telefono_emp,correo_emp,contra_emp) values('AARON ADRIAN','CARMONA','ESPINOSA','54412194','carmonespi@gmail.com','carmona11');
insert into DETALLE_TIPO_EMPLEADOS(id_emp,id_temp,fecha) values(1,1,'10/10/10');

/*FIN CONTROL DE USUARIOS*/

/*INSERT SALAS*/
insert into SALAS(id_sala,id_mus,nombre_sala) values(1,1,"SALA 1"),(2,1,"SALA 2");


INSERT INTO DETALLE_MUS_SAL(id_mus,id_sala,titulo,cuerpo) values(1,1,"este no va a ir","esta sala fue para todas las personas blablabla"),(1,2,"esto se va a quitar","soy el chido");
