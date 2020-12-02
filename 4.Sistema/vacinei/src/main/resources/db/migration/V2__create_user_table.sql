CREATE TABLE users (
      id bigint primary key,
      enabled boolean default true,
      username varchar(100),
      password varchar(256),
      cpf varchar(11),
      birth_date date,
      unique (username)
);

CREATE SEQUENCE user_id_seq START 1;