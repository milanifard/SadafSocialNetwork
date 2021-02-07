<div dir="rtl">

# BOOKREADS

بوکریدز برنامه ای مشابه به سایت معروف و پرطرفدار GOODREADS است. این برنامه بر روی فریم ورک سدف و به زبان php نوشته شده است.
در این برنامه کاربران امکان وارد کردن نظر،امتیاز دهی به کتاب، وارد کردن پروسه ی خواندن یک کتاب و اپلود یک کتاب را دارند.
این برنامه بر پایه ی یک شبکه اجتماعی نوشته شده است که کاربران با یکدیگر تعامل دارند.
![](https://github.com/web-programming-course/SadafSocialNetwork/blob/BookReads/image/intro.png)


# مراحل نصب سدف

برای نصب صدف، ابتدا باید وب سرور آپاچی یا enginx 
را نصب کنیم.
توضیحات این بخش برای سرور 
enginx 
امده است..
در ادامه باید 
php fpm 
را نصب کنیم
حال باید اس-:


# صفحات 
این برنامه شامل ۵ صفحه اصلی می باشد.
* form.php : 

 این صفحه به منظور اضافه کردن یک کتاب توسط کاربر پیاده سازی شده است. در این صفحه اطلاعات کتاب و فایل کتاب از کاربر گرفته می شود ، برای اطلاعات یک رکورد در دیتابیس ایجاد می شود و فایل کتاب و عکس روی جلد آن در دو پوشه ی جدا در  UploadFile  ذخیره می شود. مکان فایل کتاب و تصویر روی جلد نیز در دیتابیس ذخیره می شود.
 
* searchBook.php : 

این صفحه برای جستجو میان کتاب ها استفاده می شود.
امکان جستجو بر اساس نام و نویسنده ی کتاب وجود دارد. پس از جستجو  تصویر روی جلد کتاب به همراه اسم کتاب خواهد امد. اسم کتاب لینکی است به صفحه پروفایل کتاب که در انجا اطلاعات کتاب را خواهیم داشت .

* mylibrary.php : 

این صفحه اطلاعات مربوط به قفسه کتاب های هر شخص را نشان می دهد. هر شخص سه قفسه ی کتاب های خوانده شده و در حال خواندن و برای خواندن دارد.
هر کاربر می تواند یک کتاب را به یکی از این سه قفسه اضافه کند.

*firstpage.php : 

این صفحه ورودی سایت است.لینک به صفحات دیگر در این صفحه وجود دارد. علاوه بر آن در این صفحه به کاربر پیشنهاد کتاب خواهیم داد.

* BookProfile.php : 

در این بخش اطلاعات مربوط به کتاب را نشان می دهیم. این صفحه شامل اطلاعاتی مانند خلاصه کتاب، اسم کتاب، نویسنده و ناشر و ... می باشد.
کاربر در این صفحه امکان گذاشتن نظر برای کتاب را دارد. همچنین می تواند با توجه به نظر خود به کتاب امتیاز دهد
کاربر امکان پاسخ دادن به نظر کاربر دیگر را دارد. همچنین می تواند یک نظر را لایک کند.



# اضافه کردن صفحه به صدف

</div>