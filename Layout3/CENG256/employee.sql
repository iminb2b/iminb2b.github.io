drop table employee;
CREATE TABLE employee
      ( EMPID CHAR(8 ) NOT NULL, 
        NAME VARCHAR(20), 
        DATEHIRED TIMESTAMP, 
        POSITION VARCHAR (13 ), 
        SALARY NUMERIC(10,2) not NULL,
        DEPTCODE VARCHAR(10),
        CANHIRE CHAR(1) DEFAULT 'Y', 
        BOSSID CHAR(8 ), 
        EMPNO  numeric(5),
        CONSTRAINT HIRECHECK CHECK (canHire in ('Y','N')), 
        constraint salarycheck check(salary between 10000 and 100000),
        PRIMARY KEY (EMPID)
       ) ;

insert into employee values('EMP1000','Rob Smith','1998-3-5','Manager',71500,'Sales','N','EMP007',1);


insert into employee values('EMP1001','Sarah Jones','1998-7-18','Manager',62201,'SUPPORT','Y','EMP007',2);

insert into employee values('EMP1007','Dave Charney','2005-1-3','President',118700,null,'Y','EMP007',3);

insert into employee values('EMP1002','Gurpreet Sinh','2005-8-13','Manager',57200,'SUPPORT','Y','EMP007',4);

insert into employee values('EMP1003','Devra Kambo','2006-6-27','Manager',61500,'PRODUCTION','Y','EMP007',5);

insert into employee values('EMP2001','Iris Murdoch','2006-6-27','Reception',31500,'SUPPORT','N','EMP1002',6);

insert into employee values('EMP2002','Simon Sterling','2007-4-14','Shipper',46280,'PROD','N','EMP1003',7);

insert into employee values('EMP2003','Elizabeth Castro','2008-1-7','WebMaster',54000,'SUPPORT','N','EMP1002',8);

insert into employee values('EMP2004','Jan Sebesta','2010-1-21','Linux Support',53000,'SUPPORT','N','EMP1002',9);

insert into employee values('EMP2005','Bart Simpson','2010-8-12','Vista Support',25000,'SUPPORT','N','EMP1002',10);

insert into employee values('EMP2006','Stephen Rago','2012-11-17','Manager',83000,'PROD','N','EMP007',11);

insert into employee values('EMP2007','Arnold Robbins','2013-2-28','Clerk',41000,'PROD','N','EMP1003',12);

insert into employee values('EMP3002', 'Rex Larson','2013-10-1','Assembler',38000,'PROD','N','EMP1003',13);

insert into employee values('EMP3003', 'Cynthia Chin','2014-12-15','Assembler',38500,'PROD','N','EMP1003',14);

insert into employee values('EMP3004', 'Cynthia Chin','2014-12-15','Assembler',38500,'PROD','N','EMP1003',15);

insert into employee values('EMP3005', 'Ira Flenner','2015-3-30','Assembler',42000,'PROD','Y','EMP1003',16);

