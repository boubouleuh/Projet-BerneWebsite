
document.addEventListener('DOMContentLoaded', function() {
    const h1 = document.getElementsByTagName('h1')[0]
    console.log(document.body.offsetWidth)
    if (!document.body.offsetWidth > 576){
    h1.style.transform = "translateY(-1.2003vw)"
    }else{
        h1.style.transform = "translateZ(1.2003vw)"
    }
}, false);

const footer = document.querySelector("footer");
const img1 = document.querySelector('.img-content-1')
const img2 = document.querySelector('.img-content-2')
const img3 = document.querySelector('.img-content-3')
const heroImage = [img1, img2, img3]

// Callback function executed during observe.
const callback = function( entries, observer ) {
  // Target the first entry available.
  let observedImg = entries[0];

  // Log observer entry data.
  console.log( observedImg );

  // Add or remove the blur.
   if (!observedImg.isIntersecting) {
    observedImg.target.style.transition = '';
    console.log(observedImg,img2)
    if (observedImg.target == img2){
        observedImg.target.style.transform = 'translateX(-63.1712vw)'

        }else{
            observedImg.target.style.transform = 'translateX(63.1712vw)'
        }

        observedImg.target.style.opacity = '0%' 
        
    }else{
            observedImg.target.style.transition = 'all 1s ease-in-out';
            observedImg.target.style.transform = 'translateX(0px)';
            observedImg.target.style.opacity = "100%"
            const observer = 0 
        } 
};

// Construct Intersection Observer.
heroImage.forEach(element => {
    const observer = new IntersectionObserver( callback );
    observer.observe(element);
});
const footerReplace = document.getElementById("footerreplace");
const newsletterButton = document.querySelector(".newsletterbutton");
const btncircleNewsletter = newsletterButton.querySelector("div").querySelector("span");
const btnP = newsletterButton.querySelector("div").querySelector("p");
const newsletterDiv = newsletterButton.querySelector("div")
const footerlinks = document.getElementById("footerlinks")
newsletterButton.addEventListener('click', function(){
    newsletterButton.classList.toggle("newsletter-activate-button")
    btncircleNewsletter.classList.toggle("btncircle-newsletter")
    footerReplace.classList.toggle("footerreplacevisible")
})

const callback2 = function( entries, observer ) {
    // Target the first entry available.
    let observedImg2 = entries[0];
  

    console.log( observedImg2 );
  
     if (observedImg2.isIntersecting) {
      console.log(observedImg2)
        document.getElementById("header-menu").style.transform = 'translateY(-5vw)'
        document.getElementById("header-menu").style.opacity = '0%'
  
          }else{
            document.getElementById("header-menu").style.transform = ''
            document.getElementById("header-menu").style.opacity = '100%'
          }
  };
const observer2 = new IntersectionObserver( callback2 );
observer2.observe(footer);