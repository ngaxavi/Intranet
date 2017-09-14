-- Table user

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(256) NOT NULL,
  first_name varchar(256) NOT NULL,
  last_name varchar(256) NOT NULL,
  email varchar(256) NOT NULL,
  password varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;