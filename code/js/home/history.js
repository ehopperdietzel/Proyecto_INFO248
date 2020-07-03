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

    this.converter = new showdown.Converter(),
    this.text      = '# Historia\n Este texto fue escrito en formato MarkDown y convertido a HTML.',
    this.html      = this.converter.makeHtml(this.text);

    this.dom.section.html(this.html);
  }
};
