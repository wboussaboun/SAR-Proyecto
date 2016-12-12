function buscarAjax(){
	if($("#producto").val()!=''){
		$(document).ready(function(){
        $.ajax({url: "busquedaAjax.php?producto="+$("#producto").val(), success: function(result){$("#results").html(result);}});
        });}
}