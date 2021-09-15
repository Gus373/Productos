create database productos;
use productos;

create table t_product_list (
	id_producto int auto_increment, 
	name varchar(150), 
	price varchar(150), 
	sku varchar(150),
    is_seasonal varchar(150),
    quantity varchar(150),
    category varchar(150),
	primary key(id_producto));
ALTER TABLE t_product_list CONVERT TO CHARACTER SET utf8;

insert into t_product_list (name,price,sku,is_seasonal,quantity,category) values ('greenchilli',15,'1','false','100 GRS','Vegetables');