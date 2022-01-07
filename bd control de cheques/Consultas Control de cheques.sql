use sis_cc;

/*========================================================
					Consultas de cheques													   
==========================================================*/
select c.id_cheques,t.nombre_banco,d.digitos_cuenta as numero_cuenta,d.nombre_de,c.fecha_chueque,c.monto
		from cheques c
		inner join datos_cuenta d on c.id_datos_cuenta = d.id_datos_cuenta
        inner join tipo_bancos t on d.id_tipo_banco = t.id_tipo_banco;
        
/*========================================================
					Consultas de tipo de bancos													   
==========================================================*/

select tb.id_tipo_banco,tb.nombre_banco,tc.nombre_tipo_cuenta_banco
		from tipo_bancos tb
        inner join tipo_cuentas tc on tb.id_tipo_cuenta = tc.id_tipo_cuenta;

/*========================================================
					Consultas de datos cuenta													   
==========================================================*/

select d.id_datos_cuenta,d.digitos_cuenta,tc.nombre_tipo_cuenta_banco,tb.nombre_banco
		from datos_cuenta d
        inner join tipo_cuentas tc on d.id_tipo_cuenta = tc.id_tipo_cuenta
        inner join tipo_bancos tb on d.id_tipo_banco = tb.id_tipo_banco;