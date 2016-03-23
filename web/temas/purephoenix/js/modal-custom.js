 (function ($, Elementos){

$(document).ready(function(){

	eModal.setEModalOptions({
    loadingHtml: '<span class="fa fa-circle-o-notch fa-spin fa-3x text-primary"></span><h4>Loading</h4>',
});

 Elementos ={};
 pajaxid='';

	function salvar(){

		if(Elementos != ''){
			form = $('#'+Elementos);
			var commandeditor = [];
			var data_save = form.serializeArray();

			$.each(form.find('[data-ckecommand]'),function(index,value){
				commandeditor.push(eval($(this).data("ckecommand")));
			});

			data_save.push({ name: "editor", value: commandeditor });

			$.ajax({
				url:form.attr('action'),
				//data:form.serialize(),
				data:data_save,
				datatype:'json',
				method:'post',
				beforeSend:function(){
					form.find('input').attr('disabled');
				},
				success:function(data){

					if(data.type.type == 'success'){

						 $.pjax.reload({container:"#"+pajaxid});
							eModal.close();
						$.notify(data.msn,data.type);
					}else{

						var body = $(".modal");
						body.stop().animate({scrollTop:0}, '1000', 'swing', function() {

						   form.find('#erros').html("<div class='alert alert-danger'>"+data.msn.message+"</div>").fadeIn('slow');
						})



					}

				},
				error:function(xhr, ajaxOptions, thrownError){
					console.log('xhr:'+xhr+' ajaxoptions:'+ajaxOptions+' thrownError:'+thrownError);
				}

			});
		}else{
			console.log('nao foi detectado o elemento');
		}

	}


	function deletar(url,dados,idcategoria){

		$.ajax({
				url:url,
				data:{'del-list':dados},
				datatype:'json',
				method:'post',
				beforeSend:function(){

				},
				success:function(data){

					if(data.type.type == 'success'){

						 $.pjax.reload({container:"#"+idcategoria});
							eModal.close();
					}
					$.notify(data.msn,data.type);

				}

			});
	}

  $(document).on('click','[data-btedturl]',function(e){
    e.preventDefault();
    Elementos 	= $(this).data('formid');
    sizemd 		= eModal.size.md;
		sizemodalbt = $(this).data('modalsize');
		pajaxid     = $(this).data('pajaxid');
    if(sizemodalbt == 'lg'){
			sizemd = eModal.size.lg;
		}else if(sizemodalbt == 'sm'){
			sizemd = eModal.size.sm;
		}else if(sizemodalbt == 'xl'){
			sizemd = eModal.size.xl;
		}

    var options = {
	        url: $(this).data('btedturl'),
	        title:$(this).prop('title'),
	        size: sizemd,
	        //subtitle: 'smaller text header',
	        buttons: [
	            {text: 'Editar', style: 'info',   close: false, click: salvar },
	            {text: 'Fechar', style: 'danger', close: true}
	        ],
	    };

      eModal.ajax(options);
  });

	$(document).on('click','[data-btaddurl]',function(e){
		e.preventDefault();

		Elementos 	= $(this).data('formid');
		sizemd 		= eModal.size.md;
		sizemodalbt = $(this).data('modalsize');
		pajaxid     = $(this).data('pajaxid');

		if(sizemodalbt == 'lg'){
			sizemd = eModal.size.lg;
		}else if(sizemodalbt == 'sm'){
			sizemd = eModal.size.sm;
		}else if(sizemodalbt == 'xl'){
			sizemd = eModal.size.xl;
		}


		var options = {
	        url: $(this).data('btaddurl'),
	        title:$(this).prop('title'),
	        size: sizemd,
	        //subtitle: 'smaller text header',
	        buttons: [
	            {text: 'Salvar', style: 'info',   close: false, click: salvar },
	            {text: 'Fechar', style: 'danger', close: true}
	        ],
	    };

		//var url = $(this).data('btaddurl');
		eModal.ajax(options);
	});

	$(document).on('click','[data-btdelurl]',function(e){
		e.preventDefault();
		var gridid 		= $(this).data('gridid');
		var elementos 	= $('#'+gridid).yiiGridView('getSelectedRows');
		var confirmtext	= $(this).data('btconfirm');
		var url			= $(this).data('btdelurl');
		var ajaxid      = $(this).data('pajaxid');

		sizemd 		= eModal.size.md;
		sizemodalbt = $(this).data('modalsize');

		if(sizemodalbt == 'lg'){
			sizemd = eModal.size.lg;
		}else if(sizemodalbt == 'sm'){
			sizemd = eModal.size.sm;
		}else if(sizemodalbt == 'xl'){
			sizemd = eModal.size.xl;
		}

		var options = {
		        message: confirmtext,
		        title: 'Cuidado!',
		        size: sizemd,
		    };


		eModal.confirm(options)
		      .then(function(){
		      	deletar(url,elementos,ajaxid);
		      }, function(){
		      	return;
		      });


		/*
		var options = {
	        url: $(this).data('btaddurl'),
	        title:$(this).prop('title'),
	        size: eModal.size.md,
	        //subtitle: 'smaller text header',
	        buttons: [
	            {text: 'Salvar', style: 'info',   close: false, click: salvar },
	            {text: 'Fechar', style: 'danger', close: true}
	        ],
	    };

		//var url = $(this).data('btaddurl');
		eModal.ajax(options);*/
	});

});

} (jQuery));
