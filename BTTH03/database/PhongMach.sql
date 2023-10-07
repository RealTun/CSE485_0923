CREATE DATABASE PhongMach;

USE PhongMach;

CREATE TABLE BacSi
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tenBacSi VARCHAR(255),
	chuyenKhoa VARCHAR(255)
)

CREATE TABLE BenhNhan
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tenBenhNhan VARCHAR(255),
	ngayKham DATE,
	trieuChung TEXT,
	idBacSi INT,
	FOREIGN KEY (idBacSi) REFERENCES BacSi(id)
)

insert into bacsi (id, tenBacSi, chuyenKhoa) values (1, 'Rides', 'Aluminum Hydroxide, Magnesium Hydroxide, Simethicone');
insert into bacsi (id, tenBacSi, chuyenKhoa) values (2, 'Purchall', 'Acetaminophen');
insert into bacsi (id, tenBacSi, chuyenKhoa) values (3, 'Blaxall', 'Octinoxate and Oxybenzone');
insert into bacsi (id, tenBacSi, chuyenKhoa) values (4, 'MacGovern', 'Alcohol');
insert into bacsi (id, tenBacSi, chuyenKhoa) values (5, 'Bowra', 'Acetaminophen');