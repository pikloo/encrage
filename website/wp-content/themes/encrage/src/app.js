// Scroll to top
const backToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });

};


const toTopButtons = document.querySelectorAll(".to-top");
const imagesGallery = document.querySelectorAll(".gallery-img");
const serieAnchorLink = document.querySelector(".menu-item[data-serie-anchor-link]");
const aboutAnchorLink = document.querySelector(".menu-item[data-about-anchor-link]");

const aboutCallback = function (entries) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      aboutAnchorLink.setAttribute('aria-current', 'location');
      serieAnchorLink.setAttribute('aria-current', 'false');
    }
    else {
      serieAnchorLink.setAttribute('aria-current', 'location');
      aboutAnchorLink.setAttribute('aria-current', 'false');
    }
  });
};

const aboutSerieSection = document.querySelector("#about");

const aboutSerieSectionObserver = new IntersectionObserver(aboutCallback, {
  rootMargin: '50px',
  threshold: 1
});


if (aboutSerieSection) {
  window.addEventListener("scroll", () => {
    aboutSerieSectionObserver.observe(aboutSerieSection);
  })

}


if (serieAnchorLink) {
  serieAnchorLink.addEventListener("click", (e) => {
    backToTop();
    let link = e.currentTarget
    link.querySelector('h2').classList.add("text-gray-500");
    link.setAttribute('aria-current', 'location');
    aboutAnchorLink.setAttribute('aria-current', 'false');
    aboutAnchorLink.querySelector('h2').classList.remove("text-gray-500")
  });
}

if (aboutAnchorLink) {
  aboutAnchorLink.addEventListener('click', (e) => {
    let link = e.currentTarget
    link.querySelector('h2').classList.add("text-gray-500");
    link.setAttribute('aria-current', 'location');
    serieAnchorLink.setAttribute('aria-current', 'false');
    serieAnchorLink.querySelector('h2').classList.remove("text-gray-500")
  })
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
  } else {
    document.querySelector(".main-header").classList.remove("z-0");
    document.querySelector(".main-header").classList.add("z-20");
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

let main = document.querySelector(".main");
const header = document.querySelector(".main-header");
const footer = document.querySelector("footer");
const screenHeight = window.screen.height;

main.style.minHeight = `${screenHeight - footer.offsetHeight - header.offsetHeight}px`;

// //Titre fixe lorsqu'il arrive sous le logo(Page Single Série)
// const portfolioTitle = document.querySelector(".portfolio-title");
// const sliderActive = document.querySelector(".gallery");

// if (portfolioTitle) {
//   const basePosition = sliderActive.offsetHeight;
//   portfolioTitle.classList.add('md:absolute', 'md:top-36')
//   // portfolioTitle.setAttribute('style', `top:${basePosition}px; z-index:11; position:absolute;`);

//   document.addEventListener("scroll", (event) => {
//     if (portfolioTitle.getBoundingClientRect().top < header.offsetHeight + 150) {
//       portfolioTitle.classList.remove('md:absolute')
//       portfolioTitle.classList.add('md:fixed')
//     }

//     if (window.scrollY < basePosition - 20) {
//       portfolioTitle.classList.remove('md:fixed')
//       portfolioTitle.classList.add('md:absolute')
//     }
//   });

// }

//Scroll to photographers (home)
const toDownButton = document.querySelector('.to-down');
if (toDownButton) {
  toDownButton.addEventListener("click", (event) => {
    event.preventDefault();
    window.scrollTo({
      top: document.querySelector('#slider').offsetHeight - document.querySelector('.main-header').offsetHeight,
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




