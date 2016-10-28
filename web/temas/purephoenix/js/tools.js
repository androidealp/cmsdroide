jQuery(function($){

  // enable selec2
  $('select').select2();

  

  function execAjax(boxid, getUrl,form=0, before = 0, getSuccess=0)
  {
    getData = "";
    if(typeof form == 'object'){
      getData = form.serializeArray();
    }

    if(!before){
      before = function()
      {

      }
    }

    if(!getSuccess){
      getSuccess = function(data)
      {
        boxid.appendTo(data);
      }
    }

    $.ajax({
      url:getUrl,
      data:getData,
      beforeSend:before,
      success:getSuccess
    });
  }

  $(document).on('click','[data-cloneadd]',function(e){
    e.preventDefault();
    var button = $(this);
    var getid = $(button.data('cloneadd'));


  });
});
