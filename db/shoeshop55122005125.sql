/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2022/01/02 17:58:21                          */
/*==============================================================*/

CREATE DATABASE IF NOT EXISTS shoeshop55122005125 DEFAULT CHARACTER SET utf8;
USE shoeshop55122005125;#打开数据库

DROP TABLE IF EXISTS account55122005125;

DROP TABLE IF EXISTS orders55122005125;

DROP TABLE IF EXISTS product55122005125;

DROP TABLE IF EXISTS category55122005125;

DROP TABLE IF EXISTS lineitem55122005125;

/*==============================================================*/
/* Table: account55122005125                                    */
/*==============================================================*/
CREATE TABLE account55122005125
(
   userid       INT NOT NULL AUTO_INCREMENT,

   fullname	VARCHAR(50) NOT NULL UNIQUE,
   upassword    VARCHAR(50) NOT NULL,
   sex          CHAR(1),
   uaddress	VARCHAR(40),
   email	VARCHAR(20),
   phone        VARCHAR(11),
   birthday	DATE,
   hobby	VARCHAR(100),
   imagefile	VARCHAR(50),
   PRIMARY KEY (userid)
);

/*==============================================================*/
/* Table: category55122005125                                    */
/*==============================================================*/
CREATE TABLE category55122005125
(
  catid		CHAR(2) NOT NULL,
  catname	VARCHAR(20),
# cades	TEXT,
  PRIMARY KEY (catid)
);

/*==============================================================*/
/* Table: lineitem55122005125                                   */
/*==============================================================*/
CREATE TABLE lineitem55122005125
(
   oid                  INT NOT NULL,
   pid                  CHAR(10) NOT NULL,
   quantity             INT,
   PRIMARY KEY (oid, pid)
);

/*==============================================================*/
/* Table: orders55122005125                                     */
/*==============================================================*/
CREATE TABLE orders55122005125
(
   oid                  INT NOT NULL AUTO_INCREMENT,
   uid                  CHAR(5),
   orderdate            DATETIME,
   express              VARCHAR(20),
   freight              DECIMAL(10,2),
   deliverydate         DATETIME,
   PRIMARY KEY (oid)
);

/*==============================================================*/
/* Table: products55122005125                                    */
/*==============================================================*/
CREATE TABLE product55122005125
(
  productid	CHAR(10) NOT NULL,
  catid		CHAR(2), # 该产品位于category中的种类
  productname 		TEXT, 
  descn		TEXT, #介绍
  listprice	DECIMAL(20,2),
  qty		INT DEFAULT 1,
  
  brand		VARCHAR(100),
  color		VARCHAR(5),
  PRIMARY KEY (productid)
  imagefile	
);

#ALTER TABLE lineitem55122005130 ADD CONSTRAINT FK_orders55122005130_product2 FOREIGN KEY (pid)
#      REFERENCES product55122005130 (pid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE lineitem55122005130 ADD CONSTRAINT FK_orders55122005130_product55122005130 FOREIGN KEY (oid)
#      REFERENCES orders55122005130 (oid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE orders55122005130 ADD CONSTRAINT FK_account55122005130_orders55122005130 FOREIGN KEY (uid)
#      REFERENCES account55122005130 (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE product55122005130 ADD CONSTRAINT FK_category55122005130_product55122005130 FOREIGN KEY (cateid)
#      REFERENCES category55122005130 (cateid) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO category55122005125 VALUES('01','童鞋'); 
INSERT INTO category55122005125 VALUES('02','成人男鞋'); 
INSERT INTO category55122005125 VALUES('03','成人女鞋'); 
INSERT INTO category55122005125 VALUES('04','老年鞋');  

INSERT INTO product55122005125 VALUES('XZ-TD-01','01','Air Jordan 1 Low Alt 彩云低邦篮球鞋','搭载柔韧板带和足底柔软的泡棉缓震配置','179.00','100','Nike','白');
INSERT INTO product55122005125 VALUES('XZ-TD-02','01','adidas Rapidaflex','采用网材鞋面，穿着舒适','119.00','100','adidas','黑');
INSERT INTO product55122005125 VALUES('XZ-NA-01','02','adidas originals Yeezy Boost 350 V2','采用白色Primeknit鞋面，搭配鞋带和下面的穿孔层','1903.00','20','adidas','白');
INSERT INTO product55122005125 VALUES('XZ-NA-02','02','Converse Chunk Taylor All Star 1970s Hi','经典后跟标，向传统致敬','389.00','200','Converse','酒红');
INSERT INTO product55122005125 VALUES('XZ-NV-01','03','Nike Air Force 1 Shadow Atmosphere','赋予双足出色的舒适感与爽酷体验','634.00','10','Nike','白粉');
INSERT INTO product55122005125 VALUES('XZ-NV-02','03','Nike SB Dunk Low Pro Iso Orange Label','鞋底带有清晰的前后两种不同纹路，防滑性高','4639.00','5','Nike','白黑');
INSERT INTO product55122005125 VALUES('XZ-LN-01','04','老北京布鞋','经济实惠还耐穿','22.00','10000','布舍元','黑');