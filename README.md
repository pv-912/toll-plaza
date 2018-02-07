# toll-plaza

### PROBLEM:

##### Explanation why we built up the web app:

Rising traffic on tolls is an inescapable condition in large and growing metropolitan areas across the world, from Los Angeles to Tokyo, from Cairo to Sao Paolo. Peak-hour traffic on tolls is an inherent result of the way modern societies operate. It stems from the widespread desires of people to pursue certain goals that inevitably overload existing roads and transit systems every day. But everyone hates traffic on tolls, and it keeps getting worse, in spite of attempted remedies.

******************************************************************************************************

We built the app through which one can simply register the toll as user through which he/she is going to pass through by simply paying the amount[ie TOLL-TAX] by our webApp.a simple user admim is developed on which he/she can see all the toll near by accorDging to his/her present geoLocation.(range-100kms).

User can see his/her activity on user logs i.e on which toll he/she paid.

Similarly a toll admin is also developed on which toll is registerd according to its current geo location and can see all the vehicals that has pass throungh in toll logs and all the registerd vehicals that are going to pass after some time.tolls just have to give a qr code and user App will scan it and toll give the toll access to user.and when the vehical will pass automatically acces to that vehical is reset and put to null.

While passing through the toll user has to scan the QR CODE to get the acces to pass throught the toll.

You can select the toll and pay it and if you want to pay for return journey you can pay it also for subsidized payment.

******************************************************************************************************

##### HOW TO INSTALL APP : 

1)use the github link.

2)download aur repo.

3)use any php server to locally host it i.e for windows install XAMPP SERVER.(put the folder in xamm/htdocs)
  and for linux use APACHE SERVER.
  
4) For Toll Plaza Admin ie   eg :http://localhost/toll-plaza/toll/

5)For User got through.   eg: (http://localhost/toll-plaza/components/signupUser.php)  

6)You have to sigh up on toll yourself for test:   eg: (http://localhost/toll-plaza/components/signupToll.php)  
  but please be careful by signing up the the toll and carefully fill the latitude and longitude (according to the  present geolocation of toll) and you will fill you dummy toll according to your the  present geolocation as a toll.
  
7)now you will se the toll on user dashboard    eg:(http://localhost/toll-plaza/geolocation/index.php)

******************************************************************************************************


