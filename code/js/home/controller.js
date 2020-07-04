/*****************************************
**
** Título:  Controller
**
** Desc:    Controlador principal de las
**          pestañas y vistas de la página.
**
** Autores: Eduardo Hopperdietzel
**          Sebastián Lara
**
******************************************/

var tabsManager, loginModal;

// Elementos del DOM
var sections, adminBtn, userInput, passInput, loginBtn;

// Obtiene los elementos del DOM
function getElements()
{
  sections = $(".section");
  adminBtn = $("#adminBtn");
  userInput = $('<input type="text" placeholder="Usuario">');
  passInput = $('<input type="password" placeholder="Contraseña">');
  loginBtn = $('<button>Siguiente</button>');

}

// Inicializa las secciones
function setupSections()
{
  welcomeSec.setup();
  productsSec.setup();
  historySec.setup();
  contactSec.setup();
}

function setupTabs()
{
  tabsManager = new TabsManager('#tabs');
  tabsManager.setTabs([
    {
      default:true,
      text:"Inicio",
      onClick:function()
      {
        sections.hide();
        welcomeSec.loadView();
      }
    },
    {
      text:"Productos",
      onClick:function()
      {
        sections.hide();
        productsSec.loadView();
      }
    },
    {
      text:"Historia",
      onClick:function()
      {
        sections.hide();
        historySec.loadView();
      }
    },
    {
      text:"Contacto",
      onClick:function()
      {
        sections.hide();
        contactSec.loadView();
      }
    }
  ]);
}

function setupAdminModal()
{
  loginModal = new Modal();

  loginModal.addElement($('<h4>ADMINISTRADOR</h4>'));
  loginModal.addElement(userInput);
  loginModal.addElement(passInput);
  loginModal.addElement(loginBtn);

  adminBtn.click(function(){
    loginModal.show()
  });

  loginBtn.click(function()
  {
    $.ajax(
      {
        url : '/api/v1/admin/login',
        type : 'post',
        data :
        {
          username:userInput.val(),
          password:passInput.val()
        },
        error:function (response)
        {
          console.log(response);
          //debug(response);
          //notify("error","Se ha perdido la conexión con el servidor.")
        },
        success:function (response)
        {
          window.location.href = "/";
        }
    });
  });

}

// Cuando la página termina de cargar
$(document).ready(function()
{
  getElements();
  setupSections();
  setupTabs();
  setupAdminModal();
});


// Admin Logout
function test1()
{
  $.ajax(
    {
      url : '/api/v1/admin/logout',
      type : 'get',
      error:function (response)
      {
        console.log(response);
      },
      success:function (response)
      {
        console.log(response);
        //window.location.href = "/";
      }
  });
}

// New Slide
function test2()
{
  $.ajax(
    {
      url : '/api/v1/slides',
      type : 'post',
      data :
      {
        request:'new'
      },
      error:function (response)
      {
        console.log(response);
      },
      success:function (response)
      {
        console.log(response);
      }
  });
}

// Delete Slide
function test3()
{
  $.ajax(
    {
      url : '/api/v1/slides',
      type : 'post',
      data :
      {
        request:'delete',
        id:2
      },
      error:function (response)
      {
        console.log(response);
      },
      success:function (response)
      {
        console.log(response);
      }
  });
}
