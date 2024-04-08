CREATE TABLE notes
(
  note_id      int       NOT NULL AUTO_INCREMENT,
  date_time    int  NOT NULL ,
  note         char(250)  NULL ,
  PRIMARY KEY (note_id)
) ENGINE=InnoDB;