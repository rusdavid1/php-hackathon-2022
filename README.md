# PHP Hackathon

This document has the purpose of summarizing the main functionalities your application managed to achieve from a technical perspective. Feel free to extend this template to meet your needs and also choose any approach you want for documenting your solution.

## Problem statement

Congratulations, you have been chosen to handle the new client that has just signed up with us. You are part of the software engineering team that has to build a solution for the new client’s business.
Now let’s see what this business is about: the client’s idea is to build a health center platform (the building is already there) that allows the booking of sport programmes (pilates, kangoo jumps), from here referred to simply as programmes. The main difference from her competitors is that she wants to make them accessible through other applications that already have a user base, such as maybe Facebook, Strava, Suunto or any custom application that wants to encourage their users to practice sport. This means they need to be able to integrate our client’s product into their own.
The team has decided that the best solution would be a REST API that could be integrated by those other platforms and that the application does not need a dedicated frontend (no html, css, yeeey!). After an initial discussion with the client, you know that the main responsibility of the API is to allow users to register to an existing programme and allow admins to create and delete programmes.
When creating programmes, admins need to provide a time interval (starting date and time and ending date and time), a maximum number of allowed participants (users that have registered to the programme) and a room in which the programme will take place.
Programmes need to be assigned a room within the health center. Each room can facilitate one or more programme types. The list of rooms and programme types can be fixed, with no possibility to add rooms or new types in the system. The api does not need to support CRUD operations on them.
All the programmes in the health center need to fully fit inside the daily schedule. This means that the same room cannot be used at the same time for separate programmes (a.k.a two programmes cannot use the same room at the same time). Also the same user cannot register to more than one programme in the same time interval (if kangoo jumps takes place from 10 to 12, she cannot participate in pilates from 11 to 13) even if the programmes are in different rooms. You also need to make sure that a user does not register to programmes that exceed the number of allowed maximum users.
Authentication is not an issue. It’s not required for users, as they can be registered into the system only with the (valid!) CNP. A list of admins can be hardcoded in the system and each can have a random string token that they would need to send as a request header in order for the application to know that specific request was made by an admin and the api was not abused by a bad actor. (for the purpose of this exercise, we won’t focus on security, but be aware this is a bad solution, do not try in production!)
You have estimated it takes 4 weeks to build this solution. You have 3 days. Good luck!\_

## Technical documentation

### Implementation

During the production I tried to follow the MVC architecture. I created one class which helped me connect to the MySql DB, and one class each for participants and programmes containing the CRUD functionality. The api folder contains the endpoints. Each of the files in the folder includes the headers and its method, getting the data from the db and encoding it in JSON. It was supposed to be hosted on heroku and deployed on RapidApi, but I didn't manage to do it.

By calling http://localhost/evozon/api/participant/read.php you get a list of all the participants (id, name and the programme's id and title in which they participate);
By calling http://localhost/evozon/api/participant/create.php you can register a new participant (name and the programme's id in which they want to participate);
By calling http://localhost/evozon/api/participant/update.php you can update a participant (id, name and the programme's id and title in which they participate);
By calling http://localhost/evozon/api/participant/delete.php you can delete a participant (using the id);

By calling http://localhost/evozon/api/programme/read.php you get a list of all the programmes (id, title, room id, start and end dates and the maximum number of participants);
By calling http://localhost/evozon/api/programme/create.php you can create a new programme (title, room id, start and end dates and the maximum number of participants);
By calling http://localhost/evozon/api/programme/update.php you can update a programme (id, title, room id, start and end dates and the maximum number of participants);
By calling http://localhost/evozon/api/programme/delete.php you can delete a programme (using the id);

##### Functionalities

For each of the following functionalities, please tick the box if you implemented it and describe its input and output in your application:

[ x ] Conexiune la baza de date \
[ x ] Citirea unui programme \
[ x ] Crearea unui programme \
[ x ] Stergerea unui programme \
[ x ] Actualizarea unui programme \
[ x ] Citirea listei cu clienti
[ x ] Programarea unui client
[ x ] Stergerea unui client
[ x ] Actualizarea unui client

##### Environment

| Operating system (OS) | Windows 10 20H2 |
| Database | MySQL 8.0|
| Web server| Apache |
| PHP | 8.1.1 |
| IDE | Visual Studio Code |

### Testing

    Using Postman v9.11

## Feedback

In this section, please let us know what is your opinion about this experience and how we can improve it:

1. Have you ever been involved in a similar experience? If so, how was this one different?
   This was my first time being involved in a (anti)hackathon.

2. Do you think this type of selection process is suitable for you?
   Yes, I think it's really a fair opportunity in which you can show your skills and why you should be hired.

3. What's your opinion about the complexity of the requirements?
   The requirement was pretty difficult, although it wasn't exaggerated.

4. What did you enjoy the most?
   Friday before the skype call I was really nervous about it and didn't really know what to expect. But as soon as i joined I was relieved, because I saw that the people from evozon were really supportive and chill. So, I guess I really enjoyed the interaction between the team from evozon and us, the participants at the hackathon. And also I'm really proud that I managed to (kinda) build an API.

5. What was the most challenging part of this anti hackathon?
   I worked with APIs before, but only by consuming them, I've never built one. So, during my research it was kind of hard for me to understand what are the principles behind REST and how to build an API.

6. Do you think the time limit was suitable for the requirements?
   After learning a bit how to build an API, I think it's a reasonable deadline

7. Did you find the resources you were sent on your email useful?
   Yes, the hints really helped me prepare and start researching about REST, datetime and validation.

8. Is there anything you would like to improve to your current implementation?
   Yes, I didn't manage to implement validation. And also, I should've worked using namespaces, be more careful to write DRY code, have a better structured database and thought about a good hosting and deployment solution. (only now do I realise I omitted creating a database for rooms 😢 )

9. What would you change regarding this anti hackathon?
   I think the anti hackathon was really well organised, and even if I don't get chosen as an intern, I feel it's a good experience for me and fueled my passion for development.
