<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Phonebook</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar_container">
            <sidebar>
                <h2>
                    <img src="{{ asset('icons/solar_user-bold.png') }}" alt="Phonebook icon">
                    My Phonebook
                </h2>
                <img src="{{ asset('icons/Frame 27.png') }}" alt="Add icon">
                <a href="#" class="nav-item active">
                    <img src="{{ asset('icons/solar_user-bold.png') }}" alt="Contacts icon">
                    Contacts
                </a>
            </sidebar>
        </div>
        <!-- Main content area would go here -->
    </div>
</body>
</html>