create table region(
	id int auto_increment not null,
	nombre varchar(100),
	primary key (id)
);

create table candidato(
	id int auto_increment not null,
	nombre varchar (100),
	primary key (id)
);


create table comuna(
	id int auto_increment not null,
	nombre varchar(100),
	region int,
	primary key (id),
	foreign key (region) references region (id)
);


create table voto(
  id int auto_increment not null,
  nombre varchar(100) not null,
  alias varchar(100),
  rut varchar(20),
  email varchar(50),
  region int,
  comuna int,
  candidato int,
  web int,
  tv int, 
  social int,
  amigo int,
  primary key (id),
  foreign key (region) references region(id),
  foreign key (comuna) references comuna(id),
  foreign key (candidato) references candidato(id)
);

insert into region(nombre) values ('Arica y Parinacota'),('Tarapaca'),('Antofagasta'),('Atacama'),('Coquimbo'),('Valparaiso'),('Metropolitana'),('Bernardo Ohiggins'),('Maule'),('Nuble'), ('BioBio'),('Araucania'),('Los Rios'),('Los Lagos'),('Aysen'),('Magallanes')

insert into comuna(nombre, region) values ('Morro de Arica', '1'), ('Arica', '1'), ('Cerro de la Cruz', '1')
insert into comuna(nombre, region) values ('Iquique', '2'), ('Alto Hospicio', '2'), ('Pozo Almonte', '2')
insert into comuna(nombre, region) values ('Antofagasta', '3'), ('Mejillones', '3'), ('Taltal', '3')
insert into comuna(nombre, region) values ('Caldera', '4'), ('Chanaral', '4'), ('Copiapo', '4')
insert into comuna(nombre, region) values ('La Serena', '5'), ('Coquimbo', '5'), ('Vicuna', '5')
insert into comuna(nombre, region) values ('Valparaiso', '6'), ('Concon', '6'), ('El Quisco', '6')
insert into comuna(nombre, region) values ('Santiago', '7'), ('El Monte', '7'), ('Cerrillos', '7')
insert into comuna(nombre, region) values ('Palmilla', '8'), ('Nancagua', '8'), ('Peumo', '8')
insert into comuna(nombre, region) values ('Parral', '9'), ('Talca', '9'), ('Linares', '9')
insert into comuna(nombre, region) values ('Chillan', '10'), ('San Carlos', '10'), ('Bulnes', '10')
insert into comuna(nombre, region) values ('Concepcion', '11'), ('Los Angeles', '11'), ('Cabrero', '11')
insert into comuna(nombre, region) values ('Angol', '12'), ('Temuco', '12'), ('Loncoche', '12')
insert into comuna(nombre, region) values ('Los lagos', '13'), ('Corral', '13'), ('Valdivia', '13')
insert into comuna(nombre, region) values ('Osorno', '14'), ('Puerto Montt', '14'), ('Puerto Varas', '14')
insert into comuna(nombre, region) values ('Coyhaique', '15'), ('Puerto Aysen', '15'), ('Tortel', '15')
insert into comuna(nombre, region) values ('Punta Arenas', '16'), ('Porvenir', '16'), ('Rio Verde', '16')

insert into candidato (nombre) values ('Luis Carlos Egea')
insert into candidato (nombre) values ('Gael Recio')
insert into candidato (nombre) values ('Azahara Salguero')
insert into candidato (nombre) values ('Aitana Lorenzo')
insert into candidato (nombre) values ('Ismael Fuentes')
insert into candidato (nombre) values ('Lara Tomas')
insert into candidato (nombre) values ('Eduard Tortosa')
