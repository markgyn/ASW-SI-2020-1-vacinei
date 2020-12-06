

create table pessoa(
	id int not null AUTO_INCREMENT, 
    nome varchar (100) not null, -- ok
	sexo enum ('H','F')not null, -- ok
    cpf varchar(12) not null, -- ok
    data_nascimento date not null, -- ok
    telefone varchar(20) not null, -- ok
    email varchar(200) not null, -- ok
    senha varchar (20) not null, -- ok
    local_nascimento varchar(200) , -- ok
    estado varchar (100) not null, -- ok
    cidade varchar (100) not null, -- ok
    setor varchar (100) not null, -- ok
    rua varchar (100) not null, -- ok
    cep varchar (100) not null, -- ok
    alergia varchar (100) , -- ok
    nome_mae varchar(100), -- ok 
    nome_pai varchar(100), -- ok
    raca varchar(50) not null,  -- ok
    numero_sus varchar(50) , -- ok
    tipo_pessoa enum('Agente','Paciente')  -- ok
);

select * from pessoa



INSERT INTO pessoa
(id,
nome,
sexo,
cpf,
data_nascimento,
telefone,
email,
senha,
local_nascimento,
estado,
cidade,
setor,
rua,
cep,
alergia,
nome_mae,
nome_pai,
raca,
numero_sus,
tipo_pessoa)
VALUES
( 1,
 'Ismael Carlos' ,
 'H',
'12345678915',
'1996/06/11',
'62982244942',
'leamsicarlos100@gmail.com',
'123',
'redenção',
'Goias',
'goiania',
'universitario',
'rua 260',
'74610240',
'',
'Neuzamar',
'Geraldo',
'pardo',
'',
'Agente');


insert into usuarios (id, nome, sexo, cpf,  data_nascimento , telefone,  email, senha, local_nascimento, estado, cidade, setor, rua, cep, alergia, nome_mae, nome_pai, raca, numero_sus, tipo_pessoa)
values (1, 'Dominic Rocha de Paulo', 'F', '12345678910', '1994/11/29', '123456789' 'dominic.rp.s2@gmail.com', 'mamae123456',  'Goiânia', 'Goiás', 'Goiânia', 'Parque Trindade II', 'Rua Raimundo Pena Senna', '74921230', '', 'Silene', 'Evinaldo', 'Pardo', '', 'Agente');

select * from pessoa;

