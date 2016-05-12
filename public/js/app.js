
$(document).ready(function(){
  $('#weel').click(function(event ){
    event.stopPropagation();
    $.ajax({
      dataType: "json",
      url: _base_path+"/json/scanfolder/documents",
      context: document.body
    }).done(function(data) {
      //console.log('done');
      if(data.success == true){
        location.reload();
      }
    }).fail(function(  ) {
    });
  });
});
