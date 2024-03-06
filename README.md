Cara menggunakannya:
<ol>
    <li>buka cmd</li>
<li>buat folder di xampp/htdocs dengan nama be_movie dengan mengetikkan mkdir be_movie</li>
<li>cd be_movie</li>
<li>git clone https://github.com/bidingurusmk/be_movie.git</li>
<li>buka cmd pada projek be_movie kemudian ketikkan composer update</li>
<li>buat database dengan nama be_movie</li>
<li>di cmd ketikkan php artisan migrate</li>
<li>dan ketikkan lagi php artisan db:seed --class=DatabaseSeeder</li>
<li>dan ketikkan lagi php artisan db:seed --class=DatabaseSeeder_movie</li>
<li>jalankan xampp app atau jalankan script `php artisan serve` di cmd</li>
<li>buka browser kemudian ketikkan localhost/be_movie/public <br>atau <br>localhost:8000</li>
</ol>
