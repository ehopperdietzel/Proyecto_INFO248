/*****************************************
**
** Sección: Contacto
**
** Desc:    Controlador de la sección
**          de contacto.
**
** Autores: Eduardo Hopperdietzel
**          Sebastián Lara
**
******************************************/
var contactSec =
{
  dom:{},
  loadView:function()
  {
    this.dom.section.show();
  },
  setup:function()
  {
    this.dom.section = $("#section-4");
  }
};
