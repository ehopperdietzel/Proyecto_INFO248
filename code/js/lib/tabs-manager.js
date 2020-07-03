/*****************************************
**
** Título:  Tabs Manager
**
** Desc:    Generador programático de pestañas
**          de navegación.
**
** Autor:   Eduardo Hopperdietzel
**
******************************************/

class TabsManager
{

  constructor(containerID)
  {
    this.container = $(containerID);
    this.container.css({'display':'flex','height':'100%','justify-content':'center'});
    this.conf = {
      currentTab:0
    };
    this.tabs = [];

    this.responsive = false;
    if(window.innerWidth <= 580)
      this.responsive = true;

    $(window).resize(this.resize.bind(this));
  }
  resize()
  {
    if (window.innerWidth <= 580 )
    {
      if(!this.responsive)
        this.toMobile();
    }
    else
    {
      if(this.responsive)
      {

        this.toDesktop();
      }
    }
  }
  toDesktop()
  {
    this.responsive = false;
    this.container.css({
      'position':'relative'
    });
    this.select.hide();
    for( var i = 0; i < this.tabs.length; i++)
      this.tabs[i].html.tab.show();

  }
  toMobile()
  {
    this.responsive = true;
    this.container.css({
      'position':'absolute',
      'width':'100vw',
      'left':0
    });
    for( var i = 0; i < this.tabs.length; i++)
      this.tabs[i].html.tab.hide();
    this.select.show();
  }
  selectChanged()
  {
    this.tabs[parseInt(this.select.val())].html.tab.trigger("click");
  }
  setTabs( tabsArray )
  {

    this.tabs = tabsArray;
    this.container.empty();
    this.select = $('<select>');

    for( var i = 0; i < this.tabs.length; i++)
    {
      this.tabs[i].id = i;

      this.select.append($('<option>').attr("value",i).text(this.tabs[i].text+' ▾'));


      // Tab
      var tab = $('<div>');
      tab.attr('tab',i);
      tab.addClass('tab');
      tab.css(
        {
          'cursor': 'pointer',
          'height': '100%',
          'padding-left': '4vw',
          'padding-right': '4vw',
          'display': 'flex',
          'flex-direction': 'column',
          'align-items': 'center',
          'justify-content': 'center',
          'position': 'relative'
        }
      )

      // When tab is clicked
      tab.click({conf:this.conf,tab:this.tabs[i],tabs:this.tabs},function(event)
      {
        // If it is the current tab
        if(event.data.tab.id == event.data.conf.currentTab)
          return;

        // Stores the current state
        event.data.conf.currentTab = event.data.tab.id;

        // Hides the select indicator
        for( var x = 0; x < event.data.tabs.length; x++)
          event.data.tabs[x].html.selectIndicator.hide(128);

        // Shows the current select indicator
        event.data.tab.html.selectIndicator.show(128);

        // Runs the tab function
        event.data.tab.onClick();
      });

      // Tab text
      var text = $('<div>');
      text.addClass('text');
      text.css({'color':'#444'})
      text.html(this.tabs[i].text);

      // Tab select indicator
      var selectIndicator = $('<div>');
      selectIndicator.addClass('selectIndicator');

      var isDefaultTab = 'none';
      if('default' in this.tabs[i])
        isDefaultTab = 'block';

      selectIndicator.css({
        'display':isDefaultTab,
        'position':'absolute',
        'bottom':'0',
        'width':'100%',
        'height':'4px',
        'background': '#444'
      });

      // Adds the text and indicator to the tab
      tab.append(text);
      tab.append(selectIndicator);

      // Stores the html references
      this.tabs[i].html = {};
      this.tabs[i].html.tab = tab;
      this.tabs[i].html.text = text;
      this.tabs[i].html.selectIndicator = selectIndicator;

      this.container.append(tab);

      if('default' in this.tabs[i])
      {
        this.tabs[i].onClick();
        this.select.val(i)
      }


    }

    this.select.addClass('btn');
    this.select.css({
      'border':'none',
      'background':'none',
      'padding-left':'40px',
      'outline':'none',
      '-webkit-appearance':'none',
      'font-size':'16px',
      'text-align':'center',
      'color':'#444'
    })

    this.container.append(this.select);
    this.select.on("change",this.selectChanged.bind(this));

    if(this.responsive)
      this.toMobile();
    else
      this.toDesktop();

  }
}
