/*CONSULTA PARA VERIFICAR EL USUARIO*/
select u.correo_usu,u.contra_usu from USUARIOS u inner join ( TIPO_USUARIO t inner join DETALLE_TIPO_USUARIOS d on d.id_tusu = t.id_tusu ) on d.id_usu = u.id_usu where t.id_tusu = 2

select u.correo_usu,u.contra_usu from USUARIOS u inner join ( TIPO_USUARIO t inner join DETALLE_TIPO_USUARIOS d on d.id_tusu = t.id_tusu ) on d.id_usu = u.id_usu where u.correo_usu like 'carmonespi@gmail.com' and u.contra_usu like 'carmona11' and t.id_tusu = 2;