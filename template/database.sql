CREATE TABLE IF NOT EXISTS dosen
(
  nik varchar(5) NOT NULL,
  nm_dos varchar(30) NOT NULL,
  alamat varchar(30) DEFAULT NULL,
  kota varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO dosen (nik, nm_dos, alamat, kota) VALUES
('20201', 'Joko Sutrisno', 'Papahan Tasikmadu', 'B'),
('20202', 'Dewi Purnomo', 'Mojolaban Sukoharjo', 'A'),
('20203', 'Endang Purwasih', 'Banyuanyar Surakarta', 'C'),
('20204', 'Purnama Surya', 'Gedongan Tingkir', 'D'),
('20205', 'Bolo Jampur', 'Tembalang Semarang', 'E');

CREATE TABLE IF NOT EXISTS kota
(
  kd_kota varchar(2) NOT NULL,
  nm_kota varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kota (kd_kota, nm_kota) VALUES
('A', 'Sukoharjo'),
('B', 'Karanganyar'),
('C', 'Surakarta'),
('D', 'Salatiga'),
('E', 'Semarang');

CREATE TABLE IF NOT EXISTS mahasiswa
(
  nim varchar(10) NOT NULL,
  nm_mhs varchar(30) NOT NULL,
  prodi varchar(1) DEFAULT NULL,
  sex varchar(1) DEFAULT NULL,
  tgl_lhr date DEFAULT NULL,
  dosen_wali varchar(5) DEFAULT NULL,
  alamat varchar(30) DEFAULT NULL,
  kota varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mahasiswa (nim, nm_mhs, prodi, sex, tgl_lhr, dosen_wali, alamat, kota) VALUES
('190M040', 'Yusuf', '2', 'L', '1990-09-16', '20205', 'Watu Kelir Indah', 'E'),
('190M041', 'Emi', '3', 'P', '1991-11-25', '20203', 'Sanggrahan Big City', 'C'),
('190M042', 'Syaiful', '2', 'L', '1992-08-16', '20201', 'Harapan Jaya True Palace', 'A'),
('190M043', 'Adel', '4', 'P', '1991-03-01', '20204', 'Jl. Raya Pahlawan 17081945', 'D'),
('190M044', 'Hafid', '1', 'L', '1992-04-29', '20202', 'Green Lake City', 'A'),
('190M045', 'Navida', '1', 'P', '1990-01-01', '20202', 'Tasikmadu Indah Garden', 'B'),
('190M046', 'Ridho', '3', 'L', '1991-09-20', '20201', 'The Lost City', 'C'),
('190M047', 'Alifta', '4', 'P', '1991-02-10', '20205', 'Andhika Green Palace', 'E'),
('190M048', 'Udi', '3', 'L', '1991-01-01', '20203', 'Palace Mawar Melati', 'B'),
('190M049', 'Syifa', '4', 'P', '1991-01-16', '20204', 'Solo Palace City', 'D');

CREATE TABLE IF NOT EXISTS prodi
(
  kd_prodi varchar(1) NOT NULL,
  nm_prodi varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO prodi (kd_prodi, nm_prodi) VALUES
('1', 'D4 MIK'),
('2', 'D4 K3'),
('3', 'S1 KEPERAWATAN'),
('4', 'D3 RMIK');

ALTER TABLE dosen
 ADD PRIMARY KEY (nik), ADD KEY kota (kota);

ALTER TABLE kota
 ADD PRIMARY KEY (kd_kota);

ALTER TABLE mahasiswa
 ADD PRIMARY KEY (nim), ADD KEY dosen_wali (dosen_wali), ADD KEY prodi (prodi), ADD KEY kota (kota);

ALTER TABLE prodi
 ADD PRIMARY KEY (kd_prodi);

ALTER TABLE dosen
ADD CONSTRAINT dosen_ibfk_1 FOREIGN KEY (kota) REFERENCES kota (kd_kota) ON UPDATE CASCADE;

ALTER TABLE mahasiswa
ADD CONSTRAINT mahasiswa_ibfk_1 FOREIGN KEY (dosen_wali) REFERENCES dosen (nik) ON UPDATE CASCADE,
ADD CONSTRAINT mahasiswa_ibfk_2 FOREIGN KEY (prodi) REFERENCES prodi (kd_prodi) ON UPDATE CASCADE,
ADD CONSTRAINT mahasiswa_ibfk_3 FOREIGN KEY (kota) REFERENCES kota (kd_kota) ON UPDATE CASCADE;