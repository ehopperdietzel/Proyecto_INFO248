/*****************************************
**
** Sección: Productos
**
** Desc:    Controlador de la sección
**          productos ( Visualización de
**          categorías y productos ).
**
** Autores: Eduardo Hopperdietzel
**          Sebastián Lara
**
******************************************/
var productsSec =
{
  dom:{},
  loadView:function()
  {
    this.dom.section.show();
  },
  setup:function()
  {
    this.dom.section = $("#section-2");
  }
};
