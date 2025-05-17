CREATE DATABASE biodata_db;

USE biodata_db;

CREATE TABLE biodata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    alamat TEXT,
    gender ENUM('Laki-laki', 'Perempuan')
);
