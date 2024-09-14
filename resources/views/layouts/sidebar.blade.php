<div class="sidebar_container">
    <sidebar>
        <h2>
            <img src="{{ asset('icons/solar_user-bold.png') }}" alt="Phonebook icon">
            My Phonebook
        </h2>
        <a href="{{ route('layouts.createContact') }}">
           <img src="{{ asset('icons/Frame 27.png') }}" alt="Add icon"> 
        </a>
        
        <a href="{{ url('/') }}" class="nav-item active">
            <img src="{{ asset('icons/solar_user-bold.png') }}" alt="Contacts icon">
            Contacts
        </a>
    </sidebar>
</div>