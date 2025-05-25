CREATE DATABASE mahasiswa_db;
USE mahasiswa_db;

CREATE TABLE mahasiswa (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    nim VARCHAR(20),
    jurusan VARCHAR(50)
);
