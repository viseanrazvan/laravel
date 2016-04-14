$(document).ready(function(){
  $('#category').change(function(){
    $.ajax({
      url: "masini/filter/",
      method: "get",
      data:{
        categoryId: $('#category').val(),
        weightId: 0,
        fabricationYear: '',
        model: ''
      },
      success: function(data){
        $(".table").replaceWith(data);
        if($(".table tr").length > 1 ){
          $('.weight').show();
          
        } else {
          $('.weight').hide();
        }
        $('.fabricationYear').hide();
        $('.model').hide();
      }
    });
  });
  
  $('#weight').change(function(){
    $.ajax({
      url: "masini/filter/",
      method: "get",
      data:{
        categoryId: $('#category').val(),
        weightId: $('#weight').val(),
        fabricationYear: '',
        model: ''
      },
      success: function(data){
        $(".table").replaceWith(data);
        if($(".table tr").length > 1 ){
          $('.fabricationYear').show();
        } else {
          $('.fabricationYear').hide();
        }
        $('.model').hide();
      }
    });
  });
  
  $('#fabricationYear').change(function(){
    $.ajax({
      url: "masini/filter/",
      method: "get",
      data:{
        categoryId: $('#category').val(),
        weightId: $('#weight').val(),
        fabricationYear: $('#fabricationYear').val(),
        model: ''
      },
      success: function(data){
        $(".table").replaceWith(data);
        if($(".table tr").length > 1 ){
          $('.model').show();
        } else {
          $('.model').hide();
        }
      }
    });
  });
  
  $('#model').change(function(){
    $.ajax({
      url: "masini/filter/",
      method: "get",
      data:{
        categoryId: $('#category').val(),
        weightId: $('#weight').val(),
        fabricationYear: $('#fabricationYear').val(),
        model: $('#model').val()
      },
      success: function(data){
        $(".table").replaceWith(data);
      }
    });
  });
  
  $('#addCarBtn').click(function(){
    $.ajax({
      url: 'masini/addCar/',
      method: 'get',
      data: $('form').serialize(),
      success: function(data){
        $('.addError').remove();
        if(data == 'error'){
          $( "form" ).prepend( "<span class='addError' style='color: red;'><b>Eroare la introducerea datelor </b></span>" );
        } else {
          $(".table").replaceWith(data);
          $("form").find('input').val("");
          $("form").find('select').val("");
        }
      }
    });
  });
  
});