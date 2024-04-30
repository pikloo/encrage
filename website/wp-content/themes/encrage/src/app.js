// Scroll to top
const backToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
   
 };

const toTopButtons = document.querySelectorAll(".to-top");
toTopButtons.forEach(function(button) { 
    button.addEventListener("click", backToTop);
});



// Gestion du menu toogle
const menuToogle = document.getElementById( 'menu-toggle' );

const onClickOnMenuToggle = () => {
	
    // Toggle class "opened". Set also aria-expanded to true or false.
    if ( -1 !== menuToogle.className.indexOf( 'opened' ) ) {
      menuToogle.className = menuToogle.className.replace( ' opened', '' );
      menuToogle.setAttribute( 'aria-expanded', 'false' );
      document.getElementById("sideBar").style.width = "0";
      document.getElementById("sideNav").style.width = "0";
      document.getElementById("sideLinks").style.opacity = "0";
    } else {
      menuToogle.className += ' opened';
      menuToogle.setAttribute( 'aria-expanded', 'true' );
      document.getElementById("sideBar").style.width = "100%";
      document.getElementById("sideNav").style.width = "100%";
      document.getElementById("sideLinks").style.opacity = "1";
     }
      
   };

menuToogle.addEventListener("click", onClickOnMenuToggle);


function scrollReveal() {
	const revealPoint = 150;
	const revealElement = document.querySelectorAll(".reveal");
	for (var i = 0; i < revealElement.length; i++) {
		const windowHeight = window.innerHeight;
		const revealTop = revealElement[i].getBoundingClientRect().top;
		if (revealTop < windowHeight - revealPoint) {
			revealElement[i].classList.add("active");
		}
    //  else {
		// 	revealElement[i].classList.remove("active");
		// }
	}
}

window.addEventListener("scroll", scrollReveal);




