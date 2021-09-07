new WOW().init();
/* Удаление id disable_transition для загрузки всех анимаций */
$(window).on('load', function () {
    $("body").removeAttr("id");
});

// if ($('.main')) {
//     $(".main").onepage_scroll();
// }

/* Маска на поле ввода телефона */
if ($("input").is("#phone")) {
    $("#phone").click(function () {
        $(this).setCursorPosition(3)
    }).mask("+7(999) 999-9999", { autoclear: false })
}

if ($("input").is("#phone1")) {
    $("#phone1").click(function () {
        $(this).setCursorPosition(3)
    }).mask("+7(999) 999-9999", { autoclear: false })
}

/* Маска на поле ввода e-mail */
if ($("input").is("#email")) {
    $("#email").blur(function () {

        var email = $(this).val(); // Получаем e-mail пользователя
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

        if (pattern.test(email)) {
            (this).classList.add('valid')
        } else {
            (this).classList.remove('valid')
        }
    })
}

if ($("input").is("#email1")) {
    $("#email1").blur(function () {

        var email = $(this).val(); // Получаем e-mail пользователя
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

        if (pattern.test(email)) {
            (this).classList.add('valid')
        } else {
            (this).classList.remove('valid')
        }
    })
}

$(document).ready(function () {
    $('.js-menu-btn').on('click', function () {
        $(this).toggleClass('active')
        $('.js-menu').toggleClass('active')
        $('body').toggleClass('no-scroll')
    })

    $('.question-form__field-wrap input').filter(function () {
        return this.value.length !== 0;
    }).closest('.question-form__field').addClass('change')
});


$(document).on('input', '.question-form__field-wrap input', function () {
    if (this.value !== '') {
        this.parentElement.classList.add('change')
    } else {
        this.parentElement.classList.remove('change')
    }
})


let phone = document.querySelector('#phone')
if (phone) {
    phone.addEventListener('blur', function () {

        if (this.value !== '') {
            phone.parentElement.classList.add('change')
        } else {
            phone.parentElement.classList.remove('change')
        }
    })
}

let phone1 = document.querySelector('#phone1')
if (phone1) {
    phone.addEventListener('blur', function () {

        if (this.value !== '') {
            phone.parentElement.classList.add('change')
        } else {
            phone.parentElement.classList.remove('change')
        }
    })
}

$(document).ready(function () {

    let name = $('.slide__description .slide-link')
    let title = document.querySelector('.slide__description .slide__description-title')
    let subtitle = document.querySelector('.slide__description p')
    let srcAnchor = document.querySelector('.slide__description a')
    let linkImage = document.querySelector('.slide__image img')

    function createElementPagination(parent) {
        let newDiv = document.createElement('div')

        let img = $('.slide__image img')[0].src
        let link = $('.slide-link')[0].href

        newDiv.classList.add('slide__button-wrap')
        newDiv.innerHTML = `
            <a href="javascript:void(0)" 
               class="slide__button"
               data-subtitle="${subtitle.innerHTML}"
               data-link="${link}" 
               data-img="${img}"
               data-name="${name[0].innerHTML}"
            >
                <div class="slide-hidden">
                    ${title.innerHTML}
                </div>
                ${name[0].innerHTML}
            </a>
        `
        parent.append(newDiv)
    }

    $(document).on('click', '.slide__button-wrap', function () {

        // передаем href
        srcAnchor.setAttribute('href', this.children[0].dataset.link)
        // передаем название кнопки
        name[0].innerHTML = this.children[0].dataset.name
        // передаем заголовок
        title.innerHTML = this.children[0].querySelector('.slide-hidden').innerHTML
        // передаем описание
        subtitle.innerHTML = this.children[0].dataset.subtitle
        // передаем урл изображения
        linkImage.setAttribute('src', this.children[0].dataset.img)

        //Удаляем элемент на который нажали
        this.remove()

        // Создаем новый элемент в конце списка (данные добавляются в функции createElementPagination)
        createElementPagination(document.querySelector('.slide__buttons'))
    })

});

document.querySelectorAll('.about-program__row').forEach(item => {
    item.addEventListener('click', function () {
        item.classList.toggle('active')
    })
})

let filter = document.querySelectorAll('.filter-selector')
filter.forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('active')
    })
})


let filterWrap1 = document.querySelector('#filterWrap1')
let filterWrap2 = document.querySelector('#filterWrap2')

if ((filterWrap1) || (filterWrap2)) {

    filterWrap1.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-selector__field')) {
            filterWrap1.querySelector('.filter-selector').innerText = e.target.innerText
            this.classList.remove('active')
        }
    })

    filterWrap2.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-selector__field')) {
            filterWrap2.querySelector('.filter-selector').innerText = e.target.innerText
            this.classList.remove('active')
        }
    })

    let counter = 0,
        timeout;
    document.querySelectorAll('.catalog-filter-body input[type=checkbox]').forEach(input => {
        input.addEventListener('click', function () {

            let selectorBtn = document.querySelector('.catalog-filter-body .filter-selector__btn-show'),
                selectorBody = document.querySelector('.catalog-filter-body'),
                selectorBtnRemove = document.querySelectorAll('.catalog-filter-body .filter-selector__buttons-remove');

            //Проверяем количество отмеченных чекбоксов, если ни один не отмечен, то у кнопки убираем активный класс
            if (this.checked) {
                counter++
            } else {
                counter--
            }

            if (counter < 1) {
                selectorBtn.classList.remove('active')
                selectorBtnRemove.forEach(item => {
                    item.classList.remove('active')
                })
            } else {
                selectorBtn.classList.add('active')
                selectorBtnRemove.forEach(item => {
                    item.classList.add('active')
                })
            }

            var obj = this // берем интересующий элемент
            var height = obj.parentElement.offsetHeight / 2; //получаем его высоту и делим на 2, чтобы правильно спозиционировать кнопку

            var parentPos = selectorBody.getBoundingClientRect().top, //получаем расстояние от верхней точки экрана до главной обертки фильтров
                childPos = obj.parentElement.getBoundingClientRect().top; //получаем расстояние от верхний точки экрана до отмеченного чекбокса по клику

            relativePosTop = childPos - parentPos + height - 25; //высчитываем разницу этих параметров, чтобы задать высоту позиционирования кнопки

            var attribute = 'top: ' + relativePosTop + 'px;';
            selectorBtn.setAttribute('style', attribute)

            clearTimeout(timeout)
            timeout = setTimeout(() => {
                selectorBtn.classList.remove('active')
            }, 5000)

            //Запрос на колличество элементов
            const request = new XMLHttpRequest();
           request.responseType =    "json";
           const url = '/api/countElements.php?' + Array.from(
               new FormData(input.closest('form')),
               e => e.map(encodeURIComponent).join('=')
           ).join('&')

           request.open('GET', url);


           request.setRequestHeader('Content-Type', 'application/x-www-form-url');


           request.addEventListener("readystatechange", () => {


               if (request.readyState === 4 && request.status === 200) {

                   let response = request.response;
                   selectorBtn.textContent = selectorBtn.dataset.title + ' (' + response + ')';
               }
           });

           request.send();
        })
    })

    // p = $('.filter-selector__hidden').scrollTop;


    $(document).on('click', (e) => {
        var containerFilter = $('#filterWrap1');
        if ((containerFilter.has(e.target).length === 0) && (containerFilter.hasClass('active'))) {
            containerFilter.removeClass('active')
            $('#filterWrap1 .filter-selector__buttons-remove').removeClass('active')
            $('#filterWrap1 .filter-selector__btn-show').removeClass('active')
        }
    })

    $(document).on('click', (e) => {
        var containerFilter = $('#filterWrap2');
        if ((containerFilter.has(e.target).length === 0) && (containerFilter.hasClass('active'))) {
            containerFilter.removeClass('active')
            $('#filterWrap2 .filter-selector__buttons-remove').removeClass('active')
            $('#filterWrap2 .filter-selector__btn-show').removeClass('active')
        }
    })
}

if ($('.filter-selector__buttons-hide')) {
    $('.filter-selector__buttons-hide').on('click', function () {
        $(this.parentElement.parentElement).removeClass('active')
    })
}

let filterMobileBtn = document.querySelector('.sorting__mobile')
let filterMobile = document.querySelector('.catalog-filter-body')
let filterClose = document.querySelector('.catalog-filter__icon-close')

if (filterMobileBtn !== null) {
    filterMobileBtn.addEventListener('click', function () {
        filterMobileBtn.classList.toggle('active')

        if (filterMobileBtn.classList.contains('active')) {
            filterMobile.classList.add('active')
        } else {
            filterMobile.classList.remove('active')
        }
    })
}
if (filterMobileBtn !== null) {
    filterClose.addEventListener('click', function () {
        filterMobile.classList.remove('active')
        filterMobileBtn.classList.remove('active')
    })
}

let sorting = document.querySelectorAll('.sorting__selector')
sorting.forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('active')
    })
})

document.querySelectorAll('.js-filter').forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('opened')
    })
})

document.querySelectorAll('.contacts__block-input input').forEach(input => {
    input.addEventListener('input', function () {
        if (this.value !== '') {
            input.parentElement.classList.add('change')
        } else {
            input.parentElement.classList.remove('change')
        }
    })
})

$(function () {

    $('ul.tabs__caption').on('click', 'li:not(.active)', function () {
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });
});

$(document).click(function (e) {
    var container = $(".sorting__selector-wrapper");
    if (container.has(e.target).length === 0) {
        $('.sorting__selector-wrapper').removeClass('active');
    }
});

/* ВОСПРОИЗВЕДЕНИЕ ВИДЕО */
const btnOk = document.querySelector('.news-opened__video-btn');
const btnStop = document.querySelector('.btn-stop');
const wrapperVideo = document.getElementById('video1');

if (btnOk) {
    btnOk.addEventListener('click', function () {
        wrapperVideo.play();
        wrapperVideo.setAttribute('controls', 'controls')
        this.classList.add('hide')

        wrapperVideo.addEventListener('ended', function () {
            btnOk.classList.remove('hide')
        })
    })
}

if ('.second-block-top__close' && '.second-block-top__open') {
    $('.second-block-top__open').on('click', function () {
        $(this).parent().addClass('hide')
        $('.second-block-top__text-desktop').addClass('active')
    })

    $('.second-block-top__close').on('click', function () {
        $(this).parent().removeClass('active')
        $('.second-block-top__text-mobile').removeClass('hide')
    })
}

if ($('.first-block__btn')) {
    $('.first-block__btn').on('click', () => {
        $('.question-form__layout').addClass('active')
    })
}

$(document).on('click', '.question-form__layout-wrapper', (e) => {
    var containerForm = $(".question-form__layout");
    if ((containerForm.has(e.target).length === 0) || ($(e.target).hasClass('question-form__btn')) || ($(e.target).hasClass('question-form__close'))) {
        $('.question-form__layout').removeClass('active');
    }
})

$('.questions-and-answers__row').on('click', '.questions-and-answers__headline', function () {
    if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active')
    } else {
        $(this).parent().addClass('active')
    }
})

// document.querySelector('.header__menu .js-menu-about').addEventListener('mouseover', function () {
//     if (this.parentElement.classList.contains('active')) {
//         this.parentElement.classList.remove('active')
//     } else {
//         this.parentElement.classList.add('active')
//     }
// })

document.addEventListener('mouseover', function (e) {
        if ((e.target.closest('.js-menu-inner')) && !e.target.closest('.js-menu-inner').classList.contains('active') || e.target.closest('.header__menu-item-hidden-text') || e.target.classList.contains('js-menu-about')) {
            e.target.closest('.js-menu-inner').classList.add('active')
            
        } else {
            document.querySelector('.js-menu-inner').classList.remove('active')
            // e.target.parentElement.classList.remove('active')
        }
    
})
// if (this.parentElement.classList.contains('active')) {
//     this.parentElement.classList.remove('active')
// } else {
//     this.parentElement.classList.add('active')
// }


document.addEventListener('click', function (e) {
    const container = document.querySelector('.header__menu-item-hidden-text'),
        tab = document.querySelector('.js-menu-about')

    if (!e.target.contains(container) && !e.target.contains(tab)) {
        container.parentElement.classList.remove('active')
    }

    // if (container.parentElement.classList.contains('active') && !e.target.contains(container)) {
    //     container.parentElement.classList.remove('active')
    // }
    // if (!e.target.contains(container)) {
    //     container.parentElement.classList.remove('active')
    // }
})







