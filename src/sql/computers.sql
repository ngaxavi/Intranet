
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

INSERT INTO computers (department, manufacturer, ip_0, ip_1, ip_2, ip_3, mac_0, mac_1, mac_2, mac_3, mac_4, mac_5, sub_0, sub_1, sub_2, sub_3, os) VALUES
('Anmeldung', 'Lenovo', 192, 168, 20, 0, '11', 'C0', '50', '70', 'R0', 'B0', 255, 255, 255, 7, 'Archlinux'),
('Anmeldung', 'Lenovo', 192, 168, 0, 34, '44', '11', 'C2', 'F0', '01', '02', 255, 255, 255, 57, 'Archlinux'),
('Buchhaltung', 'Compaq', 192, 168, 30, 0, 'A2', '10', '50', 'FG', '00', '01', 255, 255, 255, 79, 'Ubuntu'),
('Buchhaltung', 'Lenovo', 192, 168, 0, 10, 'B5', '22', '33', '44', '55', '10', 255, 255, 255, 95, 'Back Track'),
('MRT', 'Lenovo', 192, 168, 0, 99, '00', '03', '47', '77', 'B3', '70', 255, 255, 255, 14, 'Windows 10'),
('RÃ¶ntgen', 'Asus', 192, 168, 40, 144, '00', '0D', '93', '7E', '3E', 'AA', 255, 255, 255, 74, 'MAC OS'),
('Anmeldung', 'Lenovo', 192, 168, 78, 254, 'E8', 'F1', 'B0', 'FF', '11', '22', 255, 255, 255, 15, 'Back Track'),
('MRT', 'Asus', 192, 168, 10, 32, 'EC', '23', '3D', 'FF', '90', '77', 255, 255, 255, 26, 'Archlinux'),
('CT', 'Asus', 192, 168, 0, 20, 'FC', 'FE', 'C2', 'FF', '55', 'AA', 255, 255, 255, 78, 'Archlinux');