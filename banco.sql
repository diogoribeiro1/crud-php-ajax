create database `eventos_db`;
use `eventos_db`;
create table `eventos_tbl` (
                           `id` int not null auto_increment primary key,
                           `nome` varchar(40) not null,
                           `data` date not null,
                           `local` varchar(40) not null
);
