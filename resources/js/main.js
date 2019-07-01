/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});

// --------------------------form registration by ajax -----------------------------------------
 

// this function recive value from input --- and colname manual to used it in sql query after send page
function checkuser(value,colname){
    
    $.post("controller/c_login.php",{key: value , colname: colname }, function(data,status){
        $(".validateajx").html(data);
        // $.get("checkuser.php?username="+username, function(data,status){
        //  $(".ajx").text(data); }); ######### way to get request

    });   

}

// function to validate form registration based on retreive data ajx
$(document).ready(function() {
    $("#register").click(function() {
        // e.preventDefault(); // this is used when stop default event (form)
        var name        = $("#name").val();
        var email       = $("#email").val();
        var password    = $("#password").val();
        var formAction  = $("#reset").attr('action');
        var check       = $("#check").html();
        
        if (name == '' || email == '' || password == '') {
            // $(".validateajx").html("Please fill all fields...!!!!!!");
            alert("Please fill all fields...!!!!!!");
            
        } else if ((password.length) < 8) {
            
            alert("Password should atleast 8 character in length...!!!!!!");

        } else if (check == "This Value Already Exist try another value"){

            alert("username or email already exist try another data");

        }else {
            $.post(
                formAction, 
                {
                    'username': name,
                    'email': email,
                    'password': password
                }, 
                function(data,status) {
                    if (data.trim() == 'You have Successfully Registered') {
                        alert(data);
                        $("#reset")[0].reset();

                    }else{
                        alert("erro");
                       $("#reset")[0].reset();

                        }
                       $(".validateajx").html("");
                }
            );
        }
    });
    
 });