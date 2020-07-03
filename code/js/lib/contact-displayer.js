/*****************************************
**
** Título:  Contact Displayer
**
** Desc:    Generador una lista de métodos
**          de contacto.
**
** Autor:   Eduardo Hopperdietzel
**
******************************************/

class ContactDisplayer
{

  constructor(containerID)
  {
    this.container = $(containerID);
    this.container.css(
      {
        'position':'relative',
        'display':'flex',
        'align-items':'center',
        'justify-content':'center',
        'width':'100%',
        'height':'100%'
      }
    );

    this.url = {};

    this.url.facebook =
    {
      url:"https://www.facebook.com/",
      base:"@"
    };

    this.url.instagram =
    {
      url:"https://www.instagram.com/",
      base:"@"
    };

    this.url.phone =
    {
      url:"tel:",
      base:""
    };

    this.url.email =
    {
      url:"mailto:",
      base:""
    };

    this.contacts = [];
  }

  setContacts(contactsList)
  {

    this.contacts = contactsList;
    this.container.empty();

    var cont = $('<div>');
    cont.css({
      'display':'flex',
      'flex-direction':'column'
    });

    for(var i = 0; i < this.contacts.length; i++)
    {
      var contact = $('<div>');
      contact.css({
        'display':'flex',
        'align-items':'center',
        'margin-bottom':'16px'
      });

      var img = $('<img>');
      img.attr("src",this.contacts[i].img);
      img.css(
        {
          'max-width':'60px',
          'width':'14vw',
          'margin-right':'16px'
        }
      )

      var a = $('<a>');
      a.css({
        'text-decoration':'none',
        'color':'#666'
      })

      a.attr("href",this.url[this.contacts[i].type].url + this.contacts[i].href);
      a.html(this.url[this.contacts[i].type].base + this.contacts[i].href);

      contact.append(img);
      contact.append(a);

      cont.append(contact);
    }

    this.container.html(cont);


  }

};
