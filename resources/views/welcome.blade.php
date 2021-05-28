<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fueler</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Primary Meta Tags -->
        <meta name="title" content="Fueler">
        <meta name="description" content="Fueler is a portfolio-based platform for dreamers and doers, a community-led platform that helps you discover interesting people through their works. ">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://fueler.io/">
        <meta property="og:title" content="Fueler">
        <meta property="og:description" content="Fueler is a portfolio-based platform for dreamers and doers, a community-led platform that helps you discover interesting people through their works. ">
        <meta property="og:image" content="{{asset('images/meta-fueler.png')}}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://fueler.io/">
        <meta property="twitter:title" content="Fueler">
        <meta property="twitter:description" content="Fueler is a portfolio-based platform for dreamers and doers, a community-led platform that helps you discover interesting people through their works. ">
        <meta property="twitter:image" content="{{asset('images/meta-fueler.png')}}">

        <!-- Fonts -->
        <link href="http://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">
                
         <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
         <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Metropolis', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .loading-image{
                display: none
            }
            h1{
                font-weight: 800 ;
                color: #0d0543
            }

            .btn{
                font-family: "Metropolis", sans-serif;
                font-weight: 600;
                border: none;
                background: linear-gradient(180deg, #00fbff 0%, #10dce8 99.99%, #09c9e3 100%);
                color: #0d0543;
                border-radius: 10px;
                transition: all 0.2s;
                font-size: 16px
            }
            .input-group{
                padding: 2px;
                background-color: #fff;
                border-radius: 9px;
                overflow: hidden;
                /* box-shadow: 0px 0.5px 17px 0 rgb(0 154 175 / 22%); */
                transition: 0.3s
                
            }
            .input-group:hover{
                box-shadow: 0px 5px 17px 0 rgb(0 154 175 / 22%) !important;
            }
            input{
                    height: 100% !important;
                    font-size: 16px !important;
                    border-radius: 10px !important;
                    margin-right: 3px !important;
                    padding: 12px 20px !important;
                    font-family: "Metropolis", sans-serif;
                    font-weight: 600 !important;
                    border: none !important

            }

            input:focus{
                color: rgba(13, 5, 67, 1) !important;
                background-color: #fff !important;
                border-color: none !important;
                outline: 0 !important;
                box-shadow: none !important;
            }
            .successmsg{
                margin-top: 20px;
                text-align: center;
                padding: 5px;
                font-weight: 500;
                font-size: 16px;
                color: #0d0543 !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid m-auto">
            <div class="row justify-content-center">
                <div class="col-md-4">

                    <div class="text-center">
                        <img class="mw-100" src="{{asset('images/fueler.gif')}}" alt="">
                        
                    </div>
                 
                </div>
                
            </div>
             <div class="mt-5 mb-4 text-center">
                <h1>Something cool is coming soon ⚡</h1>
            </div>
           
            <div class="row justify-content-center pt-4">
                 <div class="col-md-4">
                    <form id="notifyMe" action="#" enctype="multipart/form-data">

                            @csrf	
                        <div class="input-group d-flex shadow-sm">
                            <input class="form-control form-control-lg" type="email" required="" name="email" placeholder="Email address">
                            <div class="loading-image" id="loading-image">
                                <img style="width: 40px;" src="{{asset('images/form-loader.gif')}}" alt="">
                            </div>
                            <div class="input-group-append">
                            
                                <button class="btn" id="notify" type="submit">Notify Me</button>
                            </div>
                        
                        </div>
                        
                    </form>

                    

                    <div id="successmsg" class="successmsg"></div>
                        <div class="text-center mt-2">
                            <a href="https://twitter.com/FuelerHQ" target="_blank" rel="follow">
                                <img src="{{asset('images/twitter.png')}}" width="50px" alt="">
                            </a>
                        </div>
                </div>
            </div>
        </div>
        


        <script type="text/javascript">


        var button = document.getElementById("notify");
        var loader = document.getElementById("loading-image");
        function disableSubmitButton(){
           
            // x.style.display = "none"
            button.disabled = true;
        }

        // function to show loading image
        function showLoadingImage(){
            loader.style.display = "block"
        } 


        // function to show submit button
        function enableSubmitButton(){
           button.disabled = false;
        }

        // function to hide loading button
        function hideloadingImage(){
            
            loader.style.display = "none"
        }


    // Education Addition
    $(document).ready(function(){
        $('#notifyMe').on('submit', function(event){

            
            event.preventDefault();

            disableSubmitButton()
            showLoadingImage()
            // document.getElementById("Button").disabled = true;
            $.ajax({
                url:"/notify",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    // Show success messge on success
                    enableSubmitButton()
                    hideloadingImage()
                    $('#successmsg').html('Thanks for taking interest in Fueler. We will get back to you with a good news very soon. ');
                    document.getElementById("notifyMe").reset(); 
                    // $('#addTImelineEducation').modal('hide');
                    setTimeout(function(){// wait for 5 secs(2)
                    //     // $('#success_tic').modal('hide');
                        $('#successmsg').empty()
                    //     location.reload(); // then reload the page.(3)
                    }, 5000); 
                    // if(data.error){
                    //     console.log(data.error[0])
                    // }
                    

                },
                error:function(xhr){

                    enableSubmitButton()
                    hideloadingImage()
                    document.getElementById("notifyMe").reset(); 

                    
                    $('#successmsg').html('<span>Thanks for taking interest in Fueler. We will get back to you with a good news very soon. </span>');
                     setTimeout(function(){// wait for 5 secs(2)
                    //     // $('#success_tic').modal('hide');
                        $('#successmsg').empty()
                    //     location.reload(); // then reload the page.(3)
                    }, 5000); 
                }
            })
        });
    
    });

        </script>

    </body>
</html>
