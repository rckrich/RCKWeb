//import './bootstrap';

$(document).ready(function () {
    //handleURL();
    //handleTags();

    window.addEventListener('hashchange', function() { handleURL();});
    window.addEventListener('popstate', function() {handleURL();});
    
    window.addEventListener("resize", function() {handleTags();});
    
    location.hash ? toggleLink(location.hash.replace('#','')) : '';
    
    //sets navbar collapse button behavior
    var menuToggle = document.getElementById('navbarNav')
    var bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
    $("#OpenMenu").on("click", function(){bsCollapse.toggle()})
    $(".nav-link").on("click", function(){
        $(".nav-link.active").removeClass("active");
        $(".nav-item.active").removeClass("active");
        $(this).addClass("active");
        $(this).parent().addClass("active");
        bsCollapse.hide()
    });   

    $("#flip-videogame .flip-card-back").on("click", function(){
        //alert($(this).get( 0 ).classList)
        $(this).css("-webkit-transform","rotateY(180deg)")
        $(this).css("transform","rotateY(180deg)")
        $(this).css("-webkit-transform-style","preserve-3d")
        $(this).css("transform-style","preserve-3d")
        $(this).parent("flip-card-front").css("display","block")
    }   
    );    
    $("#flip-mobile .flip-card-back").hover(function(){
        $(this).parent(".flip-card .flip-card-front .flip-card-inner").css("display","none")
    });
    $("#flip-mobile .flip-card-front").hover(function(){
        $(this).parent(".flip-card .flip-card-back .flip-card-inner").css("display","none")
    });
    //$("#flip-videogame .flip-card-back").on("click", function(){$(this).parent().parent().get( 0 ).removeClass("active")});
    //$("#flip-mobile .flip-card-back").on("click", function(){alert('click detected mobile')});
    //$("#flip-webapp .flip-card-back").on("click", function(){alert('click detected webapp')});
    //$("#flip-design .flip-card-back").on("click", function(){alert('click detected design')});
    //$("#flip-ar .flip-card-back").on("click", function(){alert('click detected ar')});

});

function toggleLink (routeID) {
    $(".nav-link.active").removeClass("active");
    $(".nav-item.active").removeClass("active");
    $("#nav_"+routeID).addClass("active");
    $("#nav_"+routeID).parent().addClass("active");
}

function handleURL () {
    if(location.pathname.includes('/projects/') || location.pathname.includes('/login') || location.pathname.includes('/register')){
        $('.navbar').removeClass('navbar-light');
        $('.navbar').removeClass('bg-light');
        $('.navbar').addClass('navbar-dark');
        $('.navbar').addClass('bg-dark');
    }
    else{
        scrollHandler
        window.addEventListener('scroll', scrollHandler)
    }
}
/*function handleTags(){
    imageUrl = '';
    if(screen.width<575){
        $('#index').css("background-image", "url(" + window.location.hostname + "/assets/img/Banner_Novil.webp)");
    }
}*/

const scrollHandler = () => {

    let menu = document.querySelector('.navbar');

    let A = document.getElementById('dark_nav');
    let B = document.getElementById('light_nav');
    let C = document.getElementById('contact');

    let pos_menu = window.pageYOffset + menu.offsetHeight;

    let pos_A = A.offsetTop + A.offsetHeight;
    let pos_B = B.offsetTop + B.offsetHeight;
    let pos_C = C.offsetTop + C.offsetHeight;
    
    let distance_A = pos_A - pos_menu;
    let distance_B = pos_B - pos_menu;
    let distance_C = pos_C - pos_menu;

    let min = Math.min(...[distance_A, distance_B, distance_C].filter(num => num > 0));

    $('.navbar').removeClass('navbar-light') ;
    $('.navbar').removeClass('bg-light') ;
    $('.navbar').removeClass('navbar-dark');
    $('.navbar').removeClass('bg-dark');

    if(min === distance_A || min === distance_C){
        $('.navbar').removeClass('navbar-light');
        $('.navbar').removeClass('bg-light');
        $('.navbar').addClass('navbar-dark');
        $('.navbar').addClass('bg-dark');
    } 
    if(min === distance_B){
        $('.navbar').addClass('navbar-light');
        $('.navbar').addClass('bg-light');
        $('.navbar').removeClass('navbar-dark');
        $('.navbar').removeClass('bg-dark');
    } 
    //element.scroll({left: element.offsetLeft, behavior: 'smooth'})
}


