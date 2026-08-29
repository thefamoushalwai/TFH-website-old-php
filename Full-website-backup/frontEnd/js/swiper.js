var swiper = new Swiper(".banner_swiper", {
        // cssMode: true,
	  
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
			 clickable: true,
        },
        mousewheel: false,
        keyboard: true,
	
	
      });




var swiper = new Swiper(".logoSwiper", {
        slidesPerView: 3,
        grid: {
          rows: 2,
        },
		  
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
	autoplay: {
    delay:4000
},
	
	
	

      });


  var swiper = new Swiper(".testimonial_swiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
	  breakpoints: {
       280: {
      slidesPerView: 1,
      spaceBetween: 20
    },
		  
		  
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  },

  });


  var swiper = new Swiper(".advantage_swiper", {
    slidesPerView: 3,
    spaceBetween: 0,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
	  breakpoints: {
        280: {
      slidesPerView: 1,
      spaceBetween: 20
    },
		  
		  
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 0
    }
  },

  });


  var swiper = new Swiper(".article_certificate_swiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
 

  });

  var swiper = new Swiper(".article_swiper", {
    slidesPerView: 1,
    spaceBetween: 0,
	  
    pagination: {
      el: ".swiper-paginations",
		freeMode:false,
      clickable: true,
    },
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
 

  });

   var swiper = new Swiper(".Support_swiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
         navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
	  breakpoints: {
        280: {
      slidesPerView: 1,
      spaceBetween: 20
    },
		  
		  
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 0
    }
  },   
	
      });

 