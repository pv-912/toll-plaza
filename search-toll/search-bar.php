<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        z-index: 10000;
    }
    .table {
    margin-top: 10%;
    width: 50%;
    max-width: 100%;
    margin-bottom: 20px;
}
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){

        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){

            $.get("backend-search.php", {term: inputVal}).done(function(data){console.log("blo");
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    

   
      
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();  
        var input=$("#input").val();

        showLocation() ;
        // var latitude=position.coords.latitude; 
        // var longitude=position.coords.longitude;
        // console.log(latitude);
        // console.log("jgv");

    //      $.ajax({
    //     type: "POST",
    //     url: "display_searched_toll.php",
    //     data:{
    //         input:input,

    //     },
    //     success: function(data){
    //         alert(data);
    //         window.location.href="<?php echo base_url?>geolocation/display_searched_toll.php";
    //     }
    // })
    });


});

function showLocation() {
    document.getElementById("forminput").submit();
}

</script>
</head>
<body>
    <div class="search-box">
        <form id="forminput" method="POST" action="display_searched_toll.php">
        <input type="text" autocomplete="off" name="input" id="input" placeholder="Search toll..." />
        <form>
        <div class="result"></div>
    </div>
    <div class="display"></div>
</body>
</html>