const INDEX = (function() {
    let menus = document.getElementsByClassName('nav-anchor');

    const _menu = () => {
        for (let i = 0; i < menus.length; i++) {
            let temp = menus[i].text;
            console.log(temp);
            menus[i].setAttribute('data-title', temp);
        }
    };

    return {
        menu: function() {
            _menu();
        }
    };
})();
