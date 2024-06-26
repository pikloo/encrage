// Scroll to top
const backToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });

};


const toTopButtons = document.querySelectorAll(".to-top");
const imagesGallery = document.querySelectorAll(".gallery-img");
const serieAnchorLink = document.querySelector(".menu-item[data-serie-anchor-link]");
const aboutAnchorLink = document.querySelector(".menu-item[data-about-anchor-link]");
const main = document.querySelector(".main");
const header = document.querySelector(".main-header");
const footer = document.querySelector("footer");
const screenHeight = window.innerHeight;
const portfolioTitle = document.querySelector(".portfolio-title");
const mainSiteTitle = document.querySelector(".main-title");
const aboutSerieSection = document.querySelector("#about");
const serieSection = document.querySelector("#serie");
const gallerySerieSection = document.querySelector(".gallery");
const serieNavigation = document.querySelector(".serie-nav");


const galleryCallback = function (entries) {

  entries.forEach((entry) => {
    
    if (entry.isIntersecting) {
      serieAnchorLink.setAttribute('aria-current', 'location');
      aboutAnchorLink.setAttribute('aria-current', 'false');
      portfolioTitle.classList.remove('fixed-porfolio-title')
    }
    else {
      aboutAnchorLink.setAttribute('aria-current', 'location');
      serieAnchorLink.setAttribute('aria-current', 'false');
      portfolioTitle.classList.add('fixed-porfolio-title');
    }
  });
};



const gallerySerieSectionObserver = new IntersectionObserver(galleryCallback, {
  rootMargin: '-280px',
  threshold: 0
});


if (gallerySerieSection) {
  window.addEventListener("scroll", () => {
    gallerySerieSectionObserver.observe(gallerySerieSection);
  })
  window.addEventListener("touchmove", () => {
    gallerySerieSectionObserver.observe(gallerySerieSection);
  })

}


if (serieAnchorLink) {
  serieAnchorLink.addEventListener("click", (e) => {
    e.preventDefault();
    backToTop();
    let link = e.currentTarget
    link.setAttribute('aria-current', 'location');
    aboutAnchorLink.setAttribute('aria-current', 'false');
    portfolioTitle.classList.remove('fixed-porfolio-title')
  });
}

if (aboutAnchorLink) {
  aboutAnchorLink.addEventListener('click', (e) => {
    e.preventDefault();
    let link = e.currentTarget
    link.setAttribute('aria-current', 'location');
    serieAnchorLink.setAttribute('aria-current', 'false');
    window.scrollTo({ top: serieNavigation.offsetHeight + serieNavigation.offsetTop - header.offsetHeight - portfolioTitle.offsetHeight  , behavior: "smooth" });
    portfolioTitle.classList.add('fixed-porfolio-title')
  })
}

//Taille de la section égale à la hauteur de l'écran - la haiteur du header et du titre du porfolio
if (serieSection){
  serieSection.style.height = `${screenHeight - header.offsetHeight - portfolioTitle.offsetHeight}px`;
}

[...toTopButtons, ...imagesGallery].forEach(function (button) {
  button.addEventListener("click", backToTop);
});



const menuToogle = document.getElementById('menu-toggle');

const onClickOnMenuToggle = () => {

  // Toggle class "opened". Set also aria-expanded to true or false.
  if (-1 !== menuToogle.className.indexOf('opened')) {
    menuToogle.className = menuToogle.className.replace(' opened', '');
    menuToogle.setAttribute('aria-expanded', 'false');
    document.getElementById("sideBar").style.left = "-100%";
    document.getElementById("sideNav").style.left = "-100%";
    header.classList.remove("menu-open");
  } else {
    header.classList.add("menu-open");
    menuToogle.className += ' opened';
    menuToogle.setAttribute('aria-expanded', 'true');
    document.getElementById("sideBar").style.left = "0";
    document.getElementById("sideNav").style.left = "0";
  }

};

menuToogle.addEventListener("click", onClickOnMenuToggle);



//Apparition au scroll
const callback = function (entries) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("inview");
    }
    else if (!entry.isIntersecting && entry.target.classList.contains('to-down')) {
      entry.target.classList.remove("inview");
    }
  });
};

const observer = new IntersectionObserver(callback);

const targets = document.querySelectorAll(".reveal");
targets.forEach(function (target) {
  observer.observe(target);
});



//Main min height
main.style.minHeight = `${screenHeight - footer.offsetHeight - header.offsetHeight}px`;
main.style.paddingTop = `${header.offsetHeight}px`;

//Scroll to photographers (home)
const toDownButton = document.querySelector('.to-down');
const sliderHome = document.querySelector('#slider');
if (toDownButton) {
  toDownButton.addEventListener("click", (event) => {
    event.preventDefault();
    window.scrollTo({
      top: slider.offsetHeight + slider.offsetTop - header.offsetHeight,
      inline: "nearest"
    });
  })

}

//Désactivation du clic droit sur les images

const images = document.querySelectorAll("img:not(.logo-site)");
images.forEach(function (image) {
  image.addEventListener("contextmenu", function (e) {
    e.preventDefault();
  }, false);
});

const releases = document.querySelectorAll(".release");

releases.forEach(function (release) {
  release.addEventListener("click", function () {
    // document.querySelector(".main-header").classList.remove("z-20");
    // document.querySelector(".main-header").classList.add("z-0", "duration-100");
  })
});




