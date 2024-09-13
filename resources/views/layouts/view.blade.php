<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Contact view</title>
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
            padding-right: 50;
        }
       
        .delete-button{
            background: none;
            border: none;
            cursor: pointer;
            padding: 2px;
        }
        .delete-button img{
            width: 24px;
            height: 24px;
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
        .container-info{
            width: 450px;
            height: 230px;
            top: 350px;
            left: 32px;
            border-radius: 10px;
            padding: 15px, 10px, 15px, 10px;
            gap: 17px;
            background-color:  #DEDEFF;
            color: #000000;
            margin: 35px;
        }
        .container-info h2{
            padding: 20px;
        }

        .detail{
            margin-left: 30px;
            align-content: center;
        }
        .phone{
            margin-bottom: 10px;
        }
        .phone img{
            width: 24px;
            height: 24px;
            gap: 13px;
            margin-right: 5px;
        }
        .phone p{
            padding-top: 8px;
        }



    </style>
</head>
<div class="container">
    <!-- Include the Sidebar Partial -->
    @include('layouts.sidebar')
    <div class="main-content">
        <div class="create-contact">
            <div class="contact">
              <h1>Contact Details</h1>  
            </div>
            
            <div class="header-wrapper">
                <div class="header">                
                    <a href="{{ url('/') }}" class="back-button">
                        <img src="{{ asset('icons/maki_arrow.png') }}" alt="">
                    </a>
                    <div class="view-button">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="save-button">
                        <img src="{{ asset('icons/Frame 71.png') }}" alt="">                       
                        </a>   
                        <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">
                                <img src="{{ asset('icons/uiw_delete.png') }}" alt="Delete Contact">
                            </button>
                        </form> 
                    </div>                                                         
                </div>
                <div class="avatar-placeholder">
                    <img src="{{ asset('images/' . $contact->image) }}" alt="">
                </div>
                <h1 style="color: #000000"> {{ $contact->name }}</h1>
            </div>

            <div class="container-info">
                <h2>Contact details</h2>
                <div class="detail">
                    <div class="phone">
                        <img src="{{ asset('icons/ic_baseline-phone.png') }}" alt="" >
                        {{ $contact->number }}
                    </div>
                    <div class="phone">
                        <img src="{{ asset('icons/ic_outline-email.png')}}" alt="" >
                        {{ $contact->email }}
                    </div>  
                </div>
               
            </div>
            
            
            
            
        </div>
    </div>    
</div>    
</body>
</html>