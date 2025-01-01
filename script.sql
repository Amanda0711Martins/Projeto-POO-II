	CREATE DATABASE "ClienteVendiTudo"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
	
	CREATE TABLE dadosCliente(
	id SERIAL,
	cpf CHAR(11),
	nome VARCHAR(255),
	email VARCHAR(255),
	tel INTEGER,
	logradouro VARCHAR(255),
	numero INTEGER,
	bairro VARCHAR(255),
	cep INTEGER,
	cidade VARCHAR(255),
	estado CHAR(2),
	país CHAR(6),
	senha VARCHAR(255)
);

SELECT * FROM dadosCliente;