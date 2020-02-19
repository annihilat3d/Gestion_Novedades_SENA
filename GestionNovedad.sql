create database Gestion_Novedades_SENA

use Gestion_Novedades_SENA

create table Administrador
(
IdentificacionAdm bigint primary key,
Nombres varchar(30) not null,
Apellidos varchar(30) not null,
Contraseña varchar(50) not null,
Correo varchar(50) unique not null
) 
create table Docente
(
IdentificacionDoc bigint primary key,
Nombres varchar(30) not null,
Apellidos varchar(30) not null,
Contraseña varchar(50) not null,
Correo varchar(50) unique not null,
Cuentadante varchar(10), -- 0: No es cuentadante, 1: Si es cuentadante
Estado varchar(20), -- 0: Inactivo, 1: Activo
Modalidad varchar(50) not null,
IdentificacionAdm bigint
Constraint FK_Docente_Administrador
foreign key (IdentificacionAdm)
references Administrador(IdentificacionAdm)
)

create table Aula
(
Id_Aula int primary key identity(1,1),
Nombre varchar(50) not null,
Numero int not null,
IdentificacionDoc bigint 
Constraint FK_Aula_Docente
foreign key (IdentificacionDoc)
references Docente(IdentificacionDoc)
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
IdentificacionDoc bigint,
IdentificacionAdm bigint,
fecha date Default CONVERT (date,GETDATE()),
hora time(0) Default convert (time, GETDATE()),
constraint FK_Cambios_Administrador
foreign key (IdentificacionAdm)
references Administrador(IdentificacionAdm)
)

alter table Cambios add
constraint FK_Cambios_Docente
foreign key (IdentificacionDoc)
references Docente(IdentificacionDoc)

-- Vistas
go
create view AulasAsignadas as
Select D.IdentificacionDoc,D.Nombres, D.Apellidos, A.Nombre, A.Numero from Docente as D
inner join Aula as A on D.IdentificacionDoc = A.IdentificacionDoc
go
create view NovedadesDocentes as 
Select D.IdentificacionDoc,D.Nombres, D.Apellidos, A.Nombre as Aula, A.Numero as Numero_Aula, E.Tipo_Elemento, N.Novedad, N.Estado, N.fecha_hora from Docente as D
inner join Aula as A on D.IdentificacionDoc = A.IdentificacionDoc
inner join Elemento as E on A.Id_Aula = E.Id_Aula
inner join Novedad as N on N.Id_Elemento = E.Id_Elemento

-- Procedimientos

-- Docente --
go
Create procedure InsertarDocente
@IdentificacionDoc bigint,
@Nombres varchar (30),
@Apellidos varchar (30),
@Contraseña varchar(50),
@Correo varchar(50),
@Cuentadante bit,
@Estado bit,
@Modalidad varchar (50),
@IdentificacionAdm bigint

as begin 

Insert into Docente 
(IdentificacionDoc,Nombres,Apellidos,Contraseña,Correo,Cuentadante,Modalidad,IdentificacionAdm)
values
(@IdentificacionDoc,@Nombres,@Apellidos,@Contraseña,@Correo,@Cuentadante,@Modalidad,@IdentificacionAdm)

end
--
go
Create procedure ActualizarDocente
@IdentificacionDoc bigint,
@Nombres varchar (30),
@Apellidos varchar (30),
@Contraseña varchar(50),
@Correo varchar (50),
@Cuentadante bit,
@Estado bit,
@Modalidad varchar (50),
@IdentificacionAdm bigint

as begin 

update Docente 
set 
IdentificacionDoc = @IdentificacionDoc,
Nombres = @Nombres,
Apellidos = @Apellidos,
Contraseña = @Contraseña,
Correo = @Correo,
Cuentadante = @Cuentadante,
Modalidad = @Modalidad,
IdentificacionAdm = @IdentificacionAdm
where IdentificacionDoc = @IdentificacionDoc
end
--
go
create procedure CambiarEstadoDoc
@IdentificacionDoc bigint,
@Estado bit

as begin

update Docente set Estado = @Estado where IdentificacionDoc = @IdentificacionDoc

end
--
go
create procedure AsignarCuentadante
@IdentificacionDoc bigint,
@Cuentadante bit

as begin 

update Docente set Cuentadante = @Cuentadante where IdentificacionDoc = @IdentificacionDoc

end
--
go
create procedure CambiarContraseñaDoc
@IdentificacionDoc bigint,
@Contraseña varchar(50)

as begin 

update Docente set Contraseña = @Contraseña where IdentificacionDoc = @IdentificacionDoc

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
@IdentificacionDoc bigint

as begin

update Aula set IdentificacionDoc = @IdentificacionDoc where Id_Aula = @Id_Aula

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
create procedure InsertarCambioA
@accion varchar (20),
@tabla varchar (20),
@IdentificacionAdm bigint

as begin 

insert into Cambios (accion,tabla,IdentificacionAdm)
values 
(
@accion,
@tabla,
@IdentificacionAdm
)

end
--
go
create procedure InsertarCambioD
@accion varchar (20),
@tabla varchar (20),
@IdentificacionDoc bigint

as begin 

insert into Cambios (accion,tabla,IdentificacionDoc)
values 
(
@accion,
@tabla,
@IdentificacionDoc
)

end

-- Pruebas de base de datos

-- Administrador
Insert into Administrador (IdentificacionAdm,Nombres,Apellidos,Contraseña,Correo) 
values (1000579646,'Brayan', 'Martinez Ayala', '12345', 'bmartinez646@misena.edu.co')
-- Docente
Insert into Docente 
(IdentificacionDoc,Nombres,Apellidos,Contraseña,Correo,Cuentadante,Modalidad,IdentificacionAdm)
values
(1234,'Jose Luis','Monroy Mendez','12345','joseluis444@misena.edu.co',1,'Programacion de software',1000579646 )
Insert into Docente 
(IdentificacionDoc,Nombres,Apellidos,Contraseña,Correo,Cuentadante,Modalidad,IdentificacionAdm)
values
(1111,'Carlos','Ayala Jaramillo','12345','carlosayala111@misena.edu.co',0,'Analisis y desarrollo de sistemas de informacion',1000579646 )
-- Aula sin docente
insert into Aula (Nombre,Numero) values ('Sala de Computacion',904)
insert into Aula (Nombre,Numero) values ('Sala de Reparto',801)
insert into Aula (Nombre,Numero) values ('Sala de Emergencias',703)
insert into Aula (Nombre,Numero) values ('Sala de Aseadoras',501)
-- Asignacion de Aula
update Aula set IdentificacionDoc = 1234 where Numero = 904
update Aula set IdentificacionDoc = 1234 where Numero = 801
-- Aula con docente
insert into Aula (Nombre,Numero, IdentificacionDoc) values ('Sala de Instructores',105,1234)
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

insert into Cambios (accion, tabla, IdentificacionDoc) values ('Inserto', 'Aula', 1234)
insert into Cambios (accion, tabla, IdentificacionAdm) values ('Modifico', 'Docente', 1000579646)

--User

alter table users alter column created_at varchar(300)
alter table users alter column updated_at varchar(300)
alter table users alter column email_verified_at varchar(300)
alter table users add name2 nvarchar(255)

alter table Docente alter column Cuentadante varchar(10)
alter table Docente alter column Estado varchar(20)
alter table Docente alter column Contraseña nvarchar(255)
alter table Docente add created_at varchar(300)
alter table Docente add updated_at varchar(300)