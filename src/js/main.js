new Vue({
    el: '#reviews-vue',
    data() {
        return {
            reviews_list: [
                { logo: 'src/images/reviews/logo/3.png', preview: 'src/images/reviews/preview/3.jpg', img: true },
                { logo: 'src/images/reviews/logo/2.png', preview: 'src/images/reviews/preview/2.jpg', img: true },
                { logo: 'src/images/reviews/logo/6.png', preview: 'src/images/reviews/preview/6.jpg', img: true },
                { logo: 'src/images/reviews/logo/1.png', preview: 'src/images/reviews/preview/1.jpg', img: true },
                { logo: 'src/images/reviews/logo/5.png', preview: 'src/images/reviews/preview/5.jpg', img: true },
                { logo: 'src/images/reviews/logo/4.png', preview: 'src/images/reviews/preview/4.jpg', img: true },
                { logo: 'src/images/reviews/logo/7.png', preview: 'Выражаем благодарность экспертной комиссии за профессионализм и особый подход при оценке деловой репутации нашей компании!<br><br> Генеральный директор ООО «Аэротехнический центр» Веселов Д. А.', img: false },
                { logo: 'src/images/reviews/logo/8.png', preview: 'Спасибо за быструю, а самое главное качественную работу!<br><br> Директор ООО «Архитектурное бюро А2» Желнерович К. М.', img: false },
                { logo: 'src/images/reviews/logo/9.png', preview: 'От лица АО «Ижорские заводы» благодарю команду центра сертификации за трепетный и последовательный подход к сертификации деловой репутации нашей компании.<br></br>Руководитель проектного отдела АО «Ижорские заводы» Кремен В. Н.', img: false }
            ],
            currentPreview: 'src/images/reviews/preview/3.jpg',
            isActiveIndex: 0,
            isImg: true,
            changeClass: true
        }
    },
    methods: {
        test: function(index) {
            this.changeClass = false;

            setTimeout(() => {
                this.isActiveIndex = index;
                this.currentPreview = this.reviews_list[index].preview;
                this.isImg = this.reviews_list[index].img;
                this.changeClass = true;
            }, 100);
        }
    }
});


// reviewsVue.mount('#reviews-vue');

const targetOpenModal = document.querySelectorAll('.js-open-modal');
const targetCloseModal = document.querySelector('.js-close-modal');

targetOpenModal.forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = document.querySelector('.modal');
        modal.classList.remove('modal_close')
        modal.classList.add('modal_fade');

        document.querySelector('body').style.overflow = 'hidden';

        // let opacity = 0;
        // let interval = setInterval(function () {
        //     if (opacity >= 1) {
        //         clearInterval(interval);
        //     } else {
        //         opacity += .2;
        //         modal.style.opacity = opacity;
        //     }
        // }, 30);
    });
});

function modalClose(modal) {
    // modal.classList.remove('modal_show');
    modal.classList.add('modal_close');

    document.querySelector('body').style.overflow = 'scroll';
}

targetCloseModal.addEventListener('click', e => {
    e.preventDefault();
    const modal = e.target.closest('.modal');

    modalClose(modal);
});


// new Vue({
//     el: '#test',
//     data() {
//       return {
//         phone: '',
//       };
//     },
//     methods: {
//       formatPhoneNumber() {
//         let input = this.phone;

//         // Удаляем все символы, кроме цифр
//         input = input.replace(/\D/g, '');

//         // Применяем маску для номера телефона
//         let formattedInput = '';
//         let caretPosition = 0;

//         // Определяем, где находится каретка в поле ввода
//         const inputElement = event.target;
//         caretPosition = inputElement.selectionStart;

//         // Добавляем символы "+", "(", ")" и "-"
//         if (input.length > 0) {
//           formattedInput += '+7 (' + input.substring(0, 3);
//         }
//         if (input.length > 3) {
//           formattedInput += ') ' + input.substring(3, 6);
//         }
//         if (input.length > 6) {
//           formattedInput += '-' + input.substring(6, 8);
//         }
//         if (input.length > 8) {
//           formattedInput += '-' + input.substring(8, 10);
//         }

//         // Обновляем значение поля ввода
//         this.phone = formattedInput;

//         // Восстанавливаем позицию каретки после обновления значения
//         if (caretPosition > formattedInput.length) {
//           caretPosition = formattedInput.length;
//         }
//         inputElement.setSelectionRange(caretPosition, caretPosition);
//       }
//     }
//   });

window.addEventListener('load', () => {
    const contentScrollHeight = document.querySelector('.content').scrollHeight
    document.querySelector('body').style.height = contentScrollHeight + 'px';

    document.querySelector('.js-open-modal').classList.add('animate__animated');
    document.querySelector('.js-open-modal').classList.add('animate__headShake');
});

window.addEventListener('scroll', () => {
    document.querySelector('.content').style.transform = 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -' + scrollY + ', 0, 1)';
})

$('.request-form').on('submit', function (e) {
    e.preventDefault();
    const currentForm = $(this);

    $.post(
        './app.php',
        {
            action: 'request',
            form: $(this).serialize()
        },
        function(res) {
            const result = JSON.parse(res);

            if (result.status) {
                currentForm.prev('.notificate').fadeIn();
                currentForm.get(0).reset();
            }
        }
    );
});

$('[name="phone"]').mask('+7 (999) 999-99-99');

$('.menu__link').on('click', function (e) {
    e.preventDefault();

    const id = $(this).attr('href');
    const offsetTop = $(id).offset().top;
    document.body.scrollTop = document.documentElement.scrollTop = offsetTop;
});


console.log($('.map iframe').contents().find('.map-widget-map-component'));


ymaps.ready(init);
let myMap;

function init() {
    myMap = new ymaps.Map("map", {
        center: [55.727328, 37.575792],
        zoom: 15,
        controls: []
    });

    myPlacemark = new ymaps.Placemark([55.727328, 37.575792], { // Координаты метки объекта
        // balloonContent: "<div class='ya_map'>Заезжайте в гости!</div>" // Подсказка метки
    }, {
        preset: 'twirl#buildingsIcon', // Тип метки
        iconColor: '#0265ff'
    });

    myMap.geoObjects.add(myPlacemark);
    // myPlacemark.balloon.open();
};

$('.modal__overlay').on('click', function(e) {
    if (e.target.classList.contains('modal__overlay')) {
        const modal = e.target.closest('.modal');

        modalClose(modal);
    }
});

$(document).on('keydown', function(e) {
    console.log('ddd');
    if (e.code === 'Escape') {
        const modal = $('.modal.modal_fade').get(0);
        console.log(modal);

        modalClose(modal);
    }
});