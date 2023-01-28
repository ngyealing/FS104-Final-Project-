
// portfolio carousel
$('#owl-portfolio').owlCarousel({
    margin:30,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:false
        }
    }
});

// testmonial carousel
$('#owl-testmonial').owlCarousel({
    center: true,
    items:1,
    loop:true,
    nav: true,
    dots: false
})

// add to cart

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});
//Pre-loader
const loader = document.querySelector('.loader')
window.addEventListener("load", ()=>{
    setTimeout(()=> {
      loader.style.display ='none'
    }, 2000)
} );

//Discount Media
const video= document.querySelector(".video");
const button= document.querySelector(".video-control");

button.addEventListener("click", playpausevideo)
function playpausevideo(){
    if(video.paused){
        button.innerHTML = "<i class='bx bx-pause'></i>"; video.play();      
    }
    else{
        button.innerHTML = "<i class='bx bx-play'></i>"; video.pause();      
    }
}