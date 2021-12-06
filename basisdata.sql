CREATE TABLE pasien 
(
  no_rm		varchar(8)	NOT NULL,
  nm_psn	varchar(88)	NOT NULL,
  sex		varchar(1)	DEFAULT NULL,
  tgl_lhr	date		DEFAULT NULL,
  photo		varchar(88)	DEFAULT NULL
) ENGINE=InnoDB;