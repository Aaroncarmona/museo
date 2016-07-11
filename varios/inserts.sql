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



INSERT INTO `MUSEOS` (`id_mus`, `id_del`, `imagen_mus`, `nombre_mus`, `desc_mus`, `dir_mus`, `precio_mus`) VALUES
(8, 6, 0x6d6964652e6a7067, 'Museo Interactivo de EconomÃ­a MIDE', 'El Museo Interactivo de EconomÃ­a (MIDE) surgiÃ³ como una iniciativa del Banco de MÃ©xico para ser un espacio de divulgaciÃ³n de la economÃ­a y las finanzas.\r\nEs el primer museo del mundo dedicado a explicar temas de economÃ­a, finanzas y desarrollo sustentable con las mÃ¡s avanzadas tecnologÃ­as, que ofrece a sus visitantes experiencias divertidas y relevantes, en un ambiente que estimula las emociones y el aprendizaje.\r\n\r\nHORARIOS\r\nMartes a domingo de 9:00 a 18:00 horas.\r\nEl cierre de taquilla es a las 17:30 horas.\r\n\r\nCOSTOS\r\nAdmisiÃ³n general	$70.00\r\nMaestros, estudiantes y personas adultas\r\nmayores con credencial vigente del INAPAM	$60.00\r\nNiÃ±os menores de 5 aÃ±os	Entrada gratuita\r\nDiseÃ±a tu propio billete	$20.00\r\nCrea tu tarjeta de crÃ©dito MIDE	$25.00\r\nSimulador del mercado	$5 pesos por persona\r\n\r\n*Costos sujetos a cambio sin previo aviso', 'Tacuba 17 (entre BolÃ­var y Filomeno Mata) Centro HistÃ³rico MÃ©xico D.F. CP 06000', 70.0),
(9, 6, 0x4c757a2e6a7067, 'Museo de la Luz - UNAM', 'Es un museo temÃ¡tico en el se exploran las diferentes facetas del fenÃ³meno de la luz y su relaciÃ³n con otros campos de la ciencia.\r\n\r\nEl Museo de la Luz ocupa el Colegio Chico del Antiguo Colegio de San Ildefonso y es una de las edificaciones coloniales mÃ¡s importantes del Centro HistÃ³rico de la Ciudad de MÃ©xico.\r\n\r\nHORARIOS\r\n\r\nMartes a Viernes de 9:00 a 17:00 hrs.\r\nSÃ¡bados, Domingos y dÃ­as festivos de 10:00 a 17:00 hrs. \r\nLa taquilla cierra todos los dÃ­as a las 16:30 hrs.\r\nEl museo cierra al pÃºblico los lunes, 1 de enero, 1 mayo, 15 y 16 de septiembre, 25 y 31 de diciembre. \r\n\r\nAcceso:\r\n\r\nEntrada general: $35.00\r\nNiÃ±os, estudiantes, maestros, miembros del INAPAM, trabajadores y exalumnos UNAM con credencial vigente*: $25.00\r\nNiÃ±os menores de 2 aÃ±os: no pagan boleto.\r\n* es indispensable presentar la credencial vigente en la taquilla del museo.\r\nCredencial de Visitante Frecuente:\r\n\r\nGeneral: $400.00\r\n\r\nNiÃ±os, estudiantes, maestros, miembros del INAPAM, trabajadores y exalumnos UNAM con credencial vigente: $300.00\r\n\r\nVigencia de 1 aÃ±o con acceso ilimitado a Universum y Museo de la Luz.\r\n* es indispensable presentar la credencial vigente en la taquilla del museo.\r\n\r\nNoche de Museos:\r\n\r\nEntrada general: $15.00', 'San Ildefonso 43, Centro HistÃ³rico de la Ciudad de MÃ©xico 06020 ', 35.0),
(10, 6, 0x67656f6c6f6769612e6a7067, 'Museo del Instituto de GeologÃ­a, UNAM', 'El Museo de GeologÃ­a de la UNAM, ubicado en el corazÃ³n de la colonia Santa MarÃ­a La Ribera, concentra las colecciones geolÃ³gicas mÃ¡s importantes de MÃ©xico. Es un espacio que, ademÃ¡s de resguardar este importante patrimonio, divulga el conocimiento cientÃ­fico de las ciencias de la Tierra.\r\n\r\nEl majestuoso edificio porfiriano que alberga al Museo de GeologÃ­a estÃ¡ ubicado en el centro de la colonia Santa MarÃ­a La Ribera. Su escalinata y fachada son una invitaciÃ³n a explorar una instituciÃ³n que tambiÃ©n es conocida como el Palacio de las Ciencias de la Tierra.\r\n\r\nEl edificio estÃ¡ construido de cantera obtenida y traÃ­da de Los Remedios, Estado de MÃ©xico y que es la misma con la que se construyÃ³ el Palacio de MinerÃ­a y el Colegio de San Idelfonso. Su fachada de ignimbrita, un tipo de roca volcÃ¡nica, estÃ¡ decorada con figuras de fÃ³siles de peces, conchas y reptiles en alto y bajorrelieve.\r\n\r\nHorario:\r\nMartes a Domingo 10:00 - 17:00 hrs. \r\n\r\nEntrada General: $20. \r\nProfesores, Alumnos e INAPAM con credencial: $15.00. \r\nProgramaciÃ³n sujeta a cambio.\r\nSe prohibe la entrada con VideocÃ¡maras.\r\nVenta de Boletos electrÃ³nicos hasta las 16:30 Hrs.\r\n\r\nEl Museo cierra los dÃ­as 1,5,10 y 15 de mayo de 2016.\r\nEl Museo imprime como comprobantes boletos electrÃ³nicos.', 'Jaime Torres Bodet No. 176  Col. Santa MarÃ­a la Ribera.', 20.0),
(11, 2, 0x436544694379542e6a7067, 'Centro de DifusiÃ³n de Ciencia y TecnologÃ­a - IPN', 'En el Instituto PolitÃ©cnico Nacional atendemos esta responsabilidad en el Centro de DifusiÃ³n de Ciencia y TecnologÃ­a (CeDiCyT), donde nuestro propÃ³sito como grupo multidisciplinario es propiciar el acercamiento de todos para Vivir la Ciencia en AcciÃ³n, a travÃ©s de:\r\n\r\nPlanetario â€œLuis Enrique Erroâ€. Inaugurado en 1967, es el primer planetario abierto al pÃºblico en MÃ©xico y uno de los mÃ¡s antiguos de AmÃ©rica Latina. Su remodelaciÃ³n en 2007 con apoyo de la FundaciÃ³n Alfredo Harp HelÃº, lo hace tambiÃ©n uno de los mÃ¡s modernos gracias al sistema de proyecciÃ³n digital envolvente.\r\n\r\nRevista Conversus.El conocimientoo cientÃ­fico es una obra inacabada que se construye y evoluciona todos los dÃ­as. Hacer accesible este quehacer cotidiano, es un reto que comunicÃ³logos, diseÃ±adores grÃ¡ficos, ingenieros y cientÃ­ficos del CeDiCyT llevan a cabo en la Revista Conversus. En cada nÃºmero, los temas que ocupan a la comunidad cientÃ­fica nacional son presentados en un lenguaje coloquial que busca apoyar el desarrollo de la cultura cientÃ­fica de la sociedad.\r\n\r\nMuseo TezozÃ³moc. La energÃ­a no se crea ni se destruye, sÃ³lo se transforma, el Museo TezozÃ³moc brinda la oportunidad de vivir su existencia y experimentar con ella en sus mÃ¡s diversas manifestaciones a travÃ©s de las diferentes exhibiciones con que cuenta.\r\n\r\nPor ello, en el CeDiCyT, rebasamos las fronteras del papel y del espacio fÃ­sico, creando de manera permanente otras acciones que estimulan y propician el encuentro entre la ciencia y la sociedad, como son un Portal Web, Blogs interactivos, producciones propias de InmersiÃ³n Digital, Conferencias, Actividades de FormaciÃ³n y CapacitaciÃ³n, Talleres y Obras de Teatro, entre otras.\r\n\r\nVivimos en una sociedad profundamente dependiente de la ciencia y la tecnologÃ­a, en el CeDiCyT estamos determinados a sembrar en niÃ±os y jÃ³venes las semillas de la curiosidad y la bÃºsqueda del conocimiento que les permitan transformar la naturaleza en beneficio de ellos mismos, de su familia y de su paÃ­s, de lograrlo habremos dado un paso significativo para Vivir la Ciencia en AcciÃ³n.\r\n\r\nHorarios\r\n\r\nlunes a viernes de 9 a 18 horas y, los fines de semana, asÃ­ como los dÃ­as festivos, de 10 a 17 horas.\r\n\r\nCostosâ€‹\r\n\r\n$19.50 al pÃºblico en general, \r\n$9.00 para estudiantes y profesores en general, personas de la tercera edad, personas con capacidades diferentes, egresados IPN y jubilados IPN.\r\n\r\n*No se aceptan cheques y se requiere el "voucher" original en  caso de haber realizado un deposito bancario.\r\n\r\n*Precios sujetos a cambios sin previo aviso. ', 'Av. Zempoaltecas s/n Esq. Av. Manuel Salazar, Exhacienda el Rosario,  Ciudad de MÃ©xico, C. P. 02420', 19.0),
(12, 11, 0x706170616c6f74652d6d7573656f2d64656c2d6e696e6f2e6a7067, 'Papalote - Museo del NiÃ±o', 'APALOTE para TODOS es el Programa de Compromiso Social de Papalote Museo del NiÃ±o, que tiene como objetivo que niÃ±os y niÃ±as en situaciÃ³n de pobreza y vulnerabilidad social, asÃ­ como sus familias, profesores, tutores y acompaÃ±antes, accedan a los beneficios educativos y emocionales que brinda visitar el Museo.\r\n\r\nEl Programa de Compromiso Social PAPALOTE para TODOS atiende a escuelas pÃºblicas de nivel preescolar, primaria, secundaria y de educaciÃ³n especial, ubicadas en las colonias con alto Ã­ndice de vulnerabilidad social de 14 delegaciones del Distrito Federal. AsÃ­ tambiÃ©n atiende a organizaciones sociales que trabajan y brindan apoyo a poblaciÃ³n vulnerable.\r\n\r\nEn su visita al Museo, los niÃ±os y adultos beneficiados obtienen aprendizajes significativos que provocan emociones positivas y agradables. AdemÃ¡s a los maestros y adultos que nos visitan se les brinda la oportunidad de acercarse al Museo mediante una previsita en la que se les brindan herramientas que les permitan tener un mayor aprovechamiento de los temas educativos que expone el Museo.\r\n\r\nConscientes de la importancia del derecho de los niÃ±os a la educaciÃ³n y al acceso a lugares de esparcimiento y cultura, PAPALOTE para TODOS  agradece los generosos donativos de empresas e individuos conscientes de esta situaciÃ³n, que hacen posible que la experiencia Papalote continÃºe llegando a mÃ¡s niÃ±os.\r\n\r\nEn 2015 el programa PAPALOTE para TODOS refrenda su compromiso con la sociedad, mediante el cual  queremos que TODOS los niÃ±os tengan la oportunidad de descubrir que aprender es divertido.\r\n\r\nHorarios:\r\n\r\n	\r\nDel 4 al 15 de julio: Cerrado.\r\nDel 16 al 28 de julio: 10:00 a 19:00 hrs.\r\n\r\n\r\nCostos:\r\n\r\n*Paquete General\r\nADO Megapantalla IMAX\r\n+\r\ndomodigital Banamex \r\n+\r\nLEGO\r\n+\r\nJardÃ­n MÃ©xico Vivo\r\n$149 \r\n\r\n*Paquete Doble\r\nADOâ€¢Megapantalla IMAX \r\n+\r\ndomodigitalâ€¢Banamex\r\n$125\r\n\r\n*Individuales\r\nExhibiciones \r\n$99\r\nADOâ€¢Megapantalla IMAX \r\n$99\r\ndomodigitalâ€¢Banamex \r\n$99', 'Av. Constituyentes No. 268, Col. Daniel Garza, MÃ©xico, D.F.', 99.0),
(13, 11, 0x6366652e6a7067, 'Museo TecnolÃ³gico de la CFE', 'Por ser el Museo de la ComisiÃ³n Federal de Electricidad, en sus aÃ±os primarios la temÃ¡tica de sus exposiciones interactivas fue sobre el sector elÃ©ctrico como el descubrimiento de la electricidad, el electromagnetismo, las investigaciones y aportaciones cientÃ­ficas y tecnolÃ³gicas del sector, los procesos de generaciÃ³n, transmisiÃ³n y distribuciÃ³n de la energÃ­a elÃ©ctrica, entre otras. Sin embargo, debido a que el avance de la investigaciÃ³n cientÃ­fica y de las aplicaciones tecnolÃ³gicas no han admitido pausas en la humanidad (los hombres o) ni en las naciones, el Museo de la CFE comprometido con su misiÃ³n, se vio en la necesidad de crecer al ritmo de las exigencias de la era moderna para satisfacer al estudiante y al estudioso, al aficionado y al investigador, al que aplica la tÃ©cnica y al que es capaz de revolucionarla con la diversificaciÃ³n de las ciencias en general como biologÃ­a, quÃ­mica, matemÃ¡ticas, fÃ­sica, astronomÃ­a, geologÃ­a, arqueologÃ­a, hasta llegar a la nueva ciencia de ingenierÃ­a y tecnologÃ­a: la robÃ³tica, en sus exposiciones y actividades.\r\n\r\nHorarios:\r\n\r\nLunes a Jueves \r\n9:00 a 16:15 hrs\r\n\r\n\r\nViernes\r\n9:30 a 16:15 hrs\r\n\r\nSÃ¡bado y Domingo\r\n9:00 a 16:15 hrs', ' Reforma 164, Col. JuÃ¡rez, MÃ©xico D.F.', 0.0);



insert into MUSEOS(id_del,imagen_mus,nombre_mus,desc_mus,dir_mus,precio_mus) values(1,'museos.museo.png','El chido','klajsdklfjaksldjfkaldjfkaj','kjadjlkajdf',200);

insert into HORARIOS(id_dia,id_mus,hora_in,hora_fn) values(1,1,'08:00:00','06:00:00');


/*CONTROL DE USUARIOS*/
insert into EMPLEADOS(nombre_emp,apellido_pat,apellido_mat,telefono_emp,correo_emp,contra_emp) values('AARON ADRIAN','CARMONA','ESPINOSA','54412194','carmonespi@gmail.com','carmona11');
insert into DETALLE_TIPO_EMPLEADOS(id_emp,id_temp,fecha) values(1,1,'10/10/10');

/*FIN CONTROL DE USUARIOS*/

/*INSERT SALAS*/
insert into SALAS(id_sala,id_mus,nombre_sala) values(1,1,"SALA 1"),(2,1,"SALA 2");


INSERT INTO DETALLE_MUS_SAL(id_mus,id_sala,titulo,cuerpo) values(1,1,"este no va a ir","esta sala fue para todas las personas blablabla"),(1,2,"esto se va a quitar","soy el chido");
