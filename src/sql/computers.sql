
--- mysql

CREATE TABLE computers (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  department varchar(256) NOT NULL,
  manufacturer text NOT NULL,
  ip_0 int(11) NOT NULL,
  ip_1 int(11) NOT NULL,
  ip_2 int(11) NOT NULL,
  ip_3 int(11) NOT NULL,
  mac_0 varchar(256) NOT NULL,
  mac_1 varchar(256) NOT NULL,
  mac_2 varchar(256) NOT NULL,
  mac_3 varchar(256) NOT NULL,
  mac_4 varchar(256) NOT NULL,
  mac_5 varchar(256) NOT NULL,
  sub_0 int(11) NOT NULL,
  sub_1 int(11) NOT NULL,
  sub_2 int(11) NOT NULL,
  sub_3 int(11) NOT NULL,
  os varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

----------------------

-- postgres

CREATE SEQUENCE computers_seq;

CREATE TABLE computers (
  id int NOT NULL DEFAULT NEXTVAL ('computers_seq') PRIMARY KEY,
  department varchar(256) NOT NULL,
  manufacturer text NOT NULL,
  ip_0 int NOT NULL,
  ip_1 int NOT NULL,
  ip_2 int NOT NULL,
  ip_3 int NOT NULL,
  mac_0 varchar(256) NOT NULL,
  mac_1 varchar(256) NOT NULL,
  mac_2 varchar(256) NOT NULL,
  mac_3 varchar(256) NOT NULL,
  mac_4 varchar(256) NOT NULL,
  mac_5 varchar(256) NOT NULL,
  sub_0 int NOT NULL,
  sub_1 int NOT NULL,
  sub_2 int NOT NULL,
  sub_3 int NOT NULL,
  os varchar(256) NOT NULL
) ;

--

INSERT INTO computers (id, department, manufacturer, ip_0, ip_1, ip_2, ip_3, mac_0, mac_1, mac_2, mac_3, mac_4, mac_5, sub_0, sub_1, sub_2, sub_3, os) VALUES
(1, 'Anmeldung', 'Lenovo', 192, 168, 0, 0, '11', '0', '0', '0', '0', '0', 255, 255, 255, 0, 'Archlinux'),
(2, 'Anmeldung', 'Lenovo', 192, 168, 0, 0, '11', '0', '0', '0', '0', '0', 255, 255, 255, 0, 'Archlinux'),
(6, 'Buchhaltung', 'Compaq', 192, 168, 0, 0, '2', '0', '0', '0', '0', '0', 255, 255, 255, 0, 'Ubuntu'),
(10, 'Buchhaltung', 'Lenovo', 192, 168, 0, 10, '5', '22', '33', '44', '55', '10', 255, 255, 255, 0, 'Back Track'),
(11, 'MRT', 'Lenovo', 192, 168, 0, 99, '5', '22', '0', '7', '3', '0', 255, 255, 255, 0, 'Windows 10'),
(12, 'RÃ¶ntgen', 'Asus', 192, 168, 0, 144, '5F', 'AF', 'FF', '7E', '3E', 'AA', 255, 255, 255, 0, 'MAC OS'),
(13, 'Anmeldung', 'Lenovo', 192, 168, 0, 254, '5F', 'AA', 'DD', 'FF', '11', '22', 255, 255, 255, 0, 'Back Track'),
(18, 'MRT', 'Asus', 192, 168, 0, 32, '5F', 'AF', 'FF', 'FF', '90', '77', 255, 255, 255, 0, 'Archlinux'),
(19, 'CT', 'Asus', 192, 168, 0, 20, '2D', '4A', '33', 'FF', '55', 'AA', 255, 255, 255, 0, 'Archlinux');