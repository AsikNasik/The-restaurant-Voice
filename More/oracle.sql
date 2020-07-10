insert into city(name_city)
values('Kharkiv');

update city 
set name_city = 'Kiev'
where name_city = 'Kharkiv';

create table City 
(
id_city int primary key,
name_city char(20) not null unique
)

create sequence city_sequ start with 1;

create or replace trigger city_bir
before insert on City 
for each row 
begin 
  select city_sequ.nextval
  into :new.id_city
  from dual;
end;



insert into client(telephone_cl,fio,sale,id_city)
values(991213123,'Ivanov Ivan Ivanovich', 0, 1);

update client
set fio = 'Ivanova Irina Ivanovna'
where telephone_cl = 991213123;

create table Client 
(
telephone_cl number(9) primary key,
fio varchar(30) not null,
sale number(2) default 0 check(sale in(0,5,10,15)),
id_city int not null,
constraint fk_city foreign key(id_city) references City(id_city)
);

insert into client_auto(telephone_cl, password_cl)
values(991213123,'user1');

update client_auto
set password_cl = 'user2'
where telephone_cl = 991213123;

--alter table client_auto 
--modify password_cl varchar(25);

create table Client_auto
(
telephone_cl number(9) not null,
password_cl varchar(25) not null,
constraint fk_client foreign key(telephone_cl) references Client(telephone_cl),
constraint pk_client_auto primary key(telephone_cl)
)

insert all
into TypeWorker (typeWorker, salary)
values ('manager', 20000)
into TypeWorker (typeWorker, salary)
values ('waiterA', 15000)
into TypeWorker (typeWorker, salary)
values ('waiterB', 11000)
into TypeWorker (typeWorker, salary)
values ('waiterC', 9000)
into TypeWorker (typeWorker, salary)
values ('newbier', 7000)
select * from dual;

update typeworker
set salary = 7500
where typeworker = 'newbier';

create table TypeWorker
(
typeWorker char(40) primary key,
salary number(5) not null
);

insert into staff(fio_staff, telephone_st,birthday,typeworker)
values('Avdeeva Anna Sergeevna', 506689696, '22/12/78', 'waiterA');

update staff
set typeworker = 'manager'
where telephone_st = 506689696;

create table Staff
(
id_staffer int primary key,
fio_staff varchar(30) not null,
telephone_st number(9) not null unique,
birthday date not null,
typeWorker char(40) not null,
constraint fk_typeW foreign key(typeWorker) references TypeWorker(typeWorker)
)

create sequence staff_se start with 1;

create or replace trigger staff_bir
before insert on Staff
for each row 
begin 
  select staff_se.nextval
  into :new.id_staffer
  from dual;
end;

insert into Staff_auto(telephone_st,password_st)
values(506689696, 'waitera1');

update staff_auto
set password_st = 'manager1'
where telephone_st = 506689696;

create table Staff_auto
(
telephone_st number(9) not null,
password_st varchar(25) not null,
constraint fk_staff foreign key(telephone_st) references Staff(telephone_st),
constraint pk_staff_auto primary key(telephone_st)
)

insert into service(data,id_staffer,telephone_cl)
values(TO_TIMESTAMP('2020-04-02 17:34:00', 'YYYY-MM-DD HH24:MI:SS'),1, 991213123);

update service 
set data = TO_TIMESTAMP('2019-04-02 17:34:00', 'YYYY-MM-DD HH24:MI:SS')
where data = TO_TIMESTAMP('2020-04-02 17:34:00', 'YYYY-MM-DD HH24:MI:SS');

create table Service
(
data timestamp with local time zone not null,
id_staffer int not null,
telephone_cl int not null,
constraint fk_id_sta foreign key(id_staffer) references Staff(id_staffer),
constraint fk_c foreign key(telephone_cl) references Client(telephone_cl),
constraint pk_se primary key(data,telephone_cl)
)

insert into review(telephone_cl,note,marks)
values(991213123, 'It is beautiful place with very taste dishes)))', 5);

create table Review
(
id_review int primary key,
telephone_cl number(9) not null,
note varchar(250) not null,
marks int default 5 check(marks in(1,2,3,4,5)) not null,
constraint fk_client_tel foreign key(telephone_cl) references Client(telephone_cl)
)

create sequence review_sequ start with 1;

create or replace trigger review_bir
before insert on Review
for each row 
begin 
  select review_sequ.nextval
  into :new.id_review
  from dual;
end;



