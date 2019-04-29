<!DOCTYPE html>
<html>
 <head>
 <title>Animal {{ $animal->id }}</title>
 </head>
 <body>
 <h1>Animal no </h1>
 <ul>
 <li>Name: {{ $animal->name }}</li>
 <li>Date: {{ $animal->date_of_birth }}</li>
 <li>Description: {{ $animal->description }}</li>
 </ul>
 </body>
</html>
