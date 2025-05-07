$(window).load(function () {
    $(".preloader").fadeOut(function () {
     // $(".centerLogo").addClass('show-logo');
    });
});


$(document).ready(function () {

    navButton=document.querySelector('.toggler')
    navMenu=document.querySelector('.mobile-menu')
    arrow=document.querySelector('.toggler')
    navButton.addEventListener('click', ()=>{
        $(navMenu).slideToggle()
        $(arrow).toggleClass('rotate')
    });


    // $(function() {
    //     var Accordion = function(el, multiple) {
    //         this.el = el || {};
    //         this.multiple = multiple || false;
    
    //         // Variables privadas
    //         var links = this.el.find('.drop-down');
    //         // Evento
    //         links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    //     }
    
    //     Accordion.prototype.dropdown = function(e) {
    //         var $el = e.data.el;
    //             $this = $(this),
    //             $next = $this.next();
    
    //         $next.slideToggle();
    //         $this.parent().toggleClass('open');
    
    //         if (!e.data.multiple) {
    //             $el.find('.drop-down ul.sub-menu').not($next).slideUp().parent().removeClass('open');
    //         };
    //     }	
    
    //     var accordion = new Accordion($('#menu-mobile-menu'), false);
    // });
    $(function() {
        // Add span to each .drop-down
        $('.drop-down').prepend('<span class="toggle-icon"></span>');
    
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
    
            // Private variables
            var links = this.el.find('.drop-down > .toggle-icon'); // Target the span within drop-down
            // Event
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
        }
    
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this).parent(), // Parent is the .drop-down element
                $next = $this.children('.sub-menu');
    
            $next.slideToggle();
            $this.toggleClass('open'); // Toggle the class on the .drop-down element
    
            if (!e.data.multiple) {
                $el.find('.drop-down').not($this).removeClass('open').children('.sub-menu').slideUp();
            }
        }
    
        var accordion = new Accordion($('#menu-mobile-menu'), false);
    });

    AOS.init({
        once:true,
    });
    $('.gallery-content').magnificPopup({
        type:'inline',
        midClick: true,
        delegate: 'a',
        gallery: {
            enabled: true
        },
    });

});

