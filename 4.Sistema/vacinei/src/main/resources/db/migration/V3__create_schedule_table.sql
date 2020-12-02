CREATE TABLE schedule (
    id bigint primary key,
    user_id bigint,
    vaccine_id bigint,
    schedule_date timestamp,
    location text
);

CREATE SEQUENCE schedule_id_seq START 1;