# DontAllergyMe
Our project for the FiiCode competition (web)

A website for managing, preventing and treating allergies, informing you and helping you to be healthy. And even more than that.

(For install and usage see [Installation and usage](https://github.com/mdiannna/DontAllergy/blob/develop/README.md#installationandusage))


# Screenshots (some of them)

![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode1.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode2.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode3.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode4.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode5.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode6.png)


## Newer version:
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/master/about/screenshots/fiicodenew3.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/master/about/screenshots/fiicodenew4.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/master/about/screenshots/fiicodenew2.png)

## Old version:
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode5_1.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode7.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode8.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode9.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode10.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode11.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode12.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode14.png)
![](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/screenshots/fiicode13.png)


# Database design

![EER diagram](https://raw.githubusercontent.com/mdiannna/DontAllergy/develop/about/database/database.png)

# Installation and usage
- git clone https://github.com/mdiannna/DontAllergy.git


- Write in terminal :
```
$ composer install
```


- create .env file (you can copy the .env.example file)


- configure database


- Write in terminal :
```
$ php artisan backpack:base:install
```


- Write in terminal :
```
$ php artisan backpack:crud:install
```


- Write in terminal :
``` 
$ php artisan migrate
```


- Write in terminal :
```
$ php artisan db:seed
```


- If you use Vagrant or Valet, configure it and run the project. IF not, then write in terminal :
```
$ php artisan serve
```


- You are done :)  Use Don't Allergy Me!


# Authors
- Diana Marusic
- Naomi-Alexandra Halip
- Irina Gutanu
- Robert-Gabriel Stanciu

