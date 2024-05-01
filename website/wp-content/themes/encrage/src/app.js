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
      document.getElementById("sideBar").style.left = "-100%";
      document.getElementById("sideNav").style.left = "-100%";
      // document.getElementById("sideLinks").style.opacity = "0";
    } else {
      menuToogle.className += ' opened';
      menuToogle.setAttribute( 'aria-expanded', 'true' );
      document.getElementById("sideBar").style.left = "0";
      document.getElementById("sideNav").style.left = "0";
      // document.getElementById("sideLinks").style.opacity = "1";
     }
      
   };

menuToogle.addEventListener("click", onClickOnMenuToggle);


//Apparition au scroll

const callback = function (entries) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("inview");
    } 
    // else {
    //   entry.target.classList.remove("inview");
    // }
  });
};

const observer = new IntersectionObserver(callback);

const targets = document.querySelectorAll(".reveal");
targets.forEach(function (target) {
  target.classList.add("opacity-0");
  observer.observe(target);
});


//Main min height

let main = document.querySelector(".main");
const header = document.querySelector(".main-header");
const footer = document.querySelector("footer");
const screenHeight = window.screen.height;

main.style.minHeight = `${screenHeight - footer.offsetHeight - header.offsetHeight }px`;


//Désactivation du clic droit sur les images

const images = document.querySelectorAll("img:not(.logo-site)");
images.forEach(function (image) {
  image.addEventListener("contextmenu", function(e) {
    e.preventDefault();
  }, false);
});


//Titre fixe lorsqu'il arrive sous le logo(Page Single Série)
const portfolioTitle = document.querySelector(".portfolio-title");
const sliderActive = document.querySelector(".gallery");

if(portfolioTitle) {
  portfolioTitle.setAttribute('style', `top:${sliderActive.offsetHeight - 150}px; z-index:2; position:absolute;`);
  const basePosition = sliderActive.offsetHeight - 150;
  
  
  document.addEventListener("scroll", (event) => {
    console.log(portfolioTitle.getBoundingClientRect().top)
    if (portfolioTitle.getBoundingClientRect().top < header.offsetHeight + 150 ){
      portfolioTitle.setAttribute('style', `top:${header.offsetHeight + 20}px; z-index:2; position:fixed;`);
    }
    console.log(window.scrollY);
    
  
    if(window.scrollY  < basePosition - 20 ) {
      portfolioTitle.setAttribute('style', `top:${basePosition}px;z-index:2; position:absolute;`);
    }
  });
  
}


