<section id="banners">
    <div class="grid">
        <div class="slide-container">
            <div class="slides">
                <div class="slides-item">
                    <a href="">
                        <img src="storage/images/oCdpK0eygxX1XYqmstajL59u42BDdhozCHSQYx0R.webp" alt="" class="active">
                    </a>
                </div>
                <div class="slides-item">
                    <a href="">
                        <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/google_pixel_8_pro.webp" alt="">
                    </a>
                </div>
                <div class="slides-item">
                    <a href="">
                        <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/iphone.webp" alt="">
                    </a>
                </div>
                <div class="slides-item">
                    <a href="">
                        <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/s23-series.webp" alt="">
                    </a>
                </div>
            </div>
            <div class="buttons">
                <span class="prev"></span>
                <span class="next"></span>
            </div>
        </div>

        <div class="dotsContainer">
            <div class="dot active" attr='0' onclick="switchImage(this)">
                <span>Galaxy AI Phone - S24 Series</span>
            </div>
            <div class="dot" attr='1' onclick="switchImage(this)">
                <span>Pixel 8 Series - Điện thoại nhiếp ảnh</span>
            </div>
            <div class="dot" attr='2' onclick="switchImage(this)">
                <span>iPhone 15 Series - Sự kỳ diệu</span>
            </div>
            <div class="dot" attr='3' onclick="switchImage(this)">
                <span>S23 SERIES - Mắt thần bóng đêm</span>
            </div>
        </div>
    </div>
</section>
<section id="slide-bottom">
   <div class="grid">
        <div class="slide-container-2">
            <div class="slides-item-bottom">
                <a href="" class="">
                    <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/z4804300381749_da23058b9b16692d9f798cac1222a906.webp" alt="">
                </a>
            </div>
            <div class="slides-item-bottom">
                <a href="">
                    <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/z4804372115654_86a6b94eea049d729a4af41e789140d5.webp" alt="">
                </a>
            </div>
            <div class="slides-item-bottom">
                <a href="">
                    <img src="https://mobileworld.com.vn/uploads/weblink/thumbs/iphone-13-series.webp" alt="">
                </a>
            </div>
        </div>
   </div>
</section>
<script type="text/javascript">

	// Access the Images
	let slideImages = document.querySelectorAll('.slides img');
	// Access the next and prev buttons
	let next = document.querySelector('.next');
	let prev = document.querySelector('.prev');
	// Access the indicators
	let dots = document.querySelectorAll('.dot');

	var counter = 0;

	// Code for next button
	next.addEventListener('click', slideNext);
	function slideNext(){
	slideImages[counter].style.animation = 'next1 3s ease 0s forwards';
	if(counter >= slideImages.length-1){
		counter = 0;
	}
	else{
		counter++;
	}
	slideImages[counter].style.animation = 'next2 3s ease 0s forwards';
	indicators();
	}

	// Code for prev button
	prev.addEventListener('click', slidePrev);
	function slidePrev(){
	slideImages[counter].style.animation = 'prev1 3s ease 0s forwards';
	if(counter == 0){
		counter = slideImages.length-1;
	}
	else{
		counter--;
	}
	slideImages[counter].style.animation = 'prev2 3s ease 0s forwards';
	indicators();
	}

	// Auto slideing
	function autoSliding(){
		deleInterval = setInterval(timer, 5000);
		function timer(){
			slideNext();
			indicators();
		}
	}
	autoSliding();

	// Stop auto sliding when mouse is over
	const container = document.querySelector('.slide-container');
	container.addEventListener('mouseover', function(){
		clearInterval(deleInterval);
	});

	// Resume sliding when mouse is out
	container.addEventListener('mouseout', autoSliding);

	// Add and remove active class from the indicators
	function indicators(){
        if (dots.length > 0) {
            for(i = 0; i < dots.length; i++){
                dots[i].className = dots[i].className.replace(' active', '');
            }
            dots[counter].className += ' active';
        }
    }


	// Add click event to the indicator
	function switchImage(currentImage){
		currentImage.classList.add('active');
		var imageId = currentImage.getAttribute('attr');
		if(imageId > counter){
		slideImages[counter].style.animation = 'next1 3s ease 0s forwards';
		counter = imageId;
		slideImages[counter].style.animation = 'next2 3s ease 0s forwards';
		}
		else if(imageId == counter){
			return;
		}
		else{
		slideImages[counter].style.animation = 'prev1 3s ease 0s forwards';
		counter = imageId;
		slideImages[counter].style.animation = 'prev2 3s ease 0s forwards';
		}
		indicators();
	}
</script>
