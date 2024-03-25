CREATE TABLE customers
(
  cust_id      number       NOT NULL AUTO_INCREMENT,
  cust_firstname    string(50)  NOT NULL ,
  cust_lastname string(50)  NULL ,
  cust_address    string(50)  NULL ,
  cust_city   string(5)   NULL ,
  cust_state     string(10)  NULL ,
  cust_zip string(50)  NULL ,
  cust_phone string(50)  NULL ,
  cust_email   string(255) NULL ,
  cust_password   string(255) NULL ,
  PRIMARY KEY (cust_id)
) ENGINE=InnoDB;

CREATE TABLE product_group
(
  prd_id      int       NOT NULL AUTO_INCREMENT,
  prd_groupname    string(50)  NOT NULL ,
  prd_imagefolder string(50)  NULL ,
   PRIMARY KEY (prd_id)
) ENGINE=InnoDB;

CREATE TABLE product
(
  pd_id      int      NOT NULL AUTO_INCREMENT,
  pd_groupid     int  NOT NULL ,
  pd_productname string(50)  NULL ,
  pd_productprice    string(50)  NULL ,
  pd_image   string(5)   NULL ,
  pd_description     string(10)  NULL ,
  PRIMARY KEY (prd_id)
) ENGINE=InnoDB;