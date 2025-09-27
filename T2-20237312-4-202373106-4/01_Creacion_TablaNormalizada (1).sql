CREATE TABLE TopicoEspecialidad (
    ID_topico_especialidad INT PRIMARY KEY,
    topico_especialidad VARCHAR(50)
);

CREATE TABLE Personas (
    Rut INT PRIMARY KEY,
    Nombre VARCHAR(50),
    Email VARCHAR(80),
	contraseña VARCHAR(255),
	Rol BIT
);

CREATE TABLE Revisores (
    Rut INT PRIMARY KEY,
    FOREIGN KEY (Rut) REFERENCES Personas(Rut)
);

CREATE TABLE Autores (
    Rut INT PRIMARY KEY,
    FOREIGN KEY (Rut) REFERENCES Personas (Rut)
);

CREATE TABLE ArticulosSimple (
    ID_Art INT PRIMARY KEY,
    Titulo VARCHAR(255),
    FechaEnvio DATE,
    Resumen TEXT,
    ID_Topico_Especialidad INT,
    FOREIGN KEY (ID_Topico_Especialidad) REFERENCES TopicoEspecialidad(ID_topico_especialidad)
);

CREATE TABLE AutorContacto(
	Rut INT,
	contacto VARCHAR(255),
	PRIMARY KEY (Rut, contacto),
	FOREIGN KEY (Rut) REFERENCES Autores(Rut)
);

CREATE TABLE RevisionArticulos (
    ID_Art INT,
    Rut_Revisor INT,
    PRIMARY KEY (ID_Art, Rut_Revisor),
    FOREIGN KEY (ID_Art) REFERENCES ArticulosSimple(ID_Art),
    FOREIGN KEY (Rut_Revisor) REFERENCES Revisores(Rut)
);



CREATE TABLE Articulo_Topico (
    ID_Art INT,
    ID_topico_especialidad INT,
    PRIMARY KEY (ID_Art, ID_topico_especialidad),
    FOREIGN KEY (ID_Art) REFERENCES ArticulosSimple(ID_Art),
    FOREIGN KEY (ID_topico_especialidad) REFERENCES TopicoEspecialidad(ID_topico_especialidad)
);

CREATE TABLE Participantes (
    ID_Art INT,
    contacto VARCHAR(255),
    FOREIGN KEY (ID_Art) REFERENCES ArticulosSimple(ID_Art)
);

CREATE TABLE Revisor_Topicos (
    Rut INT,
    ID_topico_especialidad INT,
    PRIMARY KEY (Rut, ID_topico_especialidad),
    FOREIGN KEY (Rut) REFERENCES Revisores(Rut),
    FOREIGN KEY (ID_topico_especialidad) REFERENCES TopicoEspecialidad(ID_topico_especialidad)
);
