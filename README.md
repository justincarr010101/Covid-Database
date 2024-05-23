<h3 align="center"> Covid Database Project</h3>

<div align="center">
  <img src="https://github.com/justincarr010101/Covid-Database/blob/main/images/page1.png" alt="Relational Drawing Image" width="500" height="250">
</div>

<p align="center">
  This project showcases experience in PHP, HTML, JavaScript, CSS, and relational databases. It involves building a database-driven web application for managing COVID-related data. First i created a relational drawing and then wrote the script for the database. After i configured the php and html, and lastly connected it to my local host.
  <br>

<h3 align="center"> Relational Drawing</h3>

<div align="center">
  <img src="https://github.com/justincarr010101/Covid-Database/blob/main/images/Updated ER Diagram.png" alt="Relational Drawing Image" width="500" height="250">
</div>

<h3 align="center"> MySQL script</h3>

```sql
drop database if exists cisc332;
create database if not exists cisc332;

use cisc332;

create table Company(
       name varchar(40) not null primary key,
       street varchar(40),
       city varchar(40),
       province char(2),
       postalCode char(6)
);

create table Vaccine(
	lot char(6) not null primary key,
	expiryDate date not null,
	productionDate date not null,
	doses integer,
	producedBy varchar(40) not null,
	foreign key (producedBy) references Company(name)
);


create table VaxClinic(
	name varchar(40) not null primary key,
       street varchar(40),
       city varchar(40),
       province char(2),
       postalCode char(6)
);

Create table shipsTo(
	lotNumber char(6) not null,
	clinic char(40) not null,
	primary key(lotNumber, clinic),
	foreign key (lotNumber) references vaccine(lot) on delete cascade,
	foreign key (clinic) references VaxClinic(name) on delete cascade
);

Create table Patient(
	OHIP char(20),
	firstName varchar(40) not null,
	lastName varchar(40) not null,
	dob date not null
);

Create table Nurse(
	ID char(20) not null primary key,
	firstName varchar(40) not null,
	lastName varchar(40) not null
);


Create table practice(
	name char(40) not null primary key,
	phone char(10)
);


Create table doctor(
       ID char(20) not null primary key,
	firstName varchar(40) not null,
	lastName varchar(40) not null,
	practiceName char(40),
	foreign key (practiceName) references practice(name) on delete set null
);

Create table nurseCredentials(
	ID char(20) not null,
	Cred char(4) not null,
	Primary key(ID, Cred),
	Foreign key (ID) references Nurse(id) on delete cascade
);

Create table drCredentials(
	ID char(20) not null,
	Cred char(4) not null,
	Primary key(ID, Cred),
	Foreign key (ID) references Doctor(id) on delete cascade
);



Create table NurseWorksAt(
	clinicName char(40) not null,
	ID char(20) not null,
	Primary key(clinicName, ID),
	Foreign key (clinicName) references VaxClinic(name) on delete cascade,
	Foreign key (ID) references Nurse(ID) on delete cascade
);

Create table DrWorksAt(
	clinicName char(40) not null,
	ID char(20) not null,
	Primary key(clinicName, ID),
	Foreign key (clinicName) references VaxClinic(name) on delete cascade,
	Foreign key (ID) references Doctor(ID) on delete cascade
);

Create table Vaccination(
	patientOHIP char(20),
	vaxClinic char(40) not null,
	vaccineLot char(6) not null,
	date datetime not null
);


insert into Company values("Pfizer", "235 East 42nd Street", "New York City","New York", "H9J 2M5"),
			  ("Moderna", "200 Technology Square", "Cambridge","Massachusetts","40930"),
			  ("Astrazeneca", "1 Francis Crick Avenue", "Cambridge","England","England""19897"),
	 		("Johnson & Johnson", "One Johnson & Johnson Plaza", "New Brunswick","New Jersey" , "08837");

insert into Vaccine values("234411", "2023-05-02", "2020-01-01", "2000", "Pfizer"),
			  ("344211", "2023-03-02", "2019-10-01", "2000", "Astrazeneca"),
			  ("000011", "2023-05-02", "2020-01-01", "2000", "Johnson & Johnson"),
			  ("100111", "2023-05-02", "2020-01-01", "2000", "Moderna");
              
insert into Patient values
             		 ("9696202132FL", "Laura", "Docks", "1993-02-23"),
			  ("3434213234LX", "Dan", "Deman", "1998-01-29"),
			  ("8521367235FX", "Lucian", "Lucario", "2006-05-20"),
			  ("9358238856PU", "Kayn", "Darkin", "1965-09-01");
              
insert into VaxClinic values("Poke Centre", "Ash Avenue", "Garadose", "ON", "N301KE"),
			    ("Stay Safe Central", "Safety Stret", "Caution", "SA", "010LON"),
			    ("A Dose A Day", "Dose Corner", "Dosenate","DC" , "DONE12"),
		            ("Boost to be Immune", "Immunity Street", "Variant", "OM","3D2HG5");
                       
                          
insert into Vaccination values("9696202132FL", "Poke Centre", "234411", "2021-02-05 1:30"),
			      ("3434213234LX","Stay Safe Central", "344211", "2021-03-02 12:01"),
			      ( "8521367235FX", "A Dose A Day", "000011", "2021-04-01 8:06"),
			      ("9358238856PU","Boost to be Immune", "100111", "2021-05-12 9:00");
                          
insert into Nurse values  ("123456790", "Justin", "Carr"),
			  ("098765432", "Ori", "Gurevich"),
			  ("458294375", "Jack", "Bondy"),
			  ("292923838", "Jay", "Shin");
              
insert into practice values("Pokers", "593-214-4356"),
			   ("Healing", "853-248-2853"),
			   ("Overpowered", "519-567-2897"),
			   ("Nerfed", "924-233-0000");
                          
insert into doctor values ("123456711", "Cash", "Johnny", "Pokers"),
			  ("098765411","Julia", "Bondy", "Healing"),
			  ("458294311", "Elon", "Einstein", "Overpowered"),
			  ("292923811", "Albert", "Musk", "Nerfed");

insert into nurseCredentials values ("123456790", "NS"),
			      ("098765432", "NS"),
		              ("458294375", "NS"),
			      ("292923838", "NS");

insert into drCredentials values ("123456711", "DR"),
			      ("098765411", "DR"),
		              ("458294311", "DR"),
			      ("292923811", "DR");


Insert into shipsTo values( "234411", "Poke Centre"),
			  ( "344211", "Stay Safe Central"),
			  ( "000011","Boost to be Immune"),
			  ( "100111","A Dose A Day");

insert into DrWorksAt values ("Poke Centre" , "123456711"),
			     ("Stay Safe Central" , "098765411"),
			     ("Boost to be Immune" ,"458294311"),
			     ( "A Dose A Day" ,"292923811");

insert into NurseWorksAt values("Poke Centre", "123456790"),
			  ("Stay Safe Central", "098765432"),
             		  ("Boost to be Immune", "292923838"),
		          ("A Dose A Day", "458294375");
sql'''
