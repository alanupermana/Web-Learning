// SOAL NO 1 , import mysql
var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "1301160774_Modul10"
});
// SOAL NO 2
// UBAHLAH CONFIG DATABASE DIATAS DENGAN NAMA DATABASE KALIAN


con.connect(function (err){
    if(err) throw err;
// contoh import
// var db = require('mysql');

});

module.exports = con;