var _ie8 = false;

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

function setCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function moveTop() {
    $('html, body').animate({
        scrollTop: 0
    }, 400, "easeInOutSine");
}

function moveToID(id) {
    if (id.charAt(0) != "#") {
        location.href = id;
        return 0;
    }
    var pY = $(id).offset().top - 0;
    $('html,body').animate({
        scrollTop: pY + 2
    }, 400, "easeInOutSine");
}

$(function() {
    if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)) $('body').addClass("touch");
    $("#navMenuMobile").find("button").click(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('open');
    });

    // FOOTER //
    $("#navFooter").find("h3").click(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass("open");
    });

    // TAB //
    if ($(".navTab").hasClass("tabBox")) {
        var _navTab = $(".tabBox"),
            _tab = _navTab.find("li"),
            _select = _navTab.find("select"),
            _contentTab = $(".tab-content");
        _tab.each(function() {
            $(this).data('tab', $(this).find("a").attr('href'));
        });
        _tab.click(function(e) {
            e.preventDefault();
            _tab.removeClass("active");
            _contentTab.removeClass("show");
            $(this).addClass("active");
            $($(this).data('tab')).addClass("show");
            _select.val($(this).data('tab'))
        });
        _select.change(function() {
            var _obj = $(_tab[$(this)[0].selectedIndex]);
            _tab.removeClass("active");
            _contentTab.removeClass("show");
            _obj.addClass("active");
            $($(this).val()).addClass("show");
        });
    }

    // PRINT //
    $(".print").click(function(e) {
        e.preventDefault();
        window.print();
    });

    // BACK TO TOP //
    (function(window) {
        var _bound = $("#footer").find(".bound-backTop"),
            _moveTop = $('#moveTop'),
            _active = false;

        function moveScroll() {
            var yPos = $(window).scrollTop(),
                _h = $(window).height(),
                lowerPos = _bound.offset().top;

            switch (true) {
                case yPos > 80:
                    if (!_active) {
                        _moveTop.stop().delay(200).animate({
                            'margin-bottom': '0'
                        }, 220, "easeInOutSine");
                        _active = true;
                    }
                    if (yPos + _h > lowerPos) {
                        _moveTop.addClass("static");
                    } else {
                        _moveTop.removeClass("static");
                    }
                    break;
                default:
                    if (_active) {
                        _moveTop.stop().delay(200).animate({
                            'margin-bottom': '-40px'
                        }, 150, "easeInOutSine");
                        _active = false;
                    }
            }
        }
        moveScroll();
        $(window).scroll(moveScroll);
    })(window);
});

function checkemail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function CheckMobileNumber(ele, lang) {
    var data = $(ele).val();
    if (lang == 'en') {
        var msg = 'Enter your 10 digit phone number with the following format. 08XXXXXXXX,09XXXXXXXX';
    } else {
        var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX,09XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
    }
    s = new String(data);

    if (s.length != 10) {
        alert(msg);
        $(ele).val('');
        $(ele).focus();
        return false;
    }

    for (i = 0; i < s.length; i++) {
        if (s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57) {
            alert(msg);
            return false;
        } else {
            // if(((i==0) && (s.charCodeAt(i) !=48)) || ((i==1) && (s.charCodeAt(i) != 56))){
            if (((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) != 56)) && (s.charCodeAt(i) != 57)) {
                alert(msg);
                $(ele).val('');
                $(ele).focus();
                return false;
            }
        }
    }
    return true;
}

function clearForm() {
    $('input,select,textarea').val('');
    $('input[type=radio], input[type=checkbox]').attr('checked', false);
}


$(document).ready(function() {
    $('input.search-box').keypress(function(e) {
        if (e.which == 13 && $(this).val() == '') {
            $(this).focus();
            return false;
        }
    });

    $("form#formEnews").submit(function(e) {
        $('.enewssubmit').attr('disabled', true);
        e.preventDefault();
        var enews;
        email = $('#enews').val();
        if (!email) {
            $('.enewssubmit').attr('disabled', false);
            $('#enews').val('กรุณากรอกอีเมล');
            return false;
        } else if (email == 'กรุณากรอกอีเมล' || email == 'รูปแบบอีเมลไม่ถูกต้อง') {
            $('.enewssubmit').attr('disabled', false);
            $('#enews').val('กรุณากรอกอีเมล');
            return false;
        } else if (!checkemail(email)) {
            $('.enewssubmit').attr('disabled', false);
            $('#enews').val('รูปแบบอีเมลไม่ถูกต้อง');
            return false;
        } else {
            $('.enewssubmit').attr('disabled', true);
            $('#enews').val("Loading..");
            $.post($('#site_url').val() + "enews/add", "email=" + email + "&" + $(this).serialize(), function(data) {
                //alert(data); 
                if (data == 'รอรับข่าวสารจาก ME ได้เลย') {
                    $('.enewssubmit').attr('disabled', true);
                    $('.enewssubmit').hide();
                } else {
                    $('.enewssubmit').attr('disabled', false);
                    $('.enewssubmit').show();
                }
                $('#enews').val(data);
            });
            return false;
        }
    });

    if ($('html').hasClass('ie8')) {
        _ie8 = true;
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();

        // CHECK IE PERMISSION //
        var _alert = readCookie('obsolete-ie');
        //if(_alert!=1){
        if (isIE() < 8) {
            setCookie('obsolete-ie', 1, 1);
            $("#high-notification").addClass("show");
            $("#high-notification").find(".close-note").click(function(e) {
                e.preventDefault();
                $("#high-notification").animate({
                    'height': 0
                }, 320, "easeInSine", function() {
                    $(this).removeClass("show");
                });
            });
        }
    }

    // Google analytics Event Tracking
    $("[data-ga-event]").each(function(index, element) {
        var el = $(element),
            param = el.attr("data-ga-event"),
            params = param.split("|");
        el.click(function() {
            ga('send', 'event', params[0], params[1], params[2], {
                'page': $(window.location)[0].pathname
            });
        });
    });
});
