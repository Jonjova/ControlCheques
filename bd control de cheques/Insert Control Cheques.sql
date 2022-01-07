use sis_cc;


/*========================================================
						Insert de tipo de bancos 													   
==========================================================*/
insert into tipo_bancos (id_tipo_banco, nombre_banco) 
values ('1', 'BAC Credomatic'),
('2', 'Banco Agricola');

/*========================================================
						Insert de datos cuenta 													   
==========================================================*/
insert into datos_cuenta (id_datos_cuenta, digitos_cuenta,nombre_de,id_tipo_banco) 
values ('1', '123456789','jonathan','1'),
('2', '123456789112','test','2');
select * from datos_cuenta;
/*========================================================
						Insert de datos cheques 													   
==========================================================*/
insert into cheques (id_cheques,numero_cheque,id_datos_cuenta,fecha_chueque,foto,monto) 
values ('1','1325645645','1',now(),'123.jpg','2000');

/*========================================================
						Trigger tipo bancos													   
==========================================================*/
delimiter $$
   create trigger tipoBancos before insert on tipo_bancos 
   for each row
   begin 
		if new.nombre_banco = '' then 
		set new.nombre_banco = null ;
	    end if;
   end
   $$
   
   /*========================================================
						Trigger datos cuenta												   
==========================================================*/
delimiter $$
   create trigger datosCuentas before insert on datos_cuenta 
   for each row
   begin 
		if new.nombre_banco = '' then 
		set new.nombre_banco = null ;
	    end if;
   end
   $$
select * from cheques;