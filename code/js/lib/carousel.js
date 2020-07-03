/*****************************************
**
** Título:  Carousel
**
** Desc:    Generador de slide de imágenes
**          automático
**
** Autor:   Eduardo Hopperdietzel
**
******************************************/

class Carousel
{

  constructor(containerID,slideDuration)
  {
    this.container = $(containerID);
    this.container.css({'position':'relative'});
    this.config = {
      currentSlide:0,
      duration:slideDuration
    };
    this.slides = [];
  }

  setImages(images)
  {
    this.slides = images;
    this.container.empty();

    for( var i = 0; i < this.slides.length; i++ )
    {
      var slide = $("<div>");
      slide.attr("slide",i);
      slide.addClass("slide");
      slide.css({
        'height':'100%',
        'width':'100%',
        'display':'none',
        'position':'absolute',
        'background-position': 'center',
        'top':'0',
        'background-size':this.slides[i].mode,
        'background-image':'url(\'' + this.slides[i].url + '\')'
      });

      this.slides[i].slide = slide;
      this.container.append(slide);
    }

    this.slides[0].slide.show();
    this.play();
  }
  animate()
  {

    var prev = this.slides[this.config.currentSlide].slide;
    prev.css({"z-index":"1"});

    if(this.config.currentSlide == this.slides.length - 1)
      this.config.currentSlide = 0;
    else
      this.config.currentSlide++;

    var curr = this.slides[this.config.currentSlide].slide;
    curr.css({"z-index":"2"});
    curr.fadeIn(512,function(){
      prev.hide();
    });
    this.play();
  }
  play()
  {
    setTimeout(this.animate.bind(this),this.config.duration)
  }

};
