// import $ from 'jquery';
// import 'slick-carousel';

// $('.slider').slick({
//     autoplay: false,
//     infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
// 	nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
//     dots: true,
    
    
// });
import axios from "axios";

/* global $ */ 
$(function() {
const imageTotalNumber = 3;
const sliderElement = document.getElementById('slider');
const prevImageElement =document.getElementById('prevImage');
const nextImageElement =document.getElementById('nextImage');

let currentSlideNumber = 1;
sliderElement.setAttribute('src', '{{$post->image1}}');

for (let i = 0; i < imageTotalNumber; i++) {
    const liElement = document.createElement('li');
    liElement.style.backgroundImage = 'url({{$post->image[i + 1]}})';
    
    liElement.addEventListener('click', () => {
        sliderElement.setAttribute('src,', '{{$post->image[i + 1]}}');
    });
}
prevImageElement.addEventListener('click', () => {
    if (currentSlideNumber !==1) {
        currentSlideNumber--;
        sliderElement.setAttribute('src', '{{$post->image[currentSlideNumber]}}');
    }
});
nextImageElement.addEventListener('click', () => {
    if (currentSlideNumber !== imageTotalNumber) {
        currentSlideNumber++;
        sliderElement.setAttribute('src', '{{$post->image[currentSlideNumber]}}');
    }
});

})