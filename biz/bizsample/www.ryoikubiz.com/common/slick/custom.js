jQuery(document).ready(function() {

    /*----------------------------------------------------*/
    /*	slick-slider
    /*----------------------------------------------------*/
    $('.slick-class01').slick({

        arrows: true, //���
        infinite: true, //����
        autoplay: true, //�����Đ�
        autoplaySpeed: 5000, //�b��
        slidesToShow: 4, //4�����\��
        slidesToScroll: 1, //������X�N���[��
        responsive: [{
            breakpoint: 650,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });


    $('.slick-class02').slick({

        arrows: true, //���
        dots: true,
        infinite: true, //����
        autoplay: true, //�����Đ�
        autoplaySpeed: 5000, //�b��
        slidesToShow: 5, //������\��
        slidesToScroll: 2, //������X�N���[��
        appendArrows: $('.pick-arrows'),
        appendDots: $('.pick-dots'),
        responsive: [{
            breakpoint: 650,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

    $('.slick-class03').slick({

        arrows: true, //���
        dots: true,
        infinite: true, //����
        autoplay: true, //�����Đ�
        autoplaySpeed: 5000, //�b��
        slidesToShow: 5, //������\��
        slidesToScroll: 2, //������X�N���[��
        appendArrows: $('.new-arrows'),
        appendDots: $('.new-dots'),
        responsive: [{
            breakpoint: 650,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

    /*  end   */
});