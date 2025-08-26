document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.livro');
            const proximo = document.getElementById('depois');
            const anterior = document.getElementById('antes');
            const indicators = document.querySelectorAll('.indicator');
            const slides = document.querySelectorAll('.livro');
            const slide = document.querySelectorAll('.livros');
            const slidesToShow = 3; 
            let currentIndex = 0;
            const totalSlides = slides.length;
            
            
            const totalGroups = Math.ceil(totalSlides / slidesToShow);
            
            
            function adjustSlidesToShow() {
                if (window.innerWidth <= 768 && window.innerWidth > 480) {
                    return 2;
                } else if (window.innerWidth <= 480) {
                    return 1;
                }
                return 3;
            }
            
            
            function updateSlider() {
                const slidesVisible = adjustSlidesToShow();
                const translateXValue = -currentIndex * (100 / slidesVisible);
                slider.style.transform = `translateX(${translateXValue}%)`;
                
                
                indicators.forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }
            
          
            proximo.addEventListener('click', function() {
                const slidesVisible = adjustSlidesToShow();
                if (currentIndex < totalGroups - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateSlider();
            });
            
           
            anterior.addEventListener('click', function() {
                const slidesVisible = adjustSlidesToShow();
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalGroups - 1;
                }
                updateSlider();
            });
            
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    currentIndex = index;
                    updateSlider();
                });
            });
            
           
            window.addEventListener('resize', function() {
                updateSlider();
            });
            
           
            updateSlider();
        });