$('.top,.star').mousemove(function(e){
    var amountMovedX = (e.pageX * -1 / 150);
    var amountMovedY = (e.pageY * -1 / 120);
    $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
});
(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field,input__textarea--kozakura,textarea.input__field,input__textarea--kozakura' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}


				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
				
			})();
// $(window).scroll(function() {
//     if($(this).scrollTop()>5) {
//         $( ".navbar-me" ).addClass("fixed-me");
//     } else {
//         $( ".navbar-me" ).removeClass("fixed-me");
//     }
// });


// Image Preload - v1.2 - https://github.com/farinspace/jquery.imgpreload
if ("undefined" != typeof jQuery) {
	(function(a) {
		a.imgpreload = function(b, c) {
			c = a.extend({}, a.fn.imgpreload.defaults, c instanceof Function ? {
				all: c
			} : c);
			if ("string" == typeof b) {
				b = [b]
			}
			var d = [];
			var e = b.length;
			for (var f = 0; f < e; f++) {
				var g = new Image;
				a(g).bind("load error", function(b) {
					d.push(this);
					a.data(this, "loaded", "error" == b.type ? false : true);
					if (c.each instanceof Function) {
						c.each.call(this)
					}
					if (d.length >= e && c.all instanceof Function) {
						c.all.call(d)
					}
				});
				g.src = b[f]
			}
		};
		a.fn.imgpreload = function(b) {
			var c = [];
			this.each(function() {
				c.push(a(this).attr("src"))
			});
			a.imgpreload(c, b);
			return this
		};
		a.fn.imgpreload.defaults = {
			each: null,
			all: null
		}
	})(jQuery)
}


$(document).ready(function () {

    $(".next-step").click(function (e) {

        var $active = $('.nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.nav-tabs li.active');
        prevTab($active);

    });
});
function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {    
  	var target = $(this).attr('href');  
  	  
    $(target).css('left','-'+$(window).width()+'px');   
    var left = $(target).offset().left;
    $(target).css({left:left}).animate({"left":"0px"}, "10");
})

AOS.init();


  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
  var s = getUrlParameter('s');
  if(s=='t'){
      // console.log("form submitted");
      UIkit.notify("<i class='uk-icon-check'></i>Thank you for contacting us");
  }if(s=='f'){
      UIkit.notify("Error occurred");
  }



