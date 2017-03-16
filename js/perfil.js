function ExcluirLista(id){
  $.post( "./ajax/excluirItem.php",{id_item:id}, function( data ) {
  data=JSON.parse(data);
  if(data.estado){
      Materialize.toast('Produto excluido com sucesso!', 4000);
      $("#"+id).remove();
  }else{
      Materialize.toast('Parece que o produto já foi excluido!', 4000);
      $("#"+id).remove();
  }
 
});  
}
function EditarNome(id){
    
}
