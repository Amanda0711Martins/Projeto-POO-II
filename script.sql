	CREATE DATABASE "ClienteVendiTudo"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
	
	CREATE TABLE dadosCliente(
	id SERIAL PRIMARY KEY,
	cpf CHAR(11),
	nome VARCHAR(255),
	email VARCHAR(255) NOT NULL UNIQUE,
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

	CREATE TABLE fornecedor(
	id SERIAL PRIMARY KEY,
	cnpj INTEGER,
	nome VARCHAR(255)
);
	CREATE TABLE produto(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(255),
	preco NUMERIC(10,2),
    descricao TEXT,
	fornecedor_id INTEGER,
	FOREIGN KEY (fornecedor_id) REFERENCES fornecedor(id)
);

	CREATE TABLE favoritos(
	id SERIAL PRIMARY KEY,
	cliente_id INTEGER,
	produto_id INTEGER,
	FOREIGN KEY (cliente_id) REFERENCES dadosCliente(id),
	FOREIGN KEY (produto_id) REFERENCES produto(id)
);





