/*
* Droide-ajaxprocess
* Divide processos de execução via ajax em subrotinas definidas no servidor.
* @author André Luiz Pereira and4563@gmail.com
*/
$( function() {
  // envent on load or click
  $.fn.droideProcess = function(options) {

    defaults = {
      event:'click',
      elementClick:'[data-ajaxproc]',
      getUrl: 0,
      getData:0,
      dataForm:'',
      enableShow:0,
      element:0,
      method:'post',
      timeout:null, // milliseconds
      textTimeout:'<p class="text-danger">Ops! Seu processo esgotou o tempo de execução.</p>',
      beforeSend:function(){
      },
      json:{"process":0,"text":"Iniciando processo de instalação..."},
      progress:function(json = ''){
        return '<div class="text-center">'+json.process+'% '+json.text+'</div><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'+json.process+'" aria-valuemin="0" aria-valuemax="100" style="width:'+json.process+'%"> <span class="">'+json.process+'% '+json.text+'</span> </div></div>';
      }
    };

    var settings = $.extend(defaults, options );
    settings.element = this;
    settings.getData.stopExec = 0;
      if(settings.event == 'load'){
        settings.element.html(settings.progress(settings.json));
        if(settings.enableShow == 1)
          {
            settings.element.show('slow');
          }
        _sendAjax(settings, settings.element);
      }else{

        $(document).on(settings.event,settings.elementClick,function(e){
          e.preventDefault();


          settings.element.html(settings.progress(settings.json));

          if(settings.enableShow == 1)
            {
              settings.element.show('slow');
            }
          if(settings.dataForm){

            form = (typeof settings.dataForm == 'string')?$(settings.dataForm):settings.dataForm;
            settings.getData = form.serializeArray();


          }

          _sendAjax(settings, settings.element);
        });
      }

  };



  function _sendAjax(settings = {}, myObject = this)
  {

    if(!settings.getData.stopExec){

      $.ajax({
        url:settings.getUrl,
        data:settings.getData,
        method:settings.method,
        dataType:'JSON',
        timeout:settings.timeout,
        beforeSend:settings.beforeSend.call(myObject),
        error:function(jqXHR, textStatus, errorThrown){
          if(textStatus == 'timeout'){
              myObject.html(settings.textTimeout);
          }

        },
        success:function(data){
          if(typeof data == 'object'){
            if(typeof data.json == 'undefined')
            {
              myObject.html(data.mensagem);
            }else{
              myObject.html(settings.progress(data.json));

            }

            if(typeof data.getData != 'undefined'){
               settings.getData  = data.getData;

            }else{
              console.log(data);
            }

             _sendAjax(settings,myObject);
          }// detecto o tipo
        }
      });

    } // fim do if

  }

});
