jQuery(function($){

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
  // "onHidden":function()
  // {
  //   location.reload();
  // }
}

$(document).on('click','[data-submit]',function(e){
	 e.preventDefault();
	  bt = $(this);
	  form = $(bt.data('submit'));
		bt.html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
    var fields = form.find('.form-control');

		form.submit();


});

$(document).on('click','[data-modalajax]',function(e){
	e.preventDefault();
	var bt = $(this);
	var getUrl = bt.data('modalajax');
	var getSize = eModal.size.sm;
	console.log(getSize);
	var options = {
        url: getUrl,
        title:bt.prop('title'),
        size: getSize,
        buttons: false,
    };

eModal.ajax(options);

});

	var formcomentarios = $('#form-comentarios'); // Encapsula o fomulario de comentários
	var listitens = $('[data-list]'); // Lista de cometarios
	formcomentarios.hide();

	// function render(url)
	// {
	// 	$.ajax({
	// 		url: tourl,
	// 		data:serialize,
	// 		beforeSend:function()
	// 		{
	// 			form.find('#ver').html('renderizando....');
	// 		},
	// 		success:function(data){
	// 			form.find('#ver').html(data);
	// 		}
	// 	});
	// }


	function salvar(serialize, form, tourl)
	{

		$.ajax({
			url: tourl,
			data:serialize,
			dataType:'json',
			method:'post',
			beforeSend:function()
			{
				$.each(form.find('.form-control'),function(i,v){
					$(this).attr('disabled',true);
				});
			},
			success:function(data){

				$.each(form.find('.form-control'),function(i,v){
					$(this).attr('disabled',false);
				});

				if(data.type == 'error')
				{
					toastr[data.type](data.msg);

				}else{
					$(form)[0].reset();
						form.find('#alert-msg').html('<div class="alert alert-'+data.type+'">'+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data.msg+' </div>');
				}



			}
		});

	}


$(document).on('click','[data-savecoment]',function(e){

	e.preventDefault();
	var bt = $(this);
	var url = bt.data('savecoment');
	var ajaxid = $(bt.data('ajaxid'));
	var preservBT = bt.html();
	bt.html('<i class="fa fa-refresh fa-spin fa-fw"></i>');

	var $form = ajaxid.find('form');
	var serialize = $form.serializeArray();




	$.each($form.find('.form-control'),function(i,v){
		$(this).attr('disabled',true);
	});

	$.ajax({
		url: url,
		data:serialize,
		dataType:'json',
		method:'post',
		success:function(data){

			console.log(data);
			if(typeof data == 'object')
			{
				if(data.type == 'error')
				{
						toastr[data.type](data.msg);
						$.each($form.find('.form-control'),function(i,v){
							$(this).attr('disabled',false);
						});
						bt.html(preservBT);
				}else{
					html = "<div class='alert alert-"+data.type+"'>"+data.msg+"</div>";

					ajaxid.html(html);
				}

			}

		}
	});



});

$(document).on('click','[data-ajaxrender]',function(e){
	e.preventDefault();
	var bt = $(this);
	var url = bt.data('ajaxrender');
	var ajaxid = $(bt.data('ajaxid'));
	var preservBT = bt.html();

	bt.html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
	$.get(url,function(data){
			ajaxid.html(data);
			ajaxid.fadeIn('slow',function(){
					bt.html(preservBT);
			});

	} );

});


// Função pra redimencionar os itens do blog
function equal_cols(el)
{
    var h = 0;
    $(el).each(function(){
        $(this).css({'height':'auto'});
        if($(this).outerHeight() > h)
        {
            h = $(this).outerHeight();
        }
    });
    $(el).each(function(){
        $(this).css({'height':h});
    });
}

$(document).ready(function(){
   equal_cols('.defaul-size-item');
});


/*Exibe o modal caso o usuario não esteja logado para comentar*/
function exibeModal(){
	$('#modalLogin').modal('show');
	listitens.empty().html("<p>Inserri lista de postas</p>");
}

function atualizaListCometarios(e){
	listitens.empty().html("<p>Inserri lista de postas</p>");
}


$(document).on('click','[data-comentario]',function(e){
		e.preventDefault();
		var bt = $(this);
		var url = bt.data('url');
		var form = $(bt.data('comentario'));

		serialize = form.serializeArray();
		salvar(serialize, form, url);
	});


$(document).on('click', '[data-newsletter]', function(e){
	e.preventDefault();
	var encp = $(this);
	var form = $(encp.data('newsletter'));
	var url = encp.data('url');
	serialize = form.serializeArray();

	salvar(serialize, form, url);

	});

$(document).on('click', '[data-compartilhe]', function(e){
	e.preventDefault();
	var encp = $(this);
	var form = $(encp.data('compartilhe'));
	var url = encp.data('url');
	serialize = form.serializeArray();

	// console.log(JSON.stringify(serialize));
	salvar(serialize, form, url);

	});
});
