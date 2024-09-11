<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Phonebook</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <!-- Include the Sidebar Partial -->
        @include('layouts.sidebar')
        
        <!-- Include the Contact List Partial -->
        @include('layouts.contactList')
    </div>
</body>
</html>
