
# CREATION DE LA BASE DE DONNEES

CREATE DATABASE IF NOT EXISTS GSB_DB;

USE GSB_DB;


# CREATION DES TABLES 

CREATE TABLE IF NOT EXISTS Role (
	id INT NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(30) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS User (
	id INT NOT NULL AUTO_INCREMENT,
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Permiss (
	userid INT NOT NULL,
	roleid INT NOT NULL,
	PRIMARY KEY (userid, roleid),
	FOREIGN KEY (userid) REFERENCES User(id),
	FOREIGN KEY (roleid) REFERENCES Role(id)
);

CREATE TABLE IF NOT EXISTS Etat (
	id INT NOT NULL,
	libelle VARCHAR(30) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS FicheDeFrais (
	id INT NOT NULL AUTO_INCREMENT,
	date DATE NOT NULL,
	description VARCHAR(255) NOT NULL,
	deplacement FLOAT,
	restauration FLOAT,
	hebergement FLOAT,
	autres FLOAT,
	userid INT NOT NULL,
	etatid INT NOT NULL DEFAULT 1,
	PRIMARY KEY (id),
	FOREIGN KEY (userid) REFERENCES User(id),
	FOREIGN KEY (etatid) REFERENCES Etat(id)
);


# AJOUT DES DONNEES

insert into Role values (1,'Admin');
insert into Role values (2,'Visiteur');
insert into Role values (3,'Comptable');


insert into User values (1,'Lee','Sang-Hyeok','sh.lee@gsb.com','$2y$10$kKRiA4GyodXOiEAV1GmgLeYLZ09DaqLx5FKW3r40g0.vd/3MWfU16'); #Password -> Lee69
insert into User values (2,'Andrieu','Nabil','n.andrieu@gsb.com','$2y$10$.WXQrp1sSXYq6.C9f6Dwy.zMN99Zrcu2NI804MxYVt3L0qEM4Vivm'); #Password -> Nabil69
insert into User values (3,'Andrieu','Tarik','t.andrieu@gsb.com','$2y$10$2b1444z5Vj5WbWOlOW2w2e6tAeP9YZHbLX99ganSR797E6e6JHGoS'); #Password -> Tarik69
insert into User values (4,'Musk','Elon','e.musk@gsb.com','$2y$10$AamDAD5nr/b0Gd6sIFz7/OYTo8sVQ3Otn0NxqOYW8jtlcplCrNMJ2'); #Password -> Elon69
insert into User values (5,'Watson','Emma','e.watson@gsb.com','$2y$10$ZSmlqyTxLnis7usD.P9mJ.HfHFPiTGA/k4huSgKb5iW89n6uJpAOa'); #Password -> Emma69
insert into User values (6,'Lawrence','Jennifer','j.lawrence@gsb.com','$2y$10$y91vkoMbR1j5ZRHrmvPDi.2nAc4wpMXOp57qgoa2sQpeoxTNfqjhq'); #Password -> Jennifer69
insert into User values (7,'Swift','Taylor','t.swift@gsb.com','$2y$10$p7dwSF7DmfpQJXFgrPJMjuImkozOINyCmYywx/xKX6p7rD81A1QJW'); #Password -> Taylor69
insert into User values (8,'Gates','Bill','b.gates@gsb.com','$2y$10$RTCPECEQPIrWD6noxHH0v.26ZKqx6jlImIJ/AERxNL2rtqUn.I2pu'); #Password -> Bill69
insert into User values (9,'Bezos','Jeff','j.bezos@gsb.com','$2y$10$5fJI8K8ADkJB2B6oGElm3e4yfnBcrqoKcVtLOMrXD4vnok/rmBHOy'); #Password -> Jeff69
insert into User values (10,'Grande','Ariana','a.grande@gsb.com','$2y$10$35q98oEQjbze4zizd9hZM.K/4pDNYXMQDtsHfJWI/5lPTR45KUrQS'); #Password -> Ariana69
insert into User values (11,'Johansson','Scarlett','s.johansson@gsb.com','$2y$10$bxMdCj6aTPBHV5b5og.BouFDucb2rt54nYwIaidqP0GLSE73JivMu'); #Password -> Scarlett69
insert into User values (12,'Benzema','Karim','k.benzema@gsb.com','$2y$10$8.ELyxzZN0b/77cEfnUE0.SfRoNM/OJ3YFSqVJNC/wTNyuESgivVS'); #Password -> Karim69
insert into User values (13,'Portman','Natalie','n.portman@gsb.com','$2y$10$OIsx02.ejB7NfDzDs8vPS.L4QQjjmpKXIbDky/Ot7UKQ9mKgzcety'); #Password -> Natalie69
insert into User values (14,'Jobs','Steve','s.jobs@gsb.com','$2y$10$ajx0PBXe/dO.sQmMB8ZvWOXt8IrnKglJcMEJYvjlbPkQ4VOxqJFwO'); #Password -> Steve69


insert into Etat values (1,'Non traitée');
insert into Etat values (2,'Acceptée');
insert into Etat values (3,'Refusée');


insert into FicheDeFrais values(1,DATE'2017-03-12',"Déplacement pharmacie de Zwolle",54.3,85.7,91.0,52.2,2,1);
insert into FicheDeFrais values(2,DATE'2016-09-20',"Déplacement pharmacie de Zhuhe",29.0,16.0,76.0,60.3,5,1);
insert into FicheDeFrais values(3,DATE'2019-04-03',"Déplacement pharmacie de Berezovo",85.6,1.2,83.8,28.3,8,1);
insert into FicheDeFrais values(4,DATE'2015-07-02',"Déplacement pharmacie de Banjarsari",62.3,20.3,60.8,6.0,10,3);
insert into FicheDeFrais values(5,DATE'2017-03-28',"Déplacement pharmacie de Mocamboa",77.2,66.1,56.9,24.9,12,3);
insert into FicheDeFrais values(6,DATE'2017-09-26',"Déplacement pharmacie de Pacucha",70.5,66.4,3.7,18.5,13,3);
insert into FicheDeFrais values(7,DATE'2020-07-16',"Déplacement pharmacie de Registro",66.0,2.2,99.8,81.9,14,1);
insert into FicheDeFrais values(8,DATE'2016-08-01',"Déplacement pharmacie de Yongxing Chengguanzhen",15.6,93.3,22.3,4.0,2,1);
insert into FicheDeFrais values(9,DATE'2018-06-21',"Déplacement pharmacie de Mirim",55.8,10.9,91.4,19.7,5,2);
insert into FicheDeFrais values(10,DATE'2017-04-27',"Déplacement pharmacie de Zarszyn",9.0,42.9,75.4,61.8,8,1);
insert into FicheDeFrais values(11,DATE'2020-02-08',"Déplacement pharmacie de Kokar",31.5,20.7,35.0,51.6,10,3);
insert into FicheDeFrais values(12,DATE'2015-07-02',"Déplacement pharmacie de Alfredo",58.4,26.0,47.2,35.7,12,1);
insert into FicheDeFrais values(13,DATE'2015-04-03',"Déplacement pharmacie de Kirs",41.1,31.3,75.3,14.0,13,2);
insert into FicheDeFrais values(14,DATE'2018-04-27',"Déplacement pharmacie de Vargem Grande Paulista",88.5,70.9,96.4,57.1,14,2);
insert into FicheDeFrais values(15,DATE'2019-06-18',"Déplacement pharmacie de Imanovci",41.7,65.6,11.0,5.9,2,3);
insert into FicheDeFrais values(16,DATE'2018-07-27',"Déplacement pharmacie de Barr",11.9,6.2,37.3,36.6,5,1);
insert into FicheDeFrais values(17,DATE'2018-09-02',"Déplacement pharmacie de Bromma",36.6,11.1,33.1,15.9,8,1);
insert into FicheDeFrais values(18,DATE'2018-06-08',"Déplacement pharmacie de Arias",77.2,6.9,39.3,48.5,10,2);
insert into FicheDeFrais values(19,DATE'2017-02-02',"Déplacement pharmacie de La Reforma",51.4,57.4,82.6,33.7,12,2);
insert into FicheDeFrais values(20,DATE'2019-01-24',"Déplacement pharmacie de Laranjeiras",39.3,69.7,85.8,52.2,13,2);
insert into FicheDeFrais values(21,DATE'2020-03-05',"Déplacement pharmacie de Bykhaw",47.8,85.3,24.0,52.2,14,1);
insert into FicheDeFrais values(22,DATE'2019-12-06',"Déplacement pharmacie de Ra­ohacha",70.9,68.2,53.0,76.9,2,3);
insert into FicheDeFrais values(23,DATE'2015-08-24',"Déplacement pharmacie de Jialou",12.0,82.6,13.9,51.9,5,1);
insert into FicheDeFrais values(24,DATE'2018-10-11',"Déplacement pharmacie de Nanbao",48.0,88.5,83.9,30.8,8,3);
insert into FicheDeFrais values(25,DATE'2017-10-03',"Déplacement pharmacie de Tsenher",26.4,33.8,48.8,25.4,10,2);
insert into FicheDeFrais values(26,DATE'2020-02-08',"Déplacement pharmacie de Sumberrojokrajan",8.6,56.0,71.3,58.3,12,3);
insert into FicheDeFrais values(27,DATE'2020-01-22',"Déplacement pharmacie de Sigou",50.9,90.4,25.9,71.0,14,3);
insert into FicheDeFrais values(28,DATE'2019-09-15',"Déplacement pharmacie de Huangyuan",71.3,70.9,92.6,6.8,2,3);
insert into FicheDeFrais values(29,DATE'2015-08-19',"Déplacement pharmacie de Zhongtong",58.5,65.1,9.4,5.9,5,1);
insert into FicheDeFrais values(30,DATE'2019-02-15',"Déplacement pharmacie de Manalu",15.5,93.3,32.0,79.1,8,2);
insert into FicheDeFrais values(31,DATE'2017-05-17',"Déplacement pharmacie de Ijero-Ekiti",70.3,23.0,22.9,62.8,10,2);
insert into FicheDeFrais values(32,DATE'2016-10-29',"Déplacement pharmacie de Kazinka",63.7,32.5,14.6,51.4,12,1);
insert into FicheDeFrais values(33,DATE'2018-04-26',"Déplacement pharmacie de Lota",2.8,95.4,55.4,84.1,13,2);
insert into FicheDeFrais values(34,DATE'2016-02-25',"Déplacement pharmacie de Aygestan",95.1,12.3,51.5,82.0,14,2);
insert into FicheDeFrais values(35,DATE'2018-04-18',"Déplacement pharmacie de Itaqui",74.9,57.5,78.4,51.2,2,2);
insert into FicheDeFrais values(36,DATE'2017-11-10',"Déplacement pharmacie de Zhuyang",6.8,13.4,63.8,73.8,5,1);
insert into FicheDeFrais values(37,DATE'2016-01-01',"Déplacement pharmacie de Baitao",10.7,37.3,85.3,15.5,8,3);
insert into FicheDeFrais values(38,DATE'2017-10-11',"Déplacement pharmacie de Zhaixi",68.6,23.5,48.8,8.4,10,1);
insert into FicheDeFrais values(39,DATE'2021-01-08',"Déplacement pharmacie de Millery",10.6,68.2,46.5,64.0,12,2);
insert into FicheDeFrais values(40,DATE'2017-11-10',"Déplacement pharmacie de Penépolis",84.5,70.3,72.1,19.1,13,1);
insert into FicheDeFrais values(41,DATE'2016-05-20',"Déplacement pharmacie de Liudaogou",16.7,83.8,17.3,95.9,14,1);
insert into FicheDeFrais values(42,DATE'2021-01-05',"Déplacement pharmacie de Roanne",65.6,24.2,27.4,25.9,2,2);
insert into FicheDeFrais values(43,DATE'2017-03-15',"Déplacement pharmacie de Ninomiya",6.9,34.6,23.8,93.3,5,2);
insert into FicheDeFrais values(44,DATE'2015-08-17',"Déplacement pharmacie de Korenovsk",66.0,47.8,49.4,54.5,8,3);
insert into FicheDeFrais values(45,DATE'2017-07-24',"Déplacement pharmacie de Villa Aglipay",95.1,74.3,64.7,59.2,10,1);
insert into FicheDeFrais values(46,DATE'2017-08-21',"Déplacement pharmacie de Zaliznychne",99.8,87.5,92.1,72.5,12,3);
insert into FicheDeFrais values(47,DATE'2017-01-06',"Déplacement pharmacie de Ayabaca",81.4,54.4,46.7,87.3,13,2);
insert into FicheDeFrais values(48,DATE'2020-07-12',"Déplacement pharmacie de Limeil-Bravannes",47.5,55.9,36.9,17.4,14,2);
insert into FicheDeFrais values(49,DATE'2017-02-16',"Déplacement pharmacie de Randuagung",48.3,79.7,43.9,3.6,2,2);
insert into FicheDeFrais values(50,DATE'2016-02-13',"Déplacement pharmacie de Miyazu",41.1,10.2,36.9,25.8,5,3);
insert into FicheDeFrais values(51,DATE'2019-01-13',"Déplacement pharmacie de Hisings Kamrra",46.3,89.2,33.1,2.9,8,2);
insert into FicheDeFrais values(52,DATE'2015-04-08',"Déplacement pharmacie de Xiaomian",78.5,68.0,81.6,91.0,10,3);
insert into FicheDeFrais values(53,DATE'2016-06-22',"Déplacement pharmacie de Nouaseur",25.4,97.5,98.0,36.9,12,3);
insert into FicheDeFrais values(54,DATE'2020-04-17',"Déplacement pharmacie de Sil-li",20.2,52.6,40.5,82.0,13,2);
insert into FicheDeFrais values(55,DATE'2016-11-29',"Déplacement pharmacie de Mikularovice",80.7,88.2,41.4,73.8,14,2);
insert into FicheDeFrais values(56,DATE'2020-10-03',"Déplacement pharmacie de Linkaping",1.7,52.8,8.6,46.0,2,1);
insert into FicheDeFrais values(57,DATE'2017-04-05',"Déplacement pharmacie de Przyborow",54.2,42.2,84.6,53.6,5,2);
insert into FicheDeFrais values(58,DATE'2019-04-15',"Déplacement pharmacie de Toktogul",8.9,89.8,78.5,68.6,8,3);
insert into FicheDeFrais values(59,DATE'2015-02-21',"Déplacement pharmacie de Itapecerica",48.1,95.6,99.5,35.3,10,3);
insert into FicheDeFrais values(60,DATE'2015-03-15',"Déplacement pharmacie de Fray Bentos",82.5,5.7,90.7,63.0,12,3);
insert into FicheDeFrais values(61,DATE'2019-01-23',"Déplacement pharmacie de Girang",67.4,52.5,7.0,86.3,13,2);
insert into FicheDeFrais values(62,DATE'2017-06-10',"Déplacement pharmacie de Wotho",74.2,5.4,98.0,70.3,14,2);
insert into FicheDeFrais values(63,DATE'2018-05-28',"Déplacement pharmacie de Novouzensk",35.9,53.1,15.6,23.0,2,3);
insert into FicheDeFrais values(64,DATE'2020-11-24',"Déplacement pharmacie de Sharvan",5.5,88.4,90.2,58.8,5,1);
insert into FicheDeFrais values(65,DATE'2015-10-12',"Déplacement pharmacie de Marcabal",35.6,26.1,46.5,62.2,8,2);
insert into FicheDeFrais values(66,DATE'2017-04-02',"Déplacement pharmacie de Liantan",95.9,77.9,56.7,70.5,10,2);
insert into FicheDeFrais values(67,DATE'2015-01-23',"Déplacement pharmacie de Cisagu",71.4,94.8,40.1,56.0,12,2);
insert into FicheDeFrais values(68,DATE'2018-01-20',"Déplacement pharmacie de Odiongan",33.8,80.5,72.4,48.8,13,2);
insert into FicheDeFrais values(69,DATE'2021-01-10',"Déplacement pharmacie de Lyon",15.7,16.0,68.4,56.2,14,3);
insert into FicheDeFrais values(70,DATE'2021-01-02',"Déplacement pharmacie de Givors",97.6,71.5,53.1,5.0,2,2);
insert into FicheDeFrais values(71,DATE'2015-10-06',"Déplacement pharmacie de Parkent",5.6,79.7,66.6,16.9,5,2);
insert into FicheDeFrais values(72,DATE'2018-03-04',"Déplacement pharmacie de Hertogenbosch",7.3,59.7,95.6,54.1,8,1);
insert into FicheDeFrais values(73,DATE'2017-06-20',"Déplacement pharmacie de Andapa",73.4,93.4,94.1,33.1,10,3);
insert into FicheDeFrais values(74,DATE'2015-03-16',"Déplacement pharmacie de Chichigalpa",39.6,93.1,40.8,96.3,12,3);
insert into FicheDeFrais values(75,DATE'2018-06-23',"Déplacement pharmacie de Xindian",81.5,30.8,7.1,61.4,13,3);
insert into FicheDeFrais values(76,DATE'2015-12-06',"Déplacement pharmacie de Kongjiang",21.8,81.2,50.0,94.1,14,2);
insert into FicheDeFrais values(77,DATE'2020-04-03',"Déplacement pharmacie de Svetlograd",94.7,59.3,23.5,92.7,2,1);
insert into FicheDeFrais values(78,DATE'2016-08-09',"Déplacement pharmacie de Heping",75.5,60.9,18.5,3.6,5,3);
insert into FicheDeFrais values(79,DATE'2015-07-17',"Déplacement pharmacie de Pandan",46.6,60.3,31.7,94.2,8,3);
insert into FicheDeFrais values(80,DATE'2015-07-27',"Déplacement pharmacie de KampÃ¡nis",4.4,98.3,57.4,79.7,10,3);
insert into FicheDeFrais values(81,DATE'2018-10-10',"Déplacement pharmacie de Montélimar",8.6,38.2,19.9,66.2,12,3);
insert into FicheDeFrais values(82,DATE'2017-09-14',"Déplacement pharmacie de Tabuadelo",50.6,71.5,9.4,27.5,13,1);
insert into FicheDeFrais values(83,DATE'2016-10-10',"Déplacement pharmacie de Krajan Satu",49.8,84.5,67.9,53.3,14,1);
insert into FicheDeFrais values(84,DATE'2017-09-02',"Déplacement pharmacie de Naples",43.4,98.4,32.6,38.4,2,3);
insert into FicheDeFrais values(85,DATE'2020-02-04',"Déplacement pharmacie de Jajce",39.1,44.1,85.1,66.6,5,3);
insert into FicheDeFrais values(86,DATE'2019-03-27',"Déplacement pharmacie de Isperikh",27.1,74.2,58.9,56.5,8,2);
insert into FicheDeFrais values(87,DATE'2017-11-08',"Déplacement pharmacie de Tieba",98.2,29.1,18.0,56.1,10,1);
insert into FicheDeFrais values(88,DATE'2016-07-22',"Déplacement pharmacie de Montauban",11.1,68.5,42.7,35.8,12,1);
insert into FicheDeFrais values(89,DATE'2020-09-17',"Déplacement pharmacie de Grenoble",6.6,5.5,20.9,91.4,13,2);
insert into FicheDeFrais values(90,DATE'2016-04-28',"Déplacement pharmacie de Negreiros",33.0,95.7,96.7,96.8,14,3);
insert into FicheDeFrais values(91,DATE'2021-01-15',"Déplacement pharmacie de Corbeille-Essones",3.2,41.2,98.2,73.5,2,3);
insert into FicheDeFrais values(92,DATE'2019-08-10',"Déplacement pharmacie de Aoji-ri",33.6,56.5,91.1,63.5,5,3);
insert into FicheDeFrais values(93,DATE'2015-09-15',"Déplacement pharmacie de Franco da Rocha",30.1,45.8,68.3,29.1,8,1);
insert into FicheDeFrais values(94,DATE'2020-12-01',"Déplacement pharmacie de Taliouine",69.3,85.6,74.0,20.2,10,3);
insert into FicheDeFrais values(95,DATE'2016-05-12',"Déplacement pharmacie de Ceggarw",40.0,33.1,10.0,69.2,12,3);
insert into FicheDeFrais values(96,DATE'2018-09-18',"Déplacement pharmacie de Maoqitun",16.4,41.4,10.1,76.0,13,1);
insert into FicheDeFrais values(97,DATE'2019-05-03',"Déplacement pharmacie de Itabuna",88.9,25.1,22.0,13.1,14,1);
insert into FicheDeFrais values(98,DATE'2016-09-03',"Déplacement pharmacie de Waeng Yai",18.6,43.1,30.5,45.2,2,1);
insert into FicheDeFrais values(99,DATE'2017-08-18',"Déplacement pharmacie de Oleksandriya",22.0,1.8,23.3,32.0,5,3);
insert into FicheDeFrais values(100,DATE'2015-03-29',"Déplacement pharmacie de Golomunta",51.8,30.9,37.2,50.2,8,1);
insert into FicheDeFrais values(101,DATE'2020-09-05',"Déplacement pharmacie de Laranjal Paulista",61.4,80.1,64.5,22.7,10,1);
insert into FicheDeFrais values(102,DATE'2019-02-27',"Déplacement pharmacie de Semenivka",65.1,26.7,65.4,62.9,12,2);
insert into FicheDeFrais values(103,DATE'2019-07-17',"Déplacement pharmacie de Shimen",61.8,91.2,94.9,23.2,13,2);
insert into FicheDeFrais values(104,DATE'2018-12-28',"Déplacement pharmacie de Cayenne",30.8,15.6,55.6,19.2,14,3);
insert into FicheDeFrais values(105,DATE'2016-12-30',"Déplacement pharmacie de Tarutung",25.4,19.8,12.0,76.2,2,3);
insert into FicheDeFrais values(106,DATE'2020-09-11',"Déplacement pharmacie de Fajé de Cima",74.1,76.0,33.3,81.7,5,3);
insert into FicheDeFrais values(107,DATE'2020-08-27',"Déplacement pharmacie de Liuhe",31.7,21.0,16.3,64.1,8,2);
insert into FicheDeFrais values(108,DATE'2016-08-23',"Déplacement pharmacie de Vale de Vila",50.5,7.1,35.3,98.0,10,3);
insert into FicheDeFrais values(109,DATE'2020-12-31',"Déplacement pharmacie de London",96.4,98.9,29.2,94.9,12,1);
insert into FicheDeFrais values(110,DATE'2017-10-18',"Déplacement pharmacie de Farrokh Shahr",45.9,51.6,48.1,88.4,13,2);
insert into FicheDeFrais values(111,DATE'2020-02-12',"Déplacement pharmacie de Quintao",61.0,92.0,89.1,73.0,14,3);
insert into FicheDeFrais values(112,DATE'2019-04-12',"Déplacement pharmacie de Castlebellingham",80.2,43.5,50.6,2.7,2,1);
insert into FicheDeFrais values(113,DATE'2016-08-29',"Déplacement pharmacie de Haizigou",96.9,36.9,5.2,90.8,5,1);
insert into FicheDeFrais values(114,DATE'2016-01-19',"Déplacement pharmacie de Baisha",3.2,37.4,53.4,50.2,8,3);
insert into FicheDeFrais values(115,DATE'2015-07-19',"Déplacement pharmacie de Timiryazevo",90.3,69.0,37.2,1.6,10,2);
insert into FicheDeFrais values(116,DATE'2020-10-15',"Déplacement pharmacie de Joao Camara",40.8,75.9,13.9,73.0,12,3);
insert into FicheDeFrais values(117,DATE'2018-04-11',"Déplacement pharmacie de Hurghada",8.9,82.1,91.0,21.2,13,1);
insert into FicheDeFrais values(118,DATE'2016-07-17',"Déplacement pharmacie de Banjar Tiga",4.4,76.8,70.9,13.1,14,2);
insert into FicheDeFrais values(119,DATE'2020-08-07',"Déplacement pharmacie de Shengmi",12.4,84.0,33.4,34.3,2,2);
insert into FicheDeFrais values(120,DATE'2015-08-20',"Déplacement pharmacie de Bolou",89.9,26.8,76.3,15.1,5,1);
insert into FicheDeFrais values(121,DATE'2020-11-22',"Déplacement pharmacie de Piripiri",9.2,63.0,79.8,19.0,8,2);
insert into FicheDeFrais values(122,DATE'2020-07-17',"Déplacement pharmacie de Nantes",83.7,12.3,13.3,46.5,10,3);
insert into FicheDeFrais values(123,DATE'2016-04-23',"Déplacement pharmacie de San Francisco de la Paz",35.0,79.9,15.8,27.8,12,1);
insert into FicheDeFrais values(124,DATE'2017-04-01',"Déplacement pharmacie de Xindu",97.8,83.5,75.6,4.9,13,3);
insert into FicheDeFrais values(125,DATE'2017-09-22',"Déplacement pharmacie de Zea",60.2,33.6,5.3,64.7,14,3);
insert into FicheDeFrais values(126,DATE'2019-04-02',"Déplacement pharmacie de Ivatsevichy",95.7,55.2,77.4,42.4,2,1);
insert into FicheDeFrais values(127,DATE'2018-12-25',"Déplacement pharmacie de Telsen",2.4,48.3,49.8,25.3,5,1);
insert into FicheDeFrais values(128,DATE'2016-04-03',"Déplacement pharmacie de Lorica",47.9,34.7,49.4,9.9,8,3);
insert into FicheDeFrais values(129,DATE'2016-02-27',"Déplacement pharmacie de Boucinhas",85.9,2.9,13.3,46.6,10,3);
insert into FicheDeFrais values(130,DATE'2019-08-22',"Déplacement pharmacie de Banjar Bau Kawan",97.8,83.4,77.8,74.3,12,1);
insert into FicheDeFrais values(131,DATE'2018-06-19',"Déplacement pharmacie de Apsonas",33.2,95.7,10.7,9.9,13,2);
insert into FicheDeFrais values(132,DATE'2018-05-15',"Déplacement pharmacie de Portelinha",17.0,81.7,3.3,73.5,14,3);
insert into FicheDeFrais values(133,DATE'2016-01-07',"Déplacement pharmacie de Logan Lake",2.6,94.5,70.5,17.5,2,3);
insert into FicheDeFrais values(134,DATE'2018-10-08',"Déplacement pharmacie de Angered",48.5,1.3,30.5,69.3,5,3);
insert into FicheDeFrais values(135,DATE'2015-01-19',"Déplacement pharmacie de Paulpietersburg",63.6,15.7,87.7,29.5,8,3);
insert into FicheDeFrais values(136,DATE'2020-07-08',"Déplacement pharmacie de Soao Silvestre",90.8,77.5,47.3,49.1,10,2);
insert into FicheDeFrais values(137,DATE'2020-10-12',"Déplacement pharmacie de Kamennyye Potoki",49.6,70.4,38.9,67.8,12,1);
insert into FicheDeFrais values(138,DATE'2015-12-04',"Déplacement pharmacie de Arias",54.9,37.8,50.9,38.9,13,1);
insert into FicheDeFrais values(139,DATE'2019-07-21',"Déplacement pharmacie de Pardubice",26.1,18.0,5.8,66.3,14,3);
insert into FicheDeFrais values(140,DATE'2017-06-13',"Déplacement pharmacie de Maoping",67.0,2.3,8.0,20.4,2,3);
insert into FicheDeFrais values(141,DATE'2015-06-06',"Déplacement pharmacie de Maceo",66.1,6.4,90.8,85.6,5,2);
insert into FicheDeFrais values(142,DATE'2015-11-02',"Déplacement pharmacie de Geji",74.6,69.2,85.9,61.8,8,2);
insert into FicheDeFrais values(143,DATE'2020-04-03',"Déplacement pharmacie de Longmen",80.6,53.1,40.4,80.4,10,1);
insert into FicheDeFrais values(144,DATE'2017-11-02',"Déplacement pharmacie de Vavuniya",82.4,61.4,8.9,34.2,12,2);
insert into FicheDeFrais values(145,DATE'2016-06-15',"Déplacement pharmacie de Bairro do Margara",62.6,36.4,52.2,89.6,13,1);
insert into FicheDeFrais values(146,DATE'2020-12-31',"Déplacement pharmacie de Xinbu",47.6,15.5,16.9,66.4,14,1);
insert into FicheDeFrais values(147,DATE'2016-01-28',"Déplacement pharmacie de Phatthalung",60.4,52.9,6.1,42.5,2,1);
insert into FicheDeFrais values(148,DATE'2020-02-18',"Déplacement pharmacie de Lojigawaran",96.4,69.7,59.9,55.4,5,3);
insert into FicheDeFrais values(149,DATE'2015-01-24',"Déplacement pharmacie de Hameenkoski",48.4,24.4,85.0,11.7,8,3);
insert into FicheDeFrais values(150,DATE'2015-11-24',"Déplacement pharmacie de Karlskrona",88.9,65.3,55.6,76.1,10,3);
insert into FicheDeFrais values(151,DATE'2015-03-26',"Déplacement pharmacie de Suohe",54.9,79.9,99.3,70.8,12,3);
insert into FicheDeFrais values(152,DATE'2016-07-15',"Déplacement pharmacie de Montalvo",3.8,34.8,43.2,73.0,13,3);
insert into FicheDeFrais values(153,DATE'2019-05-09',"Déplacement pharmacie de West End",1.5,38.6,23.7,50.9,14,3);
insert into FicheDeFrais values(154,DATE'2015-03-01',"Déplacement pharmacie de Ningtang",13.5,7.0,56.9,21.9,2,3);
insert into FicheDeFrais values(155,DATE'2020-08-01',"Déplacement pharmacie de Phitsanulok",33.3,91.4,60.7,66.4,5,1);
insert into FicheDeFrais values(156,DATE'2015-09-04',"Déplacement pharmacie de Windsor",12.4,75.7,10.9,47.2,8,1);
insert into FicheDeFrais values(157,DATE'2020-04-17',"Déplacement pharmacie de Babirik",56.8,61.0,30.2,39.9,10,3);
insert into FicheDeFrais values(158,DATE'2020-02-13',"Déplacement pharmacie de Cangkeuteuk Sabrang",22.6,90.1,63.9,49.6,12,1);
insert into FicheDeFrais values(159,DATE'2018-12-09',"Déplacement pharmacie de Cardal",74.5,64.3,95.8,87.5,13,3);
insert into FicheDeFrais values(160,DATE'2015-10-17',"Déplacement pharmacie de El Mirador",6.1,35.5,69.7,21.0,14,1);
insert into FicheDeFrais values(161,DATE'2016-11-01',"Déplacement pharmacie de Pretana",41.6,86.2,80.4,29.2,2,1);
insert into FicheDeFrais values(162,DATE'2016-11-14',"Déplacement pharmacie de Beiwa",77.4,76.0,33.2,58.4,5,3);
insert into FicheDeFrais values(163,DATE'2015-09-06',"Déplacement pharmacie de Yanai",18.8,16.8,3.4,49.0,8,2);
insert into FicheDeFrais values(164,DATE'2015-06-20',"Déplacement pharmacie de Tyler",24.3,17.8,95.6,10.9,10,2);
insert into FicheDeFrais values(165,DATE'2019-09-01',"Déplacement pharmacie de Shalakusha",75.5,98.2,7.9,84.8,12,3);
insert into FicheDeFrais values(166,DATE'2018-11-30',"Déplacement pharmacie de Zwedru",17.4,98.0,16.4,50.3,13,3);
insert into FicheDeFrais values(167,DATE'2016-08-01',"Déplacement pharmacie de Pandanwangi",85.3,25.8,64.1,92.3,14,2);
insert into FicheDeFrais values(168,DATE'2020-01-07',"Déplacement pharmacie de Dazhigu",61.4,43.2,61.7,64.9,2,1);
insert into FicheDeFrais values(169,DATE'2017-06-23',"Déplacement pharmacie de Mingshan",38.7,17.4,16.3,45.2,5,1);
insert into FicheDeFrais values(170,DATE'2018-09-20',"Déplacement pharmacie de Higetegera",69.7,4.1,24.0,79.9,8,1);
insert into FicheDeFrais values(171,DATE'2019-07-03',"Déplacement pharmacie de Jatirejo",32.8,75.4,32.0,28.7,10,2);
insert into FicheDeFrais values(172,DATE'2016-03-20',"Déplacement pharmacie de Angkimang",72.4,48.9,44.0,79.3,12,2);
insert into FicheDeFrais values(173,DATE'2015-08-22',"Déplacement pharmacie de Seattle",46.4,9.7,61.2,56.0,13,2);
insert into FicheDeFrais values(174,DATE'2015-02-03',"Déplacement pharmacie de Kajatian",75.4,9.3,79.6,84.8,14,1);
insert into FicheDeFrais values(175,DATE'2019-03-07',"Déplacement pharmacie de Huangji",30.6,28.6,89.2,30.8,2,2);
insert into FicheDeFrais values(176,DATE'2017-12-31',"Déplacement pharmacie de Xiugu",10.2,23.8,5.5,88.1,5,1);
insert into FicheDeFrais values(177,DATE'2017-12-12',"Déplacement pharmacie de Meiyao",85.2,48.4,70.3,53.6,8,2);
insert into FicheDeFrais values(178,DATE'2016-02-23',"Déplacement pharmacie de Liudu",51.1,19.6,23.7,25.4,10,3);
insert into FicheDeFrais values(179,DATE'2017-05-04',"Déplacement pharmacie de Conduaga",72.2,97.8,92.4,44.3,12,1);
insert into FicheDeFrais values(180,DATE'2019-05-02',"Déplacement pharmacie de Bungalaleng",80.5,30.5,71.6,68.6,13,2);
insert into FicheDeFrais values(181,DATE'2016-01-02',"Déplacement pharmacie de Tianchi",3.6,84.0,43.6,77.8,14,1);
insert into FicheDeFrais values(182,DATE'2019-03-17',"Déplacement pharmacie de Zhankhoteko",23.0,88.3,8.2,22.6,2,1);
insert into FicheDeFrais values(183,DATE'2019-03-02',"Déplacement pharmacie de Tarkrah",18.2,38.1,96.6,60.7,5,2);
insert into FicheDeFrais values(184,DATE'2016-11-02',"Déplacement pharmacie de Froly",37.2,78.2,43.9,37.6,8,1);
insert into FicheDeFrais values(185,DATE'2019-11-28',"Déplacement pharmacie de Muff",89.2,88.0,53.7,52.4,10,2);
insert into FicheDeFrais values(186,DATE'2020-03-03',"Déplacement pharmacie de Tomepampa",76.4,32.8,59.8,68.9,12,3);
insert into FicheDeFrais values(187,DATE'2020-02-25',"Déplacement pharmacie de Carreira",55.0,42.9,14.3,37.7,13,1);
insert into FicheDeFrais values(188,DATE'2016-11-09',"Déplacement pharmacie de Jinanten",75.6,74.6,13.2,45.2,14,1);
insert into FicheDeFrais values(189,DATE'2015-10-11',"Déplacement pharmacie de Binitinan",99.9,35.5,38.2,6.9,2,1);
insert into FicheDeFrais values(190,DATE'2015-08-09',"Déplacement pharmacie de Boramjen",57.1,86.3,21.7,77.5,5,1);
insert into FicheDeFrais values(191,DATE'2017-11-01',"Déplacement pharmacie de Izhmorskiy",15.8,29.5,86.6,77.9,8,3);
insert into FicheDeFrais values(192,DATE'2015-07-03',"Déplacement pharmacie de Sebu",82.5,12.5,31.9,70.9,10,1);
insert into FicheDeFrais values(193,DATE'2015-12-19',"Déplacement pharmacie de Zheleznogorsk",53.2,72.2,64.0,37.9,12,3);
insert into FicheDeFrais values(194,DATE'2016-03-26',"Déplacement pharmacie de Plomairion",89.0,69.6,13.4,34.3,13,3);
insert into FicheDeFrais values(195,DATE'2015-02-16',"Déplacement pharmacie de Kavadarci",37.1,44.7,75.2,29.0,14,2);
insert into FicheDeFrais values(196,DATE'2017-08-12',"Déplacement pharmacie de Fengcheng",28.3,2.7,14.9,11.1,2,1);
insert into FicheDeFrais values(197,DATE'2020-03-25',"Déplacement pharmacie de Phra Khanong",32.9,1.3,15.6,92.4,4,3);
insert into FicheDeFrais values(198,DATE'2016-11-15',"Déplacement pharmacie de Gobernador Gilvez",46.4,36.8,13.0,2.6,5,2);
insert into FicheDeFrais values(199,DATE'2016-10-29',"Déplacement pharmacie de Stod",52.1,66.4,20.4,19.5,8,1);
insert into FicheDeFrais values(200,DATE'2019-09-20',"Déplacement pharmacie de Goarnes",6.8,89.9,63.7,69.9,10,1);
insert into FicheDeFrais values(201,DATE'2017-11-08',"Déplacement pharmacie de Wakefield",19.9,65.3,3.3,55.8,12,1);
insert into FicheDeFrais values(202,DATE'2018-12-26',"Déplacement pharmacie de Palkino",6.4,13.7,77.2,46.8,13,1);
insert into FicheDeFrais values(203,DATE'2015-03-05',"Déplacement pharmacie de Ndeaboh",31.2,60.7,68.7,10.7,14,3);
insert into FicheDeFrais values(204,DATE'2016-07-29',"Déplacement pharmacie de Aqtobe",23.3,95.7,93.8,89.4,2,2);
insert into FicheDeFrais values(205,DATE'2020-11-03',"Déplacement pharmacie de Tarko-Sale",27.1,3.4,13.9,94.1,5,1);
insert into FicheDeFrais values(206,DATE'2020-06-25',"Déplacement pharmacie de Tagasilay",55.4,17.5,78.3,21.2,8,2);
insert into FicheDeFrais values(207,DATE'2020-04-23',"Déplacement pharmacie de Cumba",58.3,6.3,65.0,39.3,10,3);
insert into FicheDeFrais values(208,DATE'2019-07-03',"Déplacement pharmacie de Xingfu",38.7,3.6,34.2,77.0,12,1);
insert into FicheDeFrais values(209,DATE'2018-11-16',"Déplacement pharmacie de Legok",45.8,62.2,46.1,4.5,13,2);
insert into FicheDeFrais values(210,DATE'2017-12-06',"Déplacement pharmacie de Laoxingchang",56.4,91.0,39.7,54.0,14,2);

insert into Permiss values (1,1);
insert into Permiss values (2,2);
insert into Permiss values (3,3);
insert into Permiss values (4,1);
insert into Permiss values (5,2);
insert into Permiss values (6,3);
insert into Permiss values (7,1);
insert into Permiss values (8,2);
insert into Permiss values (9,3);
insert into Permiss values (10,2);
insert into Permiss values (11,3);
insert into Permiss values (12,2);
insert into Permiss values (13,2);
insert into Permiss values (14,2);