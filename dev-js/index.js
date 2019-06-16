const INDEX = (function() {
    let menus = document.getElementsByClassName('nav-anchor'),
        slides,
        pagination,
        theVideo,
        index;

    const _menu = () => {
        for (let i = 0; i < menus.length; i++) {
            let temp = menus[i].text;
            console.log(temp);
            menus[i].setAttribute('data-title', temp);
        }
    };

    const _initSlide = () => {
        index = document.querySelectorAll('.index');
        pagination = document.getElementById('the-pag');
        slides = document.querySelectorAll('.slide');
        slides[0].classList.add('active');
        index[0].classList.add('active');
        _setVideo(0);
        index.forEach(function(item) {
            item.addEventListener('click', function() {
                Array.from(index).forEach(e => e.classList.remove('active'));
                let _index = this.getAttribute('data-index');
                this.classList.add('active');
                _changeActiveSlide(_index);
            });
        });
    };

    const _changeActiveSlide = _index => {
        _removeVideo();
        _setVideo(_index);
        slides.forEach(item => item.classList.remove('active'));
        slides[_index].classList.add('active');
        pagination.style.transform = `translateY(-${45 * _index}px)`;
    };

    const _setVideo = _index => {
        console.log(_index);
        let video = slides[_index].children[3].getAttribute('data-video');
        let img = slides[_index].children[3].getAttribute('data-img');
        console.log(video);
        console.log(img);
        theVideo = new vidbg(`.actual-${_index}`, {
            mp4: video,
            poster: img,
            overlay: false
        });
    };

    const _removeVideo = () => {
        theVideo.removeVideo();
    };

    return {
        menu: function() {
            _menu();
        },
        slider: function() {
            _initSlide();
        },
        video: function() {
            _setVideo();
        }
    };
})();
