CREATE TABLE vaccine (
    id bigint primary key,
    vaccine_name varchar(100),
    availability_date timestamp
);

CREATE SEQUENCE vaccine_id_seq START 1;