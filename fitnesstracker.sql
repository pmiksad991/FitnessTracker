#drop database if exists fitnesstracker;
#create database fitnesstracker character set utf8 collate utf8_croatian_ci;
#use fitnesstracker;
ALTER DATABASE CHARACTER SET utf8 COLLATE utf8_unicode_ci;

create table korisnik(
id				int				not null primary key auto_increment,
ime				varchar(50)		not null,
prezime			varchar(50)		not null,
datum_rodenja	datetime		not null,
spol			char(1)			not null,
username		varchar(30)		not null,
pass			varchar(10)		not null,
email			varchar(30)		not null
)engine=InnoDB;

create table hrana(
id				int				not null primary key auto_increment,
naziv			varchar(50)		not null,
kalorije		int				not null,
masti			decimal(18,1)	not null,
zas_masti		decimal(18,1)	not null,
kolesterol		decimal(18,1)	not null,
natrij			decimal(18,1)	not null,
ugljikohidrati	decimal(18,1)	not null,
secer			decimal(18,1)	not null,
protein			decimal(18,1)	not null
)engine=InnoDB;

create table obrok(
id				int				not null primary key auto_increment,
id_korisnika	int				not null,
vrijeme			date			not null
)engine=InnoDB;

create table obrok_hrana(
id_obroka		int				not null,
id_hrane		int				not null,
tezina			int				not null
)engine=InnoDB;


create table statistika_tijela(
id				int				not null primary key auto_increment,
id_korisnika	int				not null,
visina			int				not null,
tezina			decimal(18,1)	not null,
postotak_masti	decimal(18,1),
datum			datetime 		default now() not null
)engine=InnoDB;

create table cilj(
id				int				not null primary key auto_increment,
id_korisnika	int				not null,
tezina_cilj			decimal(18,1)	not null,
postotak_masti_cilj	decimal(18,1),
datum_cilj			datetime		not null,
tezina_stanje	char(1),
postotak_stanje	char(1)
)engine=InnoDB;

alter table obrok add foreign key(id_korisnika) references korisnik(id);

alter table obrok_hrana add foreign key(id_obroka) references obrok(id);
alter table obrok_hrana add foreign key(id_hrane) references hrana(id);

alter table statistika_tijela add foreign key(id_korisnika) references korisnik(id);

alter table cilj add foreign key(id_korisnika) references korisnik(id);

insert into korisnik (id, ime, prezime, datum_rodenja, spol, username, pass, email) values 
(null, 'Marko', 'Markić', '1992-08-11', 'M', 'mmarkic', 'sifra1', 'mmarkic@gmail.com'),
(null, 'Tomislav', 'Tomić', '1993-12-31', 'M', 'ttomic', 'sifra2', 'ttomic@email.com'),
(null, 'Marina', 'Marić', '1991-02-21', 'Ž', 'mmaric', 'sifra3', 'mmaric@gmail.com'),
(null, 'Jasna', 'Horvat', '1994-10-16', 'Ž', 'jhorvat', 'sifra4', 'jhorvat@gmail.com');

#select * from korisnik;

insert into hrana(id, naziv, kalorije, masti, zas_masti, kolesterol, natrij, ugljikohidrati, secer, protein) values 
(null, 'Pileća prsa u pećnici', 79, 0.4, 0.1, 36, 1087, 2.2, 0.1, 17),
(null, 'Posni sir', 105, 1, 0.6, 12, 702, 7.7, 5.5, 16),
(null, 'Tuna u ulju', 198, 8.2, 1.5, 18, 416, 0, 0, 29),
(null, 'Pečeni krumpir', 93, 0.1, 0, 0, 5, 22, 1.7, 2);

#select * from hrana;

insert into obrok(id, id_korisnika, vrijeme) values 
(null, 1, now()),
(null, 2, now()),
(null, 3, now()),
(null, 4, now());

#select * from obrok;

insert into obrok_hrana(id_obroka, id_hrane, tezina) values 
(1,1,100),
(1,4,100),
(2,2,150),
(2,3,100);

#select * from obrok_hrana;

insert into statistika_tijela(id, id_korisnika, visina, tezina, postotak_masti, datum) values
(null, 1, 176, 82.3, 18, '2016-1-12'),
(null, 2, 182, 93.5, 16, '2016-1-12'),
(null, 3, 165, 60, 14.2, '2016-1-12'),
(null, 4, 170, 65.6, 16.3, '2016-1-12'),
(null, 1, 176, 81.3, 17, '2016-2-12'),
(null, 2, 182, 92.5, 15, '2016-2-12'),
(null, 3, 165, 59, 13.2, '2016-2-12'),
(null, 4, 170, 64.6, 15.3, '2016-2-12'),
(null, 1, 176, 80.3, 16, '2016-3-12'),
(null, 2, 182, 91.5, 14, '2016-3-12'),
(null, 3, 165, 58, 12.2, '2016-3-12'),
(null, 4, 170, 63.6, 14.3, '2016-3-12'),
(null, 1, 176, 79.3, 15, '2016-4-12'),
(null, 2, 182, 90.5, 13, '2016-4-12'),
(null, 3, 165, 57, 11.2, '2016-4-12'),
(null, 4, 170, 62.6, 13.3, '2016-4-12'),
(null, 1, 176, 78.3, 14, '2016-5-12'),
(null, 2, 182, 89.5, 12, '2016-5-12'),
(null, 3, 165, 56, 10.2, '2016-5-12'),
(null, 4, 170, 61.6, 12.3, '2016-5-12'),
(null, 1, 176, 77.3, 13, '2016-6-12'),
(null, 2, 182, 88.5, 11, '2016-6-12'),
(null, 3, 165, 55, 9.2, '2016-6-12'),
(null, 4, 170, 60.6, 11.3, '2016-6-12'),
(null, 1, 176, 76.3, 12, '2016-7-12'),
(null, 2, 182, 87.5, 10, '2016-7-12'),
(null, 3, 165, 54, 8.2, '2016-7-12'),
(null, 4, 170, 59.6, 10.3, '2016-7-12'),
(null, 1, 176, 75.3, 11, '2016-8-12'),
(null, 2, 182, 86.5, 9, '2016-8-12'),
(null, 3, 165, 53, 7.2, '2016-8-12'),
(null, 4, 170, 58.6, 9.3, '2016-8-12'),
(null, 1, 176, 74.3, 10, '2016-9-12'),
(null, 2, 182, 85.5, 8, '2016-9-12'),
(null, 3, 165, 52, 6.2, '2016-9-12'),
(null, 4, 170, 57.6, 8.3, '2016-9-12'),
(null, 1, 176, 73.3, 9, '2016-10-12'),
(null, 2, 182, 84.5, 7, '2016-10-12'),
(null, 3, 165, 51, 5.2, '2016-10-12'),
(null, 4, 170, 56.6, 7.3, '2016-10-12'),
(null, 1, 176, 72.3, 8, '2016-11-12'),
(null, 2, 182, 83.5, 6, '2016-11-12'),
(null, 3, 165, 50, 4.2, '2016-11-12'),
(null, 4, 170, 55.6, 6.3, '2016-11-12'),
(null, 1, 176, 71.3, 7, '2016-12-12'),
(null, 2, 182, 82.5, 5, '2016-12-12'),
(null, 3, 165, 49, 3.2, '2016-12-12'),
(null, 4, 170, 54.6, 5.3, '2016-12-12');

#select * from statistika_tijela;

insert into cilj(id, id_korisnika, tezina_cilj, postotak_masti_cilj, datum_cilj, tezina_stanje, postotak_stanje) values 
(null, 1, 76, 13, '2016-9-12', '1', '1'),
(null, 2, 86, 15, '2016-9-12', '2', '2'),
(null, 3, 60, 12, '2016-9-12', '1', '2'),
(null, 4, 73, 15, '2016-9-12', '2', '1');

select * from cilj;

insert into hrana(id, naziv, kalorije, masti, zas_masti, kolesterol, natrij, ugljikohidrati, secer, protein) values
(null, 'ab1', 1, 0.1, 0.1, 6, 100, 2.1, 0.1, 1),
(null, 'ab2', 2, 0.2, 0.2, 7, 101, 2.2, 0.2, 2),
(null, 'ab3', 3, 0.3, 0.3, 8, 102, 2.3, 0.3, 3),
(null, 'ab4', 4, 0.4, 0.4, 9, 103, 2.4, 0.4, 4),
(null, 'ab5', 5, 0.5, 0.5, 10, 104, 2.5, 0.5, 5),
(null, 'ab6', 6, 0.6, 0.6, 11, 105, 2.6, 0.6, 6),
(null, 'ab7', 7, 0.7, 0.7, 12, 106, 2.7, 0.7, 7),
(null, 'ab8', 8, 0.8, 0.8, 13, 107, 2.8, 0.8, 8),
(null, 'ab9', 9, 0.9, 0.9, 14, 108, 2.9, 0.9, 9),
(null, 'ab10', 10, 0.10, 0.10, 15, 109, 2.10, 0.10, 10),
(null, 'ab11', 11, 0.11, 0.11, 16, 110, 2.11, 0.11, 11),
(null, 'ab12', 12, 0.12, 0.12, 17, 111, 2.12, 0.12, 12),
(null, 'ab13', 13, 0.13, 0.13, 18, 112, 2.13, 0.13, 13),
(null, 'ab14', 14, 0.14, 0.14, 19, 113, 2.14, 0.14, 14),
(null, 'ab15', 15, 0.15, 0.15, 20, 114, 2.15, 0.15, 15),
(null, 'ab16', 16, 0.16, 0.16, 21, 115, 2.16, 0.16, 16),
(null, 'ab17', 17, 0.17, 0.17, 22, 116, 2.17, 0.17, 17),
(null, 'ab18', 18, 0.18, 0.18, 23, 117, 2.18, 0.18, 18),
(null, 'ab19', 19, 0.19, 0.19, 24, 118, 2.19, 0.19, 19),
(null, 'ab20', 20, 0.20, 0.20, 25, 119, 2.20, 0.20, 20),
(null, 'ab21', 21, 0.21, 0.21, 26, 120, 2.21, 0.21, 21),
(null, 'ab22', 22, 0.22, 0.22, 27, 121, 2.22, 0.22, 22),
(null, 'ab23', 23, 0.23, 0.23, 28, 122, 2.23, 0.23, 23),
(null, 'ab24', 24, 0.24, 0.24, 29, 123, 2.24, 0.24, 24),
(null, 'ab25', 25, 0.25, 0.25, 30, 124, 2.25, 0.25, 25),
(null, 'ab26', 26, 0.26, 0.26, 31, 125, 2.26, 0.26, 26),
(null, 'ab27', 27, 0.27, 0.27, 32, 126, 2.27, 0.27, 27),
(null, 'ab28', 28, 0.28, 0.28, 33, 127, 2.28, 0.28, 28),
(null, 'ab29', 29, 0.29, 0.29, 34, 128, 2.29, 0.29, 29),
(null, 'ab30', 30, 0.30, 0.30, 35, 129, 2.30, 0.30, 30);




