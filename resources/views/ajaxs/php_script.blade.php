<script>  
//role delete options
function callModal(selector){
  var options='<?php if(isset($options)){ echo $options; } ?>'; 
  var my_obj = $('#del-form');
  var my_action = my_obj.attr('action');
  var my_id = selector;
  var my_actions = my_action.replace("remove-id", my_id);
  my_obj.attr('action', my_actions);
  $('#selectBox').empty();
  $("#selectBox").append(options);
  $("#selectBox option[value='"+my_id+"']").remove();
}

$(document).ready(function($) {
    $("#trip_id").change(function() {
        var trip_slug = $(this).val();
        $.ajax({
          type: "get",
          url:"{{ route('ajax.getexcursions') }}",
          data:{trip_slug:trip_slug},
          success: function(data){
          var x='';
          if(data.length != 0){
          for (var key in data) {
          if (data.hasOwnProperty(key)) {
          x +='<span> <input type="checkbox" name="excursion_ids[]" value="'+key+'"> '+data[key]+'</span> &nbsp; ';
          }
          }
          $('#excursions').html(x);
          }else{
            $('#excursions').html("No excursions avilable for this trip");
          }

          }
      });
    });

       $("#ship_id").change(function() {
        var ship_slug = $(this).val();
        var ship_id = $("#"+ship_slug).data("id");
        $("#new_ship_id").val(ship_id);
        //alert(ship_id);
    });

});

</script>