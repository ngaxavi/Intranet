
-- mysql

CREATE TABLE user_role (
  user_id INT(11) UNSIGNED NOT NULL,
  role_id INT(11) UNSIGNED NOT NULL,

  FOREIGN KEY (user_id) REFERENCES users(id) ,
  FOREIGN KEY (role_id) REFERENCES roles(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


--postgres
CREATE TABLE user_role (
  user_id INT CHECK (user_id > 0) NOT NULL,
  role_id INT CHECK (role_id > 0) NOT NULL,

  FOREIGN KEY (user_id) REFERENCES users(id) ,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);