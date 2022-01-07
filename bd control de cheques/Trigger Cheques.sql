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
		if new.digitos_cuenta = '' then 
		set new.digitos_cuenta = null ;
	    end if;
        
		if new.nombre_de = '' then 
		set new.nombre_de = null ;
	    end if;
        
        if new.id_tipo_banco = '' then 
		set new.id_tipo_banco = null ;
	    end if;
   end
   $$
   
      /*========================================================
						Trigger cheques												   
==========================================================*/
delimiter $$
   create trigger chequesD before insert on cheques 
   for each row
   begin 
		if new.numero_cheque = '' then 
		set new.numero_cheque = null ;
	    end if;
        
		if new.id_datos_cuenta = '' then 
		set new.id_datos_cuenta = null ;
	    end if;
        
        if new.fecha_chueque = '' then 
		set new.fecha_chueque = null ;
	    end if;
        
		if new.foto = '' then 
		set new.foto = null ;
	    end if;
        
        if new.monto = '' then 
		set new.monto = null ;
	    end if;
        
   end
   $$