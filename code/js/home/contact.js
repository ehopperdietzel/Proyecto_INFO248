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
    this.contactDisplayer = new ContactDisplayer("#contacts");
    this.contactDisplayer.setContacts(
      [
        {
          type  : "facebook",
          href  : "calzadospaillaco",
          img   : "img/social/facebook.png"
        },
        {
          type  : "instagram",
          href  : "calzadospaillaco",
          img   : "img/social/instagram.png"
        },
        {
          type  : "phone",
          href  : "+56932143255",
          img   : "img/social/whatsapp.png"
        },
        {
          type  : "email",
          href  : "contacto@calzadospaillaco.cl",
          img   : "img/social/gmail.png"
        }
      ]
    );
  }
};
