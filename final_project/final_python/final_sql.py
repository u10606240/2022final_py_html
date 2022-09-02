import mysql.connector
import pymysql

myconn = mysql.connector.connect(host="Localhost",user="root",password="")
mycursor = myconn.cursor()

result = """
CREATE DATABASE final CHARACTER SET big5;
use final;
CREATE TABLE city(
id INT AUTO_INCREMENT PRIMARY KEY,
city_name CHAR(15));

CREATE TABLE population(
id INT AUTO_INCREMENT PRIMARY KEY,
year INT,
month INT,
city_id INT,
FOREIGN KEY(city_id)REFERENCES city(id)ON DELETE CASCADE);

CREATE TABLE p_numbers(
id INT AUTO_INCREMENT PRIMARY KEY,
age0_10 INT,
age11_20 INT,
age21_30 INT,
age31_40 INT,
age41_50 INT,
age51_60 INT,
age61_70 INT,
age71_80 INT,
age81_90 INT,
age91_100 INT,
gender INT,
year INT,
month INT,
city_id INT,
FOREIGN KEY(city_id)REFERENCES city(id)ON DELETE CASCADE);
"""
for result in mycursor.execute(result,multi=True):pass
mycursor.close()
myconn.close()

myconn = mysql.connector.connect(host="Localhost",user="root",password="winnie31",database="final")
mycursor = myconn.cursor()
sql1 = "INSERT INTO city (id,city_name) VALUES (%s,%s)"
val = [
    (1, '板橋區'),
    (2, '三重區'),
    (3, '中和區'),
    (4, '永和區'),
    (5, '新莊區'),
    (6, '新店區'),
    (7, '土城區'),
    (8, '蘆洲區'),
    (9, '樹林區'),
    (10, '鶯歌區'),
    (11, '三峽區'),
    (12, '淡水區'),
    (13, '瑞芳區'),
    (14, '汐止區'),
    (15, '五股區'),
    (16, '泰山區'),
    (17, '林口區'),
    (18, '八里區'),
    (19, '深坑區'),
    (20, '石碇區'),
    (21, '坪林區'),
    (22, '三芝區'),
    (23, '石門區'),
    (24, '金山區'),
    (25, '萬里區'),
    (26, '平溪區'),
    (27, '雙溪區'),
    (28, '貢寮區'),
    (29, '烏來區')
]

try:
    mycursor.executemany(sql1,val)
    myconn.commit()
except:
    myconn.rollback()

print(mycursor.rowcount,"record inserted.")


connect_db = pymysql.connect(host='localhost', port=3306, user='root', passwd='', db='final')
with connect_db.cursor() as cursor:
    sql = """
    select year,month,city_id from p_numbers
    """

    # 執行 SQL 指令
    cursor.execute(sql)
    data = cursor.fetchall()
    print(data)
    # 提交至 SQL
    connect_db.commit()

# 關閉 SQL 連線
connect_db.close()