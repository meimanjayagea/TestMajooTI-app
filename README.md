# langkah langkah menjalankan App Majoo
1. clone repository github ->>>> git clone "url"
2. copy file .env.example
3. generate key ->>>>  php artisan key:generate
4. buat database di phpmyadmin dengan namadata base "majootest"
5. ketik ->>> php artisan migrate:fresh --seed
6. ketik di CLI  ->>>> php artisan storage:link
7. download storage lalu extract storage : https://drive.google.com/file/d/1mtXBmQ-mnA8j5yzMQ3pVuZK6hjrwVvmL/view?usp=sharing
8. pindahkan file assets dan images ke dalam "public/storage/  "
9. lalu bisa di jalankan dengan ->>>> php artisan serve

# Teknologi yang dipakai
1. Framework Laravel 8
2. Bootstrap 4
3. Template admin LTE
4. PHP
5. JavaScript

#  Login Tugas:
1.Admin
email : admin@gmail.com
password : admin123

2. Useremail : user@gmail.com
password : user123

#   Registrasi -> default = 'USER'
