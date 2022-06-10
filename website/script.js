

document.addEventListener('DOMContentLoaded', function() {
    const h1 = document.getElementsByTagName('h1')[0]
    h1.style.transform = "translateX(1.2003vw)"
}, false);

const img1 = document.querySelector('.img-content-1')
const img2 = document.querySelector('.img-content-2')
const img3 = document.querySelector('.img-content-3')
const heroImage = [img1, img2, img3]

// Observer options.
const options = {
  root: null,
  rootMargin: '50px',
  threshold: 0.10,
};

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
        observedImg.target.style.transform = 'translateX(-1000px)'
        }else{
            observedImg.target.style.transform = 'translateX(1000px)'
        }

        observedImg.target.style.opacity = '0%' 
        
    }else{
            observedImg.target.style.transition = 'all 1.5s ease-in-out';
            observedImg.target.style.transform = 'translateX(0px)';
            observedImg.target.style.opacity = "100%" 
        } 
};

// Construct Intersection Observer.
heroImage.forEach(element => {
    const observer = new IntersectionObserver( callback, options );
    observer.observe(element);
});



