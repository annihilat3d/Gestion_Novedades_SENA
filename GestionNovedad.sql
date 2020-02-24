create database Gestion_Novedades_SENA2

use Gestion_Novedades_SENA2


alter table users alter column created_at varchar(300)
alter table users alter column updated_at varchar(300)
alter table users alter column email_verified_at varchar(300)

create table Aula
(
Id_Aula int primary key identity(1,1),
Nombre varchar(50) not null,
Numero int not null,
identificacion nvarchar(255),
Constraint FK_Aula_Docente
foreign key (identificacion)
references users(identificacion)
)

create table Elemento
(
Id_Elemento int primary key identity(1,1),
Tipo_Elemento varchar(20) not null,
Estado varchar(25)not null, -- Ej: Normal, arreglo
Id_Aula int not null,
Constraint FK_Elemento_Aula
foreign key (Id_Aula)
references Aula(Id_Aula)
)

create table Novedad
(
Id_Novedad int primary key identity(1,1),
Novedad varchar(100) not null, -- Ej: Silla rota...
Estado varchar(25) not null, -- Ej: Salida, ingreso, arreglo...
fecha date Default CONVERT (date,GETDATE()),
hora time(0) Default convert (time, GETDATE()),
Id_Elemento int,
Id_Aula int
Constraint FK_Novedad_Elemento
foreign key (Id_Elemento)
references Elemento(Id_Elemento)
)

alter table Novedad add
Constraint FK_Novedad_Aula
foreign key (Id_Aula)
references Aula(Id_Aula)

-- Tabla de cambios

create table Cambios
(
Id_Cambios int primary key identity(1,1),
accion varchar(20) not null,
tabla varchar(20) not null,
identificacion nvarchar(255),
fecha date Default CONVERT (date,GETDATE()),
hora time(0) Default convert (time, GETDATE()),
constraint FK_Cambios_Administrador
foreign key (identificacion)
references users(identificacion)
)

-- Vistas
go
create view AulasAsignadas as
Select D.identificacion,D.nombres, D.apellidos, A.Nombre, A.Numero from users as D
inner join Aula as A on D.identificacion = A.identificacion
go
create view NovedadesDocentes as 
Select D.identificacion,D.nombres, D.apellidos, A.Nombre as Aula, A.Numero as Numero_Aula, E.Tipo_Elemento, N.Novedad, N.Estado, N.fecha, N.hora from users as D
inner join Aula as A on D.identificacion = A.identificacion
inner join Elemento as E on A.Id_Aula = E.Id_Aula
inner join Novedad as N on N.Id_Elemento = E.Id_Elemento

-- Procedimientos

-- Docente --
go
Create procedure InsertarDocente
@identificacion nvarchar(255),
@nombres nvarchar(255),
@apellidos nvarchar(255),
@password nvarchar(255),
@correo nvarchar(255),
@cuentadante nvarchar(255),
@modalidad nvarchar(255)

as begin 

Insert into users 
(identificacion,nombres,apellidos,password,email,cuentadante,modalidad)
values
(@identificacion,@nombres,@apellidos,@password,@correo,@cuentadante,@modalidad)

end
--
go
Create procedure ActualizarDocente
@identificacion nvarchar(255),
@nombres nvarchar(255),
@apellidos nvarchar(255),
@password nvarchar(255),
@correo nvarchar(255),
@cuentadante nvarchar(255),
@estado nvarchar(255),
@modalidad nvarchar(255)


as begin 

update users 
set 
identificacion = @identificacion,
nombres = @nombres,
apellidos = @apellidos,
password = @password,
email = @correo,
cuentadante = @cuentadante,
modalidad = @modalidad
where identificacion = @identificacion
end
--
go
create procedure CambiarEstadoDoc
@identificacion nvarchar(255),
@estado nvarchar(255)

as begin

update users set estado = @estado where identificacion = @identificacion

end
--
go
create procedure AsignarCuentadante
@identificacion nvarchar(255),
@cuentadante nvarchar(255)

as begin 

update users set cuentadante = @cuentadante where identificacion = @identificacion

end
--
go
create procedure CambiarContraseñaDoc
@identificacion nvarchar(255),
@password nvarchar(255)


as begin 

update users set password = @password where identificacion = @identificacion
end
--

-- Aula --
go
create procedure InsertarAula
@Nombre varchar(50),
@Numero int

as begin 

insert into Aula (Nombre,Numero)
values
(
@Nombre,
@Numero
)
select SCOPE_IDENTITY();
end
--
go
create procedure AsignarAula
@Id_Aula int,
@identificacion bigint

as begin

update Aula set identificacion = @identificacion where Id_Aula = @Id_Aula

end
--
go
create procedure ActualizarAula
@Nombre varchar (50),
@Numero int,
@Id_Aula int

as begin 

update Aula set Nombre = @Nombre, Numero = @Numero where Id_Aula = @Id_Aula

end
--
go
create procedure EliminarAula
@Id_Aula int

as begin 

delete from Aula where Id_Aula = @Id_Aula

end

-- Elemento --
go
create procedure InsertarElemento
@Tipo_Elemento varchar(20),
@Estado varchar(25),
@Id_Aula int

as begin 

insert into Elemento (Tipo_Elemento,Estado,Id_Aula)
values
(
@Tipo_Elemento,
'Normal',
@Id_Aula 
)
end
--
go
create procedure ActualizarElemento
@Tipo_Elemento varchar(20),
@Estado varchar(25),
@Id_Elemento int

as begin 

update Elemento set 
Tipo_Elemento = @Tipo_Elemento,
Estado = @Estado
where Id_Elemento = @Id_Elemento

end
--
go
create procedure EliminarElemento
@Id_Elemento int

as begin

delete from Elemento where Id_Elemento = @Id_Elemento
end


-- Novedad --
go
create procedure InsertarNovedadElemento
@Novedad varchar(100),
@Estado varchar(25),
@Id_Elemento int

as begin

Insert into Novedad(Novedad,Estado,Id_Elemento)
values
(
@Novedad,
@Estado,
@Id_Elemento
)
end
--
go
create procedure InsertarNovedadAula
@Novedad varchar(100),
@Estado varchar(25),
@Id_Aula int

as begin

Insert into Novedad(Novedad,Estado,Id_Aula)
values
(
@Novedad,
@Estado,
@Id_Aula 

)
end
--
go
create procedure ActualizarNovedad
@Id_Novedad int,
@Novedad varchar(100),
@Estado varchar(25)

as begin

update Novedad set Novedad = @Novedad, Estado = @Estado

end
--
go
create procedure EliminarNovedad
@Id_Novedad int

as begin 

delete from Novedad where Id_Novedad = @Id_Novedad


end
-- Cambios --
go
create procedure InsertarCambio
@accion varchar (20),
@tabla varchar (20),
@identificacion nvarchar(255)

as begin 

insert into Cambios (accion,tabla,identificacion)
values 
(
@accion,
@tabla,
@identificacion
)

end

-- Pruebas de base de datos

-- Administrador
Insert into users (identificacion,nombres,apellidos,password,email,cargo) 
values (1000579646,'Brayan', 'Martinez Ayala', '12345', 'bmartinez646@misena.edu.co','Administrador')
-- Docente
Insert into users 
(identificacion,nombres,apellidos,password,email,cuentadante,modalidad,cargo)
values
(1234,'Jose Luis','Monroy Mendez','12345','joseluis444@misena.edu.co',1,'Programacion de software','Docente')
Insert into users
(identificacion,nombres,apellidos,password,email,cuentadante,modalidad,cargo)
values
(1111,'Carlos','Ayala Jaramillo','12345','carlosayala111@misena.edu.co',0,'Analisis y desarrollo de sistemas de informacion','Docente' )
-- Aula sin docente
insert into Aula (Nombre,Numero) values ('Sala de Computacion',904)
insert into Aula (Nombre,Numero) values ('Sala de Reparto',801)
insert into Aula (Nombre,Numero) values ('Sala de Emergencias',703)
insert into Aula (Nombre,Numero) values ('Sala de Aseadoras',501)
-- Asignacion de Aula
update Aula set identificacion = 1234 where Numero = 904
update Aula set identificacion = 1234 where Numero = 801
-- Aula con docente
insert into Aula (Nombre,Numero, identificacion) values ('Sala de Instructores',105,1234)
-- Elemento
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Silla','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Silla','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Silla','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Escritorio','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Escritorio','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Escritorio','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Computador','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Computador','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Computador','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Televisor','Normal',1)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Armario','Normal',1)

insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Silla','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Silla','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Escritorio','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Escritorio','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Computador','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Computador','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Televisor','Normal',2)
insert into Elemento (Tipo_Elemento,Estado,Id_Aula) values ('Armario','Normal',2)

-- Novedad Elemento

insert into Novedad(Novedad,Estado,Id_Elemento) values ('La silla se le rompio una pata','Por arreglar',1)
insert into Novedad(Novedad,Estado,Id_Elemento) values ('El escritorio se le rompio una pata','Por arreglar',4)
insert into Novedad(Novedad,Estado,Id_Elemento) values ('El computador no prende','Por arreglar',7)
insert into Novedad(Novedad,Estado,Id_Elemento) values ('El televisor no le funciona el control','Por arreglar',10)

insert into Novedad(Novedad,Estado,Id_Elemento) values ('El computador no prende','Arreglado',7)

-- Novedad Aula

insert into Novedad(Novedad,Estado,Id_Aula) values ('Falta de aseo','Por arreglar',1)
insert into Novedad(Novedad,Estado,Id_Aula) values ('Puerta dañada','Por arreglar',1)

-- Cambios

insert into Cambios (accion, tabla, identificacion) values ('Inserto', 'Aula', 1234)
insert into Cambios (accion, tabla, identificacion) values ('Modifico', 'Docente', 1000579646)

-- Password
update users set password = '$2y$10$eCq.Uaoc.Ip5D8gekVGJ/.LFX/kb03folnBUYlD3HTrgwN0znxc9K' where identificacion = 1000579646
update users set password = '$2y$10$eCq.Uaoc.Ip5D8gekVGJ/.LFX/kb03folnBUYlD3HTrgwN0znxc9K' where identificacion = 1234
--$2y$10$eCq.Uaoc.Ip5D8gekVGJ/.LFX/kb03folnBUYlD3HTrgwN0znxc9K
--123

