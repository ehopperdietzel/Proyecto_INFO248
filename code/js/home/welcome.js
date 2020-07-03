/*****************************************
**
** Sección: Bienvenida
**
** Desc:    Controlador de la sección
**          bienvenida ( Carousel ).
**
** Autores: Eduardo Hopperdietzel
**          Sebastián Lara
**
******************************************/

var welcomeSec =
{
  dom:{},
  loadView:function()
  {
    this.dom.section.show();
  },
  setup:function()
  {
    this.dom.section = $("#section-1");

    this.carousel = new Carousel("#section-1",7000);
    this.carousel.setImages([
      {
        url:'https://wallpapercrafter.com/uploads/posts/30775-two-pairs-of-worn-in-cowboy-boots-set-in-front-of-wooden-logs___cowboy-shoes-in-a-cabin.jpg',
        mode:'cover'
      },
      {
        url:'https://wallpapercave.com/wp/wp2689234.jpg',
        mode:'cover'
      }
    ]);
    
  }
};
