document.addEventListener('DOMContentLoaded', function () {
    const videoUrls = [
        '../video/video1.mp4',
        '../video/video2.mp4',
      
        // Add more video URLs as needed
    ];

    const sliderContainer = document.getElementById('sliderContainer');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    videoUrls.forEach(function (url) {
        const videoElement = document.createElement('video');
        videoElement.src = url;
        videoElement.controls = true;
        videoElement.classList.add('video-slide');
        sliderContainer.appendChild(videoElement);
    });

    let currentIndex = 0;

    function showSlide(index) {
        const slides = document.querySelectorAll('.video-slide');
        currentIndex = (index + slides.length) % slides.length;
        const translateValue = -currentIndex * 100 + '%';
        sliderContainer.style.transform = `translateX(${translateValue})`;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
});