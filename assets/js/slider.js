const images = [
	'./assets/img/insurance.png',
	'./assets/img/property-dealing.png',
	'./assets/img/traveling.png'
];

const sliderTrack = document.getElementById('sliderTrack');
const dotsContainer = document.getElementById('dotsContainer');
let currentIndex = 0;
let slideInterval;

	// Create slide elements
function createSlides() {
	images.forEach((src, index) => {
		const slide = document.createElement('div');
		slide.classList.add('slide');
		slide.innerHTML = `<img src="${src}" alt="Slide ${index+1}">`;
		sliderTrack.appendChild(slide);
	});

	// Clone first and last slide for infinite loop
	const firstClone = sliderTrack.children[0].cloneNode(true);
	const lastClone = sliderTrack.children[images.length - 1].cloneNode(true);
	sliderTrack.appendChild(firstClone);
	sliderTrack.insertBefore(lastClone, sliderTrack.firstChild);

	// Adjust position to first image
	sliderTrack.style.transform = `translateX(-100%)`;
	currentIndex = 0;

	createDots();
	startAutoPlay();
}

	// Create dots
function createDots() {
	images.forEach((_, index) => {
		const dot = document.createElement('span');
		dot.classList.add('dot');
		if (index === 0) dot.classList.add('active');
		dot.onclick = () => goToSlide(index);
		dotsContainer.appendChild(dot);
	});
}

function updateDots(index) {
	const dots = document.querySelectorAll('.dot');
	dots.forEach(dot => dot.classList.remove('active'));
	dots[index].classList.add('active');
}

function moveSlide(direction) {
	clearInterval(slideInterval);
	currentIndex += direction;
	slide();

	startAutoPlay();
}

function goToSlide(index) {
	clearInterval(slideInterval);
	currentIndex = index;
	slide();

	startAutoPlay();
}

function slide() {
	const totalSlides = images.length;
	sliderTrack.style.transition = 'transform 0.5s ease-in-out';
	sliderTrack.style.transform = `translateX(-${(currentIndex + 1) * 100}%)`;

	setTimeout(() => {
		if (currentIndex >= totalSlides) {
			sliderTrack.style.transition = 'none';
			currentIndex = 0;
			sliderTrack.style.transform = `translateX(-100%)`;
		} else if (currentIndex < 0) {
			sliderTrack.style.transition = 'none';
			currentIndex = totalSlides - 1;
			sliderTrack.style.transform = `translateX(-${totalSlides * 100}%)`;
		}
		updateDots(currentIndex);
	}, 500);
}

function startAutoPlay() {
	slideInterval = setInterval(() => {
		currentIndex++;
		slide();
	}, 3000);
}

createSlides();