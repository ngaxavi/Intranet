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
('bisonabiso', 'BisoNaBiso', 'Verwaltung', 'verwaltung@bisonabiso.de', '$2y$10$VsUSSCEhME3zYXdCQ5WM1OEuOfS4m07gD7pPry85XQKf92MxF7Fsi');