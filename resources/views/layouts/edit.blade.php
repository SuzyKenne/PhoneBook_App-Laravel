<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Create Contact</title>
    <style>
        
        .main-content {
            flex-grow: 1;
            width: 1165px;
            height: 986;
            margin: 20px 15px 15px 0;
            background-color: #ffffff;
            padding: 25px 0px;
            border-radius: 40px;
        }
        .create-contact {
            border-radius: 10px;
            padding: 10px;
            
            
        }
        .contact{
            margin-bottom: 20px;
            padding: 10px;
            color: #000000;
           border-bottom: 1px solid #e0e0e0; 
        }
        .header-wrapper{
            border-bottom: 1px solid #e0e0e0; 
            margin-left: 32px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;         
            padding-top: 12px;
            
        }
        .back-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .back-button img {
            width: 24px;
            height: 24px;
        }
        .save-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .save-button img {
            height: 36px; /* Adjust as needed to match your image */
        }
        .avatar-placeholder {
            /* margin-top: 60px;
            margin-left: 92px; */
            padding-bottom: 30px;
            padding-left: 30px;
            /* width: 134px;
            display: flex; */
            justify-content: left;
            align-items: left; 
            position: relative;
        }
        form{
            width: 1165px;
            height: 821px;
            top: 124px;
            left: 32px;
            gap: 10px;
            margin: 15px;
            border: 1px 0px 0px 0px;
            color: #000000
        }
        form ,h3{
            margin: 15px;
            display: inline-block;
        }
        .form-group {
            display: inline-block;
            flex-grow: 1;
        }
        .form-group img{
            /* left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            display: inline-block;
            margin-bottom: 30px; */
        }

        .form-group label {
            display: inline-block;
            margin-bottom: 5px;
            color: #666;
        }
        .form-group input, .form-group select{
            display: inline-block;
            width: 585px;
            height: 60px;
            gap: 10px;
            padding: 20px, 10px, 20px, 14px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #000000;
            background-color: #cccccc;
            margin: 15px 5px;
        }
        .form-group-name{
            flex-grow: 1;
            display: inline-block;
        }
        .phone-input {
           display: inline-block;
        }
        .phone-input select {
            width: 80px;
            margin-right: 10px;
        }
        .phone-input input {
            flex-grow: 1; 
            width: 480px;
        }



    </style>
</head>
<div class="container">
    <!-- Include the Sidebar Partial -->
    @include('layouts.sidebar')
    <div class="main-content">
        <div class="create-contact">
            <div class="contact">
              <h1>Edit Contact</h1>  
            </div>
            
            
            
            <form class="styled-form"  method="POST" action="{{ route('contacts.update', $contact->id) }}"  enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="header-wrapper">
                    <div class="header">                
                        <a href="{{ url('/') }}" class="back-button">
                            <img src="{{ asset('icons/maki_arrow.png') }}" alt="">
                        </a>
                        <button type="submit" class="save-button">
                          <img src="{{ asset('icons/Frame 72.png') }}" alt="">  
                        </button>                                            
                    </div>
                    <div class="avatar-placeholder">
                        <!-- Image that the user can click to upload a new one -->
                        <img id="avatarPreview" src="{{ asset('images/' . $contact->image ) }}" alt="Default Avatar" class="contact-avatar" onclick="document.getElementById('image').click();">
                        
                        <!-- Hidden file input to allow image upload -->
                        <input type="file" id="image" name="image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                    </div>
                    
                </div>
                <h3>Details</h3>
            
                <!-- First Name and Last Name -->
                <div class="form-group">
                    <img src="{{ asset('icons/iconamoon_profile-light.png') }}" alt="Profile Icon" class="input-icon">
                    <input type="text" name="firstName" value="{{ explode(' ', $contact->name)[0] }}" required>
                    <input type="text" name="lastName" value="{{ explode(' ', $contact->name)[1] }}" required>
                </div>
            
                <!-- Phone Input -->
                <div class="form-group">
                    <img src="{{ asset('icons/ic_baseline-phone.png') }}" alt="Phone Icon" class="input-icon">
                    <div class="phone-input">
                        <select id="countryCode" name="countryCode">
                            <option value="+237" selected>🇨🇲</option>
                            <option value="+1">🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+91">🇮🇳 +91</option>
                        </select>
                        <input type="tel" name="number" value="{{ $contact->number }}" required pattern="[0-9\s\-\+\(\)]{10,}">
                    </div>
                </div>
            
                <!-- Email -->
                <div class="form-group">
                    <img src="{{ asset('icons/ic_outline-email.png') }}" alt="Email Icon" class="input-icon">
                    <input type="email" id="email" placeholder="Email" name="email" value="{{ $contact->email }}"  required>
                </div>
            </form>
        </div>
    </div>    
</div>    
</body>

<script>
    // Function to display the selected image as a preview
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const avatarPreview = document.getElementById('avatarPreview');
            avatarPreview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</html>