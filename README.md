# DontAllergyMe
This is our project for the [Fiicode](https://fiicode.asii.ro/) competition (web).
See our detailed story [here](#our-story).

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





# Our story

We are students in Bucharest (at the moment of writing), at University of Bucharest([Diana](https://github.com/mdiannna), [Naomi](https://github.com/naomihalip) and [Irina](https://github.com/irinagutanu)) and University Politechnica of Bucharest( [Robert-Gabriel](https://github.com/Dem0seQuence)). One day, Diana, who participated last year at the [Fiicode competition](https://github.com/mdiannna/DontAllergy/blob/develop/README.md#installationandusage), told us about the idea of participating this year at the same competition, in the web category. And we accepted the challenge.


In the first phase of the competition, we had to build a website about allergies, that makes it possible to create/update/delete allergies, have informations about allergens, make user groups, a small forum, some notifications, maybe a chatbot(which we didn't implement in this phase) and some statistics (which we had a lot because we knew some javascript chart libraries). We used Laravel and [Laravel Backpack](https://laravel-backpack.readme.io), HTML, Bootstrap, CSS and Javascript and we built some nice things :) .


And yes, don't forget about our [demo video](https://drive.google.com/open?id=1I6iImwuLXrZ4NC_W1MWbF63KSrEXRXXn) which we submitted pretty close to the deadline :) .


Next, huh, waiting for the final results?... Did we get in the finals?...
Not yet. We received an email with a demo request from the judges. It means we had to deploy the website. Easy, right? 
Well, not exactly. It took us more than 6 hours to deploy the project on heroku, but after all, we did it! And one more skill aquired :).


Good news! We are in the final!!!


6 hours by train, going to the beautiful city of Iasi. With a nice welcome and nice people, organizing and volunteering for the competition, hours of work and dedication for us, Fiicode final was waiting for us.


The final phase was more like a hackathon, we had to add a chatbot to the existing project. We liked the idea. And we even found a framework that we thought would be easy to integrate with Laravel in the project - Botman - but it was not. After 5 hours out of five trying to install Botman, we failed :(. One hour left. What to do?... Let's write our own Laravel chatbot. And we did it. Yep, the commands were pretty simple, the frontend was also simple and very yellow-coloured, but in the end, we managed to present a working version of the app. And it even had no bugs!


The presentation was kind of interesting and fun. We knew we couldn't compete with the others with a work completed in 1 hour, while they had 6 hours of work, but we still had a working version and a ton of experience aquired. And most important, we knew why the server responded so slow and what we did wrong and how to do better at the next competition.



Overall it was nice and fun. A huge experience for us. It's not always enjoyable to get the 5th place out of 5 in the final, but still, it was the final. And we had something working, plus we learned a ton of new things, some of them being to adapt better and change the idea in the first two hours, be more organized and also get a sufficient number of developers in the final (one backend developer couldn't make it to the final, so we were 1 backend and 2 frontend developers). 



We hope you enjoyed our story and would like to test our allergies prevention app, even with a simple chatbot (no Artificial Intelligence, no smart commands, no funny jokes). And if you are a student in school or university in Romania, we encourage you to partcipate at the [Fiicode competiton](https://fiicode.asii.ro/)  next year.


# Authors
- [Robert-Gabriel Stanciu](https://github.com/Dem0seQuence)
- [Naomi-Alexandra Halip](https://github.com/naomihalip)
- [Irina Gutanu](https://github.com/irinagutanu)
- [Diana Marusic](https://github.com/mdiannna)


