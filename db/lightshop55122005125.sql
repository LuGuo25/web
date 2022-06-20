/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2022/01/02 17:58:21                          */
/*==============================================================*/

CREATE DATABASE IF NOT EXISTS lightshop55122005125 DEFAULT CHARACTER SET utf8;
USE lightshop55122005125;#打开数据库

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
  price		DECIMAL(4,2),
  discount_price	DECIMAL(4,2),
  qty		INT DEFAULT 1,
  
  DATE 		CHAR(10),
  #brand	VARCHAR(100),
  #color	VARCHAR(5),
  small_imagefile	VARCHAR(20),
  large_imagefile	VARCHAR(20),
  PRIMARY KEY (productid)
);

#ALTER TABLE lineitem55122005130 ADD CONSTRAINT FK_orders55122005130_product2 FOREIGN KEY (pid)
#      REFERENCES product55122005130 (pid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE lineitem55122005130 ADD CONSTRAINT FK_orders55122005130_product55122005130 FOREIGN KEY (oid)
#      REFERENCES orders55122005130 (oid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE orders55122005130 ADD CONSTRAINT FK_account55122005130_orders55122005130 FOREIGN KEY (uid)
#      REFERENCES account55122005130 (uid) ON DELETE RESTRICT ON UPDATE RESTRICT;

#ALTER TABLE product55122005130 ADD CONSTRAINT FK_category55122005130_product55122005130 FOREIGN KEY (cateid)
#      REFERENCES category55122005130 (cateid) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO category55122005125 VALUES('01','U型节能灯');
INSERT INTO category55122005125 VALUES('02','O型节能灯');
INSERT INTO category55122005125 VALUES('03','圆型节能灯');
INSERT INTO category55122005125 VALUES('04','环型节能灯');
INSERT INTO category55122005125 VALUES('05','其他类型节能灯');

INSERT INTO product55122005125 VALUE('LED_01','05','高亮LED灯泡','无频闪，高亮度，寿命长，防水、防虫、防潮','28.88','20.88',100,'2019-08-01','small_LED_01.jpg','large_LED_01.jpg');
INSERT INTO product55122005125 VALUE('LED_02','01','经典U型节能灯泡','免邮，量大从优','18.00','15.00',10000,'2020-01-01','small_LED_02.jpg','large_LED_02.jpg');
INSERT INTO product55122005125 VALUE('LED_03','01','3~58W节能灯泡','联系客服，价格更优惠','20.00','12.00',500,'2017-12-12','small_LED_03.jpg','large_LED_03.jpg');
INSERT INTO product55122005125 VALUE('LED_04','01','高亮LED球灯泡','迪泽','10.00','8.88',200,'2021-11-01','small_LED_04.jpg','large_LED_04.jpg');
INSERT INTO product55122005125 VALUE('LED_05','02','A泡款灯泡','PC灯罩，高亮无可视频闪','12.00','10.00',100,'2021-11-01','small_LED_05.jpg','large_LED_05.jpg');
INSERT INTO product55122005125 VALUE('LED_06','02','FSL灯泡','量大价优，模拟专家','8.00','5.99',1000,'2022-01-01','small_LED_06.jpg','large_LED_06.jpg');
INSERT INTO product55122005125 VALUE('LED_07','01','45W~300W全系列U型灯泡','厂家直销，可开发票','50.00','30.00',50,'2016-09-01','small_LED_07.jpg','large_LED_07.jpg');
INSERT INTO product55122005125 VALUE('LED_08','05','三防LED长条灯','很贵，但是是铝材灯','30.00','28.88',20,'2022-06-01','small_LED_08.jpg','large_LED_08.jpg');
INSERT INTO product55122005125 VALUE('LED_09','05','LED变形灯','外贸爆款可折叠','18.00','16.66',600,'2022-02-01','small_LED_09.jpg','large_LED_09.jpg');
INSERT INTO product55122005125 VALUE('LED_10','05','LED土豪金飞碟灯','量大从优','10.00','8.88',200,'2021-09-30','small_LED_10.jpg','large_LED_10.jpg');
INSERT INTO product55122005125 VALUE('LED_11','02','USB低压灯','厂家直销，质保两年','9.00','8.88',3000,'2020-02-21','small_LED_11.jpg','large_LED_11.jpg');
insert into product55122005125 value('LED_12','02','LED照明灯泡','20W，多种规格','20.00','16.88',40,'2018-09-01','small_LED_12.jpg','large_LED_12.jpg');
INSERT INTO product55122005125 VALUE('LED_13','05','T8一体式灯管','价优，质保两年','16.00','12.66',40,'2018-09-01','small_LED_13.jpg','large_LED_13.jpg');
INSERT INTO product55122005125 VALUE('LED_14','05','大面积发光方形灯','采用高透光灯罩','9.00','5.55',100,'2022-01-01','small_LED_14.jpg','large_LED_14.jpg');
INSERT INTO product55122005125 VALUE('LED_15','04','超亮LED改造灯板','可开发票，官方正品，高亮耐用','3.00','1.66',40,'2020-06-01','small_LED_15.jpg','large_LED_15.jpg');
INSERT INTO product55122005125 VALUE('LED_16','02','20W高亮球泡','LED光源、省电耐用','8.88','6.66',80,'2021-04-01','small_LED_16.jpg','large_LED_16.jpg');
INSERT INTO product55122005125 VALUE('LED_17','05','爱迪生灯泡','满1000包邮，破碎必赔','20.00','17.00',20000,'2015-10-01','small_LED_17.jpg','large_LED_17.jpg');
INSERT INTO product55122005125 VALUE('LED_18','05','佐菱节能灯','足瓦高亮','6.00','4.88',1000,'2020-11-11','small_LED_18.jpg','large_LED_18.jpg');
INSERT INTO product55122005125 VALUE('LED_19','05','创新旋转式灯板','节能高亮、舒适赏鱼','50.00','45.00',50,'2022-05-01','small_LED_19.jpg','large_LED_19.jpg');
INSERT INTO product55122005125 VALUE('LED_20','02','柱泡大王节能灯','5W、9W、13W、15W、22W','10.00','7.50',2000,'2017-06-01','small_LED_20.jpg','large_LED_20.jpg');
INSERT INTO product55122005125 VALUE('LED_21','05','赏鱼LED灯','高亮透彻自然光','30.00','25.99',700,'2021-02-01','small_LED_21.jpg','large_LED_21.jpg');
INSERT INTO product55122005125 VALUE('LED_22','02','多档位调节充电灯泡','120W、现货速发','12.00','10.00',3000,'2018-10-01','small_LED_22.jpg','large_LED_22.jpg');
INSERT INTO product55122005125 VALUE('LED_23','02','特瑞达节能灯','质保一年、少耗能、破碎包换','10.00','7.88',1000,'2020-04-01','small_LED_23.jpg','large_LED_23.jpg');
INSERT INTO product55122005125 VALUE('LED_24','05','鱼缸专用LED射灯','1W、渐变色造景灯、水路两用','18.00','18.88',900,'2021-01-01','small_LED_24.jpg','large_LED_24.jpg');
INSERT INTO product55122005125 VALUE('LED_25','02','京华LED节能灯','全系列恒流、塑包铝外壳','10.00','4.88',1000,'2021-12-30','small_LED_25.jpg','large_LED_25.jpg');
INSERT INTO product55122005125 VALUE('LED_26','02','感应灯','人来灯亮、人走灯灭','6.00','4.88',300,'2022-02-21','small_LED_26.jpg','large_LED_26.jpg');
INSERT INTO product55122005125 VALUE('LED_27','03','三雄极光LED灯','无','20.00','18.88',50,'2019-09-01','small_LED_27.jpg','large_LED_27.jpg');
INSERT INTO product55122005125 VALUE('LED_28','05','馨惠黄金飞碟灯','良心品质、保持回头率','6.00','5.66',80,'2015-09-01','small_LED_28.jpg','large_LED_28.jpg');
INSERT INTO product55122005125 VALUE('LED_29','05','T5/T8一体化灯管','易安装、无频闪、经久耐用','5.00','3.55',1000,'2020-01-01','small_LED_29.jpg','large_LED_29.jpg');
INSERT INTO product55122005125 VALUE('LED_30','01','台灯灯管','破损包赔、无忧售后','8.00','4.20',40,'2022-06-01','small_LED_30.jpg','large_LED_30.jpg');
INSERT INTO product55122005125 VALUE('LED_31','05','LED飞碟灯E27','三雄极光','18.88','12.88',1000,'2017-08-01','small_LED_31.jpg','large_LED_31.jpg');
INSERT INTO product55122005125 VALUE('LED_32','05','森森LED节能灯','三色可调','20.00','15.00',10000,'2021-01-01','small_LED_32.jpg','large_LED_32.jpg');
INSERT INTO product55122005125 VALUE('LED_33','02','LED大莱款','恒流驱动','12.00','10.00',1000,'2020-12-12','small_LED_33.jpg','large_LED_33.jpg');
INSERT INTO product55122005125 VALUE('LED_34','05','红色节能台灯','好看、售后无忧','40.00','28.88',600,'2019-11-01','small_LED_34.jpg','large_LED_34.jpg');
INSERT INTO product55122005125 VALUE('LED_35','02','LED彩色灯泡','85W~265W','10.00','7.00',1000,'2021-11-01','small_LED_35.jpg','large_LED_35.jpg');
INSERT INTO product55122005125 VALUE('LED_36','01','LED-U型/螺旋节能灯','万瓦光电','13.00','8.99',10000,'2022-03-01','small_LED_36.jpg','large_LED_36.jpg');
INSERT INTO product55122005125 VALUE('LED_37','02','高亮节能玉米灯','长久耐用、强力发光','20.00','15.00',100,'2019-09-01','small_LED_37.jpg','large_LED_37.jpg');
INSERT INTO product55122005125 VALUE('LED_38','02','LED柱形灯泡','源头厂家，可开发票','20.00','18.88',200,'2022-05-01','small_LED_38.jpg','large_LED_38.jpg');
INSERT INTO product55122005125 VALUE('LED_39','05','LED高富帅球灯泡','八维空间灯饰','3.99','1.78',1000,'2022-01-30','small_LED_39.jpg','large_LED_39.jpg');
INSERT INTO product55122005125 VALUE('LED_40','05','暖光学习台灯','无重影、护眼','40.00','28.88',25,'2021-12-30','small_LED_40.jpg','large_LED_40.jpg');
INSERT INTO product55122005125 VALUE('LED_41','02','全光谱水草灯','COB集成芯片','19.99','18.88',1200,'2016-02-21','small_LED_41.jpg','large_LED_41.jpg');
INSERT INTO product55122005125 VALUE('LED_42','02','LED低压灯泡','高亮节能/防尘防潮','10.00','6.88',3000,'2020-07-08','small_LED_42.jpg','large_LED_42.jpg');
INSERT INTO product55122005125 VALUE('LED_43','04','驱蚊夜灯','<120°扩散LED','36.00','32.66',70,'2021-09-01','small_LED_43.jpg','large_LED_43.jpg');
INSERT INTO product55122005125 VALUE('LED_44','05','百思龙LED玉米灯','恒流86-265W','15.00','10.55',1000,'2022-04-12','small_LED_44.jpg','large_LED_44.jpg');
INSERT INTO product55122005125 VALUE('LED_45','03','充电款生鲜灯','每个灯都配有充电器','19.00','15.66',40,'2010-06-01','small_LED_45.jpg','large_LED_45.jpg');
INSERT INTO product55122005125 VALUE('LED_46','02','LED鳞片散热灯泡','商业工程灯、无可视频闪','9.00','6.88',300,'2016-02-21','small_LED_46.jpg','large_LED_46.jpg');
INSERT INTO product55122005125 VALUE('LED_47','05','专业摄影常亮灯泡','5500K标准灯光','40.00','36.88',4000,'2014-09-01','small_LED_47.jpg','large_LED_47.jpg');
INSERT INTO product55122005125 VALUE('LED_48','02','带遥控器LED太阳能灯','电量显示、遥控开关','6.00','3.66',5,'2021-08-15','small_LED_48.jpg','large_LED_48.jpg');
INSERT INTO product55122005125 VALUE('LED_49','05','海星鱼缸原装照明灯','节能高亮、蓝白光、高密闭性','69.00','55.55',100,'2022-02-28','small_LED_49.jpg','large_LED_49.jpg');
INSERT INTO product55122005125 VALUE('LED_50','02','浴霸中间照明灯泡','永嘉照明','5.00','2.66',4000,'2020-06-01','small_LED_50.jpg','large_LED_50.jpg');