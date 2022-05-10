//画像スライドの処理

const slideShow = function() {

    // 画像1枚以上3枚未満の時の処理
    for(let itemIndex = 0 ; itemIndex < 3; itemIndex++) {
        if( document.querySelectorAll('img')[itemIndex].getAttribute('src') === "") {
            document.querySelectorAll('.slideShow ul.slider li')[itemIndex].remove();
        } else {
            document.querySelectorAll('.slideShow ul.slider li')[itemIndex].style.display = '';
        }
    }

    const images = document.querySelectorAll('.slideShow ul.slider li'),
          imagesLength = images.length -1,
          next = document.querySelector('.slideShow .btn-next'),
          prev = document.querySelector('.slideShow .btn-prev');

    let cnt = 0;

    function showNext() {
        if(cnt >= imagesLength) {
            cnt = 0;
            images.item(cnt).classList.add('slider-item01');
            images.item(imagesLength).classList.remove('slider-item01');
        } else {
            images.item(cnt).classList.remove('slider-item01');
            images.item(cnt + 1).classList.add('slider-item01');
            cnt += 1;
        }
    }

    function showPrev() {
        if(cnt === 0) {
            images.item(cnt).classList.remove('slider-item01');
            images.item(imagesLength).classList.add('slider-item01');
            cnt = imagesLength;
        } else {
            images.item(cnt).classList.remove('slider-item01');
            images.item(cnt - 1).classList.add('slider-item01');
            cnt -= 1;
        }
    }

    next.addEventListener( 'click', showNext );
    prev.addEventListener( 'click', showPrev );

};
// 画像未保存の時の処理
const img = document.querySelectorAll('img');
if(img[0].getAttribute('src') === ""
    && img[1].getAttribute('src') === ""
    && img[2].getAttribute('src') === "") {
    document.querySelectorAll('.slideShow')[0].remove();
}
else if(img[1].getAttribute('src') === ""
    && img[2].getAttribute('src') === "") {
    document.querySelector('.slideShow .btn-next').remove();
    document.querySelector('.slideShow .btn-prev').remove();
}
else {
    slideShow();
}
