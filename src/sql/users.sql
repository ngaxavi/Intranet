-- Table user

-- mysql
CREATE TABLE users (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  username varchar(256) NOT NULL,
  first_name varchar(256) NOT NULL,
  last_name varchar(256) NOT NULL,
  email varchar(256) NOT NULL,
  password varchar(256) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--postgres
CREATE SEQUENCE users_seq;

CREATE TABLE users (
  id int CHECK (id > 0) NOT NULL DEFAULT NEXTVAL ('users_seq'),
  username varchar(256) NOT NULL,
  first_name varchar(256) NOT NULL,
  last_name varchar(256) NOT NULL,
  email varchar(256) NOT NULL,
  password varchar(256) NOT NULL,
  PRIMARY KEY (id)
);


INSERT INTO users (username, first_name, last_name, email, password) VALUES
('bissonabisso', 'BissoNaBisso', 'Verwaltung', 'verwaltung@bissonabisso.de', '$2y$10$p3nsS1U6ilfb/smMNxnx4ucGa2ZoMMuyovtIKPaEJ7k0p0aQeQEJi');