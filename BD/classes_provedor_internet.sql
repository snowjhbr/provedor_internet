CREATE TABLE Clientes (
    id SERIAL PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Email VARCHAR(255),
    Telefone VARCHAR(20),
    Endereco VARCHAR(255)
);

CREATE TABLE PlanoInternet (
    id SERIAL PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Velocidade VARCHAR(255),
    Preco MONEY NOT NULL,
    Descricao TEXT,
    Validade DATE
);

CREATE TABLE VendaPlanoInternet (
    id SERIAL PRIMARY KEY,
    idClientes INTEGER NOT NULL,
    idPlanoInternet INTEGER NOT NULL,
    DataVenda DATE NOT NULL,
    Velocidade VARCHAR(255),
    Preco MONEY NOT NULL,
    Estado VARCHAR(50) DEFAULT 'Pendente',
    FOREIGN KEY (idPlanoInternet) REFERENCES PlanoInternet(id),
    FOREIGN KEY (idClientes) REFERENCES Clientes(id)
);

CREATE TABLE Pagamentos (
    id SERIAL PRIMARY KEY,
    idVendaPlanoInternet INTEGER NOT NULL,
    DataPagamento DATE NOT NULL,
    Valor MONEY NOT NULL,
    MetodoPagamento VARCHAR(50),
    FOREIGN KEY (idVendaPlanoInternet) REFERENCES VendaPlanoInternet(id)
);

CREATE TABLE ChamadosSuporte (
    id SERIAL PRIMARY KEY,
    idClientes INTEGER NOT NULL,
    DataAbertura DATE NOT NULL,
    DataFechamento DATE,
    Descricao TEXT,
    Status VARCHAR(50) DEFAULT 'Aberto',
    FOREIGN KEY (idClientes) REFERENCES Clientes(id)
);
