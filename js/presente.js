function AddProduto(id){
  $.post( "./ajax/addItem.php",{id_item:id}, function( data ) {
  data=JSON.parse(data);
  if(data.estado){
      Materialize.toast('Produto adicionado com sucesso!', 4000);
  }else{
      Materialize.toast('Parece que o produto já foi adicionado!', 4000);
  }
 
});
}