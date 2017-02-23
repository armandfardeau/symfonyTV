**SymphonyTV** is a **TV child program**, with a japanese design.  

---

####Table of contents

* [Quick start](#id-section1)
* [Contributing](#id-section2)
* [Author](#id-section3)

---
<div id='id-section1'/>

####Quick start

Clone the repo: 
```git clone git@github.com:whatever folder-name```

Composer: 
 ```composer install```

Open file:
 ```open app/config/parameters```

Verify connexion:
 ```check database connexion```

Clear cache:
```php app/console cache:clear```

Create database: 
```php app/console doctrine:database:create```

Update: 
```php app/console doctrine:schema:update --force```

Create a user: 
```php app/console fos:user:create testuser test@example.com p@ssword```

Promote this user SUPER admin:
```php app/console fos:user:promote testuser --super```

Enjoy !
---

<div id='id-section2'/>

####Contributing

The main purpose of this repository is to continue to evolve SymfonyTV, making it faster and easier to use. 

---

<div id='id-section3'/>


####Authors 
* ANTHONY Kelly 

LinkedIn : https://goo.gl/UdeXId

GitHub : https://goo.gl/6uK0Bv

* ARFEUILLERE Juliette

LinkedIn : https://goo.gl/3XDdVR

GitHub : https://goo.gl/tFQPWv

* FARDEAU Armand

LinkedIn : https://goo.gl/AzoTvn

GitHub : https://goo.gl/Z0jD92

* GILLET Yann-Edern

LinkedIn : https://goo.gl/CLuUbz

GitHub : https://goo.gl/4GKfqc

* PEROLS Marion

LinkedIn : https://goo.gl/oi8Wv2

GitHub : https://goo.gl/NLBOqw





