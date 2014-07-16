document.getElementById("button_menu").onclick = function() {
        
        var nav = document.getElementById("navigation");
        var menu = document.getElementById("mainMenu");
        var subMenu = document.querySelector("nav ul li ul");

        var className = ' ' + nav.className + ' ';
        var classNameMenu = ' ' + menu.className + ' ';
        var classNameSubMenu = ' ' + subMenu.className + ' ';

        if ( ~className.indexOf(' fullScreen ') ) {
            nav.className = className.replace(' fullScreen ', ' ');
            menu.className = classNameMenu.replace(' displayOn ', ' ');
            subMenu.className = classNameSubMenu.replace(' displayOn ', ' ');

            this.innerHTML="m";

        } else {
            this.innerHTML="x";
            menu.className += " displayOn";
            nav.className = 'fullScreen';
        }
    
}

document.querySelector("nav ul li").onclick = function() {
        var subMenu = document.querySelector("nav ul li ul");
        var className = ' ' + subMenu.className + ' ';

        if ( ~className.indexOf(' displayOn ') ){
            subMenu.className = className.replace(' displayOn ', ' ');
        } else {
            subMenu.className = 'displayOn';
        }
    
}