DROP DATABASE IF EXISTS;
CREATE DATABASE proyectoBD;

USE proyectoBD;

CREATE TABLE Alumno(
	matricula varchar(10),
	nombre varchar(45),
	apellidoPat varchar(45),
	apellidoMat varchar(45),
	semestre int,
	PRIMARY KEY(matricula)
);

CREATE TABLE Materia(
	clave varchar(10),
	nombre varchar(45),
	objetivo varchar(200),
	optativa boolean,
	PRIMARY KEY(clave)	
);

CREATE TABLE Requisito(
	idReq int,
	requisitoMat varchar(10),
	esRequisito varchar(10),
	semestre int,
	PRIMARY KEY(idReq,requisitoMat),
	foreign KEY(requisitoMat) REFERENCES Materia(clave) ON UPDATE CASCADE,
	foreign KEY(esRequisito) REFERENCES Materia(clave)ON UPDATE CASCADE
);

CREATE TABLE Tema(
	nombreTema varchar(80),
	MateriaClave varchar(10),
	PRIMARY KEY(nombreTema,MateriaClave),
	foreign KEY(MateriaClave) REFERENCES Materia(clave) ON UPDATE CASCADE
);

CREATE TABLE Materia_Alumno(
	claveMat varchar(10),
	matriculaAlu varchar(10),
	estadoMat int,
	calificacion int,
	formatoMat varchar(15),
	PRIMARY KEY(claveMat,matriculaAlu),
	foreign KEY(claveMat) REFERENCES Materia(clave) ON UPDATE CASCADE,
	foreign KEY(matriculaAlu) REFERENCES Alumno(matricula) ON UPDATE CASCADE
);


INSERT INTO Materia Values
('F1002','Fisica 1','Aplicar conceptos fisico y matematicos','FALSE'),
('H1016','Lengua Extranjera','','FALSE'),
('MA1015','Matematicas 1','','FALSE');

INSERT INTO Alumno Values
('A01273062','Luis Manuel', 'Juárez',' Palazuelos',1),
('A01272986','Miguel Angel', 'Martínez',' Martínez',1),
('A01273675','Osvaldo', 'Gómez ','Tirado',1),
('A01273743','Joshua', 'Esperilla ','Anaya',1),
('A01273676','Paola', 'Pérez',' Valencia',1),
('A01273781','Diana Alicia', 'Bernal',' Chacha',1),
('A01273800','José Eduardo', 'Arteaga',' Valdés',1),
('A01273831','Oscar', 'Guevara',' Islas',1),
('A01273860','Alejandra', 'de la Torre',' Ibarra',1),
('A01273888','María José', 'Bolaños',' Domínguez',1),
('A01273949','Oliver', 'Geovanni ','García',1),
('A01274058','Gilberto', 'Medina ','Trejo',1),
('A01274088','Edson', 'Morales',' Cruz',1),
('A01274089','Erhart Fabián', 'Castillo ','Castellanos',1),
('A01275139','Kevin Israel', 'Guzmán',' Jiménez',1),
('A01275136','José Ángel', 'Olvera ','López',1),
('A01275275','Homero Adrián', 'Pérez ','Pérez',1),
('A01275375','Jaime Bryan', 'Perales',' Hernández',1),
('A01273096','Daniel Alejandro', 'Rodríguez',' Castro',1),
('A01273755','Raiza Fernanda', 'Cibrián ','Moreno',1);




