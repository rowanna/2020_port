// loading
$(function () {
    var $container = $('#loading'),
        $progressBar = $('.loadingText'),
        imgLoad = imagesLoaded('body'),
        imgTotal = imgLoad.images.length, //전체 이미지 수
        imgLoaded = 0, // 로드한 이미지 수
        current = 0, //진행률
        progressTimer = setInterval(updateProgress, 1000 / 30);

    imgLoad.on('progress', function () {
        imgLoaded++;
    });

    function updateProgress() {
        //진행률 -> bar, 숫자
        var target = (imgLoaded / imgTotal) * 100;

        //current = current + (target - current) * 0.1;
        current += (target - current) * 0.1;
        $progressBar.css({backgroundSize: current*2 + '% 100%'});
//        console.log(current);
        
        if (current > 99.9) {
            clearInterval(progressTimer);
            $container.addClass('invisible');
        }
    } //updateProgress
}); //document ready



//skrollr 스크롤러
var s = skrollr.init({
    edgeStrategy: 'set',
    easing: 'linear'
});

$(window).scroll(function () {
    let scroll = parseInt($(window).scrollTop());
    $(".scroll").text(scroll);
});

$(window).scroll(function () {
    let wScroll = $(this).scrollTop();
    const wHeight = $(window).height();

    // body 배경 스크롤 이벤트

    const $section2 = $("#section2");
    const $section4 = $("#section4");
    const $section5 = $("#section5");
    const $section7 = $("#section7");
    const $footer = $("#footer");
    const $body = $("body");

    if (wScroll > $section2.offset().top - wHeight / 2 && wScroll < $section4.offset().top - wHeight / 2) {
        $body.addClass("bgBeige");
    } else if (wScroll > $section5.offset().top && wScroll < $section7.offset().top - wHeight / 2) {
        $body.removeClass("bgBeige");
        $body.addClass("bgMint");
    } else if (wScroll >= $footer.offset().top - wHeight / 2) {
        $body.removeClass("bgMint");
        $body.addClass("bgBeige");
    } else {
        $body.removeClass("bgBeige");
        $body.removeClass("bgMint");
    }
});




// header parallax 헤더 패럴럭스
const wHeight = $(window).height();
const dHeight = $(document).height();
const headerHeight = $("#header").outerHeight();
let lastScrollTop = 0;
let moveScroll;

$(window).scroll(function (event) {
    moveScroll = true;
});

setInterval(function () {
    if (moveScroll) {
        hasScroll();
        moveScroll = false;
    }
}, 250);

function hasScroll() {
    let wScroll = $(this).scrollTop();
    if (wScroll > lastScrollTop && wScroll > headerHeight) {
        $("#header").addClass("on");
    } else {
        if (wScroll + wHeight < dHeight) {
            $("#header").removeClass("on");
        }
    }
    lastScrollTop = wScroll;
}


// sec1 메인 이미지, 배경색 바뀜
const circle1 = $(".circle1img");
const circle2 = $(".circle2img");
const circle3 = $(".circle3img");

circle1.hover(function () {
    $("#section1").addClass("bgBeige");
    $(".introimg.normal").addClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").addClass("rotate");
    $(".introimg.beige").removeClass("invisible");
    $(".sec1 .introimg.beige .beigeCircle").addClass("rotate");
}, function () {
    $("#section1").removeClass("bgBeige");
    $(".introimg.normal").removeClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").removeClass("rotate");
    $(".introimg.beige").addClass("invisible");
    $(".sec1 .introimg.beige .beigeCircle").removeClass("rotate");
});

circle2.hover(function () {
    $(".introimg.normal").addClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").addClass("rotate");
    $(".introimg.grey").removeClass("invisible");
    $(".sec1 .introimg.grey .greyCircle").addClass("rotate");
}, function () {
    $(".introimg.normal").removeClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").removeClass("rotate");
    $(".introimg.grey").addClass("invisible");
    $(".sec1 .introimg.grey .greyCircle").removeClass("rotate");
});

circle3.hover(function () {
    $("#section1").addClass("bgMint");
    $(".introimg.normal").addClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").addClass("rotate");
    $(".introimg.mint").removeClass("invisible");
    $(".sec1 .introimg.mint .mintCircle").addClass("rotate");
}, function () {
    $("#section1").removeClass("bgMint");
    $(".introimg.normal").removeClass("invisivble");
    $(".sec1 .introimg.normal .normalCircle").removeClass("rotate");
    $(".introimg.mint").addClass("invisible");
    $(".sec1 .introimg.mint .mintCircle").removeClass("rotate");
});




$(window).scroll(() => {
    const scrollTop = $(window).scrollTop() + ($(window).height() / 2);
    // 각 섹션이 조금 늦게 나타나는 것을 방지하기 위해서

// section2 - About me
    if (scrollTop > $("#section2").offset().top) {
        let x = parseInt($(window).scrollTop() - $("#section2").offset().top + ($(window).height() / 2)) / 8

        $(".sec2 .left img.me").attr("style", "transform: translateY(-" + x + "px)" /* +"scale("+ x/500 +")" */ );
        $(".sec2 .left .sideImg").attr("style", "transform: translateY(-" + x * 3 + "px)" /* +"scale("+ x/500 +")" */ );
    }


// section4 - my works parallax
    if (scrollTop >= $(".my.web").offset().top) {
        $(".web .works-desc-wrap .works-desc > h3").addClass("show");
        $(".web .works-desc-wrap .works-desc > p").addClass("show");
        $(".web .works-desc-wrap").addClass("show");
    } else {
        $(".web .works-desc-wrap .works-desc > h3").removeClass("show");
        $(".web .works-desc-wrap .works-desc > p").removeClass("show");
        $(".web .works-desc-wrap").removeClass("show");
    }
    if (scrollTop >= $(".my.respon").offset().top) {
        $(".respon .works-desc-wrap .works-desc > h3").addClass("show");
        $(".respon .works-desc-wrap .works-desc > p").addClass("show");
        $(".respon .works-desc-wrap").addClass("show");
    } else {
        $(".respon .works-desc-wrap .works-desc > h3").removeClass("show");
        $(".respon .works-desc-wrap .works-desc > p").removeClass("show");
        $(".respon .works-desc-wrap").removeClass("show");
    }
    if (scrollTop >= $(".my.mega").offset().top) {
        $(".mega .works-desc-wrap .works-desc > h3").addClass("show");
        $(".mega .works-desc-wrap .works-desc > p").addClass("show");
        $(".mega .works-desc-wrap").addClass("show");
    } else {
        $(".mega .works-desc-wrap .works-desc > h3").removeClass("show");
        $(".mega .works-desc-wrap .works-desc > p").removeClass("show");
        $(".mega .works-desc-wrap").removeClass("show");
    }
    if (scrollTop >= $(".my.mobile").offset().top) {
        $(".mobile .works-desc-wrap .works-desc > h3").addClass("show");
        $(".mobile .works-desc-wrap .works-desc > p").addClass("show");
        $(".mobile .works-desc-wrap").addClass("show");
    } else {
        $(".mobile .works-desc-wrap .works-desc > h3").removeClass("show");
        $(".mobile .works-desc-wrap .works-desc > p").removeClass("show");
        $(".mobile .works-desc-wrap").removeClass("show");
    }
});



// sectin6 javascript contents
$(window).scroll(function () {
    const wScrollTop = $(window).scrollTop();
    
// section6 blur filter effect
    if (wScrollTop >= $(".imgslide").offset().top) {
        $(".imgslide").addClass("filter");
    } else {
        $(".imgslide").removeClass("filter");
    }

    if (wScrollTop >= $(".parallax").offset().top) {
        $(".parallax").addClass("filter");
    } else {
        $(".parallax").removeClass("filter");
    }

    if (wScrollTop >= $(".mouse").offset().top) {
        $(".mouse").addClass("filter");
    } else {
        $(".mouse").removeClass("filter");
    }

    if (wScrollTop >= $(".chrome").offset().top) {
        $(".chrome").addClass("filter");
    } else {
        $(".chrome").removeClass("filter");
    }

    if (wScrollTop >= $(".paint").offset().top) {
        $(".paint").addClass("filter");
    } else {
        $(".paint").removeClass("filter");
    }



//section6 h2 effect

//    const y = $(window).scrollTop() - $(".sec6").offset().top;
//    const tx = ($(window).scrollTop() - $(".sec6").offset().top) / 9;
//    const x = ($(window).scrollTop() - $(".sec6").offset().top) / 20;
//    const minusX = -(($(window).scrollTop() - $(".sec6").offset().top) / 30);
//    const minusThreeX = -(($(window).scrollTop() - $(".sec6").offset().top) / 8);
//
//
//    if (wScrollTop >= $(".js-cont-box.paint .left").offset().top) {
//        $(".js-tit-wrap h2").removeClass("invisible");
//        $(".text1").attr("style", "transform: matrix(1,0,0,1," + tx + "," + y + ");");
//        $(".text2").attr("style", "transform: matrix(1,0,0,1," + x + "," + y + ");");
//        $(".text3").attr("style", "transform: matrix(1,0,0,1," + minusX + "," + y + ");");
//        $(".text4").attr("style", "transform: matrix(1,0,0,1," + minusThreeX + "," + y + ");");
//        $(".js-tit-circle").attr("style", "transform: matrix(1,0,0,1,0," + y + ");");
//    } else {
//        $(".js-tit-wrap h2").addClass("invisible");
//    }
    
    
    var j = $(".text1");
    var ava = $(".text2");
    var scrip = $(".text3");
    var t = $(".text4");
    const rightWrap = $(".rightWrap");
    
//    console.log("j"+j.offset().top);
//    console.log(rightWrap.offset().top);
//    
//    if(j.offset().top >= rightWrap.offset().top){
//        j,ava,scrip,t.stop();
//    }
});





//section 7 .coming 이미지 회전
$(window).scroll(function () {
    let wScroll = $(this).scrollTop();
    const $section7 = $("#section7");
    if (wScroll >= $section7.offset().top) {
        $(".coming1").attr("style", "transform: translate(-50%, -50%) rotate(" + parseInt(wScroll - $section7.offset().top) / 10 + "deg)");
        $(".coming2").attr("style", "transform: translate(-50%, -50%) rotate(" + parseInt(wScroll - $section7.offset().top) / 20 + "deg)");
        $(".coming3").attr("style", "transform: translate(-50%, -50%) rotate(" + parseInt(wScroll - $section7.offset().top) / 5 + "deg)");
    } else {
        $(".coming1").attr("style", "transform: translate(-50%, -50%) rotate(0deg)");
        $(".coming2").attr("style", "transform: translate(-50%, -50%) rotate(0deg)");
        $(".coming3").attr("style", "transform: translate(-50%, -50%) rotate(0deg)");
    }
});
