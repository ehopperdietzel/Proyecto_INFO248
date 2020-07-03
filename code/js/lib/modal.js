/*****************************************
**
** Título:  Modal
**
** Desc:    Generador programático de modales.
**
** Autor:   Eduardo Hopperdietzel
**
******************************************/

class Modal
{

  constructor()
  {
    this.background = $('<div>');
    this.background.addClass("modal");
    this.background.css({
      'display':'none',
      'height':'100vh',
      'width':'100vw',
      'z-index':'99',
      'position':'absolute',
      'overflow-y':'auto',
      'background':'rgba(0,0,0,0.6)',
      'justify-content':'center',
      'align-items':'center'
    });

    this.background.click(this,function(e)
    {
      if(e.target !== e.currentTarget) return;
        e.data.hide();

    });

    this.container = $('<div>');
    this.container.css({
      'display':'flex',
      'text-align':'center',
      'width':'250px',
      'flex-direction':'column',
      'border-radius':'4px',
      'box-shadow':'0px 0px 2px 0px #888',
      'background':'#FFF',
      'padding':'16px'
    });

    this.background.html(this.container);

    $("body").prepend(this.background);

    this.elements = [];

    this.responsive = false;
    if(window.innerWidth <= 580)
      this.toMobile();

    $(window).resize(this.resize.bind(this));
  }
  resize()
  {
    if (window.innerWidth <= 580 )
    {
      if(!this.responsive)
        this.toMobile();
    }
    else
    {
      if(this.responsive)
      {

        this.toDesktop();
      }
    }
  }
  toDesktop()
  {
    this.responsive = false;

  }
  toMobile()
  {
    this.responsive = true;

  }
  show()
  {
    this.background.css({'opacity':'0','display':'flex'});
    this.background.animate({ opacity: 1 }, 100);
  }
  hide()
  {
    this.background.animate({ opacity: 0 }, 100,function()
    {
      $(this).css({'display':'none'});
    });

  }
  addElement(element)
  {
    this.elements.push(element);
    this.container.append(element);
  }
}
