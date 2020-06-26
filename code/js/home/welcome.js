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
  }
};
