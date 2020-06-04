function ShowSignup()
{
    $('#signup').css('display', 'block');
    $('#lightBackground').css('display', 'block');
    $('#signup').animate(
        {
            top: "0px"
        }, "slow", 'swing'); 
    $('#lightBackground').animate(
        {
            opacity: .67
        }, 420);
}

function ShowLogin()
{
    $('#loginForm').css('display', 'block');
    $('#lightBackground').css('display', 'block');
    $('#loginForm').animate(
        {
            top: "0px"
        }, "slow", 'swing'); 
    $('#lightBackground').animate(
        {
            opacity: .67
        }, 420);
}


/*
// ths is another way to hide the signup DIV by mouse click other area than signup form
$(document).mouseup(function(e){
    var container = $("#signup");
    // If the target of the click isn't the container
    if(!container.is(e.target) && container.has(e.target).length === 0){
        $('#lightBackground').css('display', 'none');
        container.animate(
        {
            top: "-100%"
        }, "slow", 'swing'); 
    }
});
*/

//this is the way to hide  signup form by click background
function HideProduct()
{
    $('#signup').animate(
        {
            top: "-150%"
        }, "slow", 'swing'); 

    $('#loginForm').animate(
        {
            top: "-150%"
        }, "slow", 'swing'); 

    $('#lightBackground').animate(
    {
        opacity: 0
    }, 420, function(){$('#lightBackground').css('display', 'none');});
}

// if the page refreshed, keep in the same scroll position good for the cart page
// after add more item in cart.php, page refreshed, the scroll position 
// stay at same position as last time clicked 
// copy code snippet from https://stackoverflow.com/questions/17642872/refresh-page-and-keep-scroll-position

document.addEventListener("DOMContentLoaded", function(event) { 
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};