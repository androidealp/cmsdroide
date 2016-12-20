jQuery(function($){

  $('[data-toggle="tooltip"]').tooltip();


invoqueForm = function($list){
  if(typeof $list.select2 != 'undefined')
  {

    function format(state) {

          Search = ">>>";

          if (!state.id) return state.text; // optgroup

          if(state.text.indexOf(Search) !== -1)
          {
            state.text = state.text.replace(">>>", "");

            var $state = $(
              '<span><strong><i class="fa fa-arrow-circle-o-right icon-select"></i> </strong>' + state.text + '</span>'
            );

          }else{
            var $state = $(
              '<span>' + state.text + '</span>'
            );
          }

          return $state;
      }

    $('select').select2({
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) { return m; }
      });

  }

  if(typeof $list.truefalse != 'undefined')
  {
    $('[data-truefalse]').checkboxpicker({
      defaultClass: 'btn-default',
      disabledCursor: 'not-allowed',
      offClass: 'btn-danger',
      onClass: 'btn-success',

      });
  }

  $('textarea').keydown(function(e){
    if(e.keyCode === 9) {
      var $this = $(this);
      var value = $this.val();

      if(value == 'lorem')
      {
        $this.val('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
      }

    }
  });


};


invoqueForm({
  'select2':1,
  'truefalse':1
});


  toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut",
  "onHidden":function()
  {
    location.reload();
  }
}


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


  function aplicarAjaxSingle(bt,getUrl, serializado,IconTrue,IconFalse )
  {
    $.ajax({
				url:getUrl,
				data:serializado,
				datatype:'json',
				method:'post',
				beforeSend:function(){
					bt.html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>');
				},
				success:function(data){

          toastr.options.onHidden = function()
          {
            console.log('sem load');
          }

					if(data.type != 'success'){
						toastr.options.timeOut= 5000;
						toastr[data.type](data.msg);
					}else{
            if(typeof data.msg != 'undefined')
            {
              toastr[data.type](data.msg);
            }

          }


					if(data.bttruefalse){
						bt.html(IconTrue);
					}else{
							bt.html(IconFalse);
					}

				}

			});

  }


  


  $(document).on('click','[data-btajaxsingle]',function(e){
		e.preventDefault();
		var bt = $(this);
		getUrl = bt.data('btajaxsingle');
		IconTrue =  bt.data('icontrue');
		IconFalse  =  bt.data('iconfalse');
    getdata = $(bt.data('serialize'));
    confirm = bt.data('comfirm');
    var serializado = {};
    if(typeof getdata == 'object')
    {
        serializado = getdata.serializeArray();
    }
    console.log(confirm);
    if(typeof confirm == 'string')
    {
      var options = {
              message: confirm,
              title: 'Cuidado!',
          };


      eModal.confirm(options)
            .then(function(){
              aplicarAjaxSingle(bt,getUrl, serializado,IconTrue,IconFalse );
            }, function(){
              return;
            });

    }else{
      aplicarAjaxSingle(bt,getUrl, serializado,IconTrue,IconFalse );
    }


	});
	// fim btajassingle

  $(document).on('click','[data-ajaxsave]',function(e){
      	e.preventDefault();

        var button = $(this);
        var To_url = button.data('ajaxsave');
        var resgatehtmlbt = button.html();
        var content = $(button.data('content'));
        $.ajax({
          url:To_url,
          datatype:'json',
          method:'post',
          data:content.find('input').serialize(),
          beforeSend:function()
          {
            $.each(content.find('input'),function(i,v){
                $(this).attr('disabled',true);
            });
            button.attr('disabled',true);

            button.html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw" style="color:#fff;"></i>');
          },
          success:function(data){
            if(typeof data != 'undefined')
            {

              toastr.options.onHidden = function()
              {
                console.log('sem load');
              }

              if(data.type != 'success'){
    						toastr.options.timeOut= 5000;

                $.each(content.find('input'),function(i,v){
                    $(this).attr('disabled',false);
                });

                button.html(resgatehtmlbt);
                button.attr('disabled',false);
    					}else{
                toastr.options.timeOut= 3000;
                content.html('<p class="text-info">'+data.msg+'</p>');

              }

              toastr[data.type](data.msg);

            }else{
              console.log('erro encontrado');
              console.log(data);
            }
          }
        })

  });

  $(document).on('click','[data-ajaxrender]',function(e){
    e.preventDefault();
    var button = $(this);
    var url = button.data('ajaxrender');
    var content = $(button.data('content'));
    resgateicontext = button.html();
    button.html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>');

    $.get(url,function(data){
      content.html(data);
      button.html(resgateicontext);
    });

  });
});
