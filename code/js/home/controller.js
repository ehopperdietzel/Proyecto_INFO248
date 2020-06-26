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

// Elementos del DOM
var tabs, tabSelectIndicators, sections;

// Variables de Estado
var currentTab = "tab-1";


// Obtiene los elementos del DOM
function getElements()
{
  tabs = $(".tab");
  tabSelectIndicators = $(".selectIndicator");
  sections = $(".section");
}

// Inicializa las secciones
function setupSections()
{
  welcomeSec.setup();
  productsSec.setup();
  historySec.setup();
  contactSec.setup();
}

// Inicializa los eventos de las pestañas
function setupTabs()
{
  // Al hacer click en una pestaña
  tabs.on("click",function()
  {
    // Obtiene el id de la pestaña
    var tab = $(this).attr("id");

    // Se detiene si es la pestaña actual
    if( tab == currentTab) return;

    // Almacena la pestaña actual
    currentTab = tab;

    // Oculta todas las pestañas y secciones
    tabSelectIndicators.hide(128);
    sections.hide();

    // Muestra la pestaña actual
    $(this).find(".selectIndicator").show(128);

    // Muestra la sección asociada
    switch (tab)
    {
      // Welcome
      case "tab-1":
        {
          welcomeSec.loadView();
        }
        break;

      // Products
      case "tab-2":
        {
          productsSec.loadView();
        }
        break;

      // History
      case "tab-3":
        {
          historySec.loadView();
        }
        break;

      // Contact
      case "tab-4":
        {
          contactSec.loadView();
        }
        break;
      default:

    }
  });
}

// Cuando la página termina de cargar
$(document).ready(function()
{
  getElements();
  setupSections();
  setupTabs();
});
