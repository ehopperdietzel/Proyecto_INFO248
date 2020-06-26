/*****************************************
**
** Sección: Historia
**
** Desc:    Controlador de la sección
**          historia ( Parser de Markdown ).
**
** Autores: Eduardo Hopperdietzel
**          Sebastián Lara
**
******************************************/
var historySec =
{
  dom:{},
  loadView:function()
  {
    this.dom.section.show();
  },
  setup:function()
  {
    this.dom.section = $("#section-3");
  }
};
