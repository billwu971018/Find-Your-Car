
$(document).ready(function(){

    //get colors
  $.ajax({
     async:false,
     type:"post",
     url:"get-color.php",
     data:{id:1},  //一级产品类别的父ID
     success:function(data){
       $("#colors").empty();
      $("#colors").append("<option value= '' data-id='0'>All Colors</option>")
      for(var i=0;i<data.length;i++){
        $("#colors").append("<option value='"+data[i]+"' data-id='"+data[i]+"'>"+data[i]+"</option>");
      } 
     }
   });

  //get makes
  $.ajax({
     async:false,
     type:"post",
     url:"get-make.php",
     data:{id:1},  //一级产品类别的父ID
     success:function(data){
       $("#makes").empty();
      $("#makes").append("<option value= '' data-id='0'>All Makes</option>")
      for(var i=0;i<data.length;i++){
        $("#makes").append("<option value='"+data[i]+"' data-id='"+data[i]+"'>"+data[i]+"</option>");
      } 
     }
   });



  //get model by make
  $('#makes').change(function () {
    var options=$("#makes option:selected");
    var value=options.data("id");
    alert(value);
    $.ajax({
      async:false,
      type:"get",
      url:"get-model.php",
      data:{make:value}, //二级产品类别的父ID
      success:function(data){
        $("#models").empty();
        $("#models").append("<option value= '' data-id='0'>All Models</option>")
        for(var i=0;i<data.length;i++){
          $("#models").append("<option value='"+data[i]+"' data-id='"+data[i]+"'>"+data[i]+"</option>");
        }
      }
    }) 
  });


});
