$(document).ready(function() {
    var menu = $(".menu");
    var hamburgur = $(".hamburgur");
    var line = $(".line");
    var menuOpen;

    function openMenu(){
        menu.css("left","0px");
        line.css("background","#000");
        menuOpen= ture;
    }
    function closeMenu(){
        menu.css("left","-320px");
        line.css("background","#F1F0E8");
        menuOpen = false;
    }
    function toggleMenu(){
        if(menuOpen){
            closeMenu();
        } else{
            openMenu();
        }
    }

    hamburgur.on({
        mouseenter: function() {
            openMenu();
        }
    });
    menu.on({
        mouseleave: function() {
            closeMenu();
        }
    });

    hamburgur.on({
        click: function(){
            toggleMenu();
        }
    });

});