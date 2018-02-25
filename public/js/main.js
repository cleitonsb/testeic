$(document).ready(function(){
	
	/*
	$.ajax({
		url: ambiente+"/admin/usuarioetapa/atualiza",
		method: "POST",
		asysnc: false,
		cache: false,
	    dataType: "json",
	    data: {
	    	qt		  	   : qt,
	    	idusuarioetapa : idusuarioetapa,
	    	tempocarga	   : tempocarga,
	    },
	    beforeSend: function() {
	    	$("#loader").show();
	    }
	}).done(function (data, status, jqXHR) {
		if(status == "success"){
			if(data.erro !== undefined){ 
				modaln("Erro ao registrar a produção! Tente novamente.","erro"); 
			}else{ 
				
				localStorage.removeItem('idProdutividade');
				
				if(data.sucesso == "true"){
					buscaProdutividade();
											
					if(localStorage.getItem("finaliza") == "true"){ 
						buscaUsuariosetapa(function(r){
							buscaDadosof();
						});
					}						
				}
			}				
		}else{
			modaln("Erro ao registrar a produção! Tente novamente.","erro");
		}
		
		$("#qtproduzido").val("");
		$("#loader").hide();
		
	}).fail(function (jqXHR, status) {
		console.log(status);
	    console.log(jqXHR.status);
	    
	    $("#loader").hide();	    
	    modaln("Erro ao registrar a produção!","erro");	    
	});*/
	
});
