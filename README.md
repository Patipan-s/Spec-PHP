# Spec-PHP
Mini Project with PHP

# install
Mini Project with PHP

1.นำโฟลเดอร์ ไปวางที่ C:\xampp\htdocs

2.นำเข้าฐานข้อมูลโดย
 - เปิด xampp กด start apache และ mysql
 - เข้าไปที่เว็บ http://localhost/phpmyadmin/
 - กดไปที่  Import เข้าไปในโฟลเดอร์ sql และเลือกไฟล์ในไฟล์ specdb.sql 
 - เมื่อเสร็จให้กด Go ตรงด้านล่าง 

3.เข้าใช้งานเว็บไซต์ http://localhost/project

***หากต้องการอัพโหลดรูปที่มีขนาดมากกว่า 2mb ให้ทำตามขั้นตอนด้านล่าง***
1. เข้า xampp กด config ตรง apache
2. เลือก php.ini
3.แก้ไขข้อความตามนี้ upload_max_filesize = 10M และ post_max_size = 10M
