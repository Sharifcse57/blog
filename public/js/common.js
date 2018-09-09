$('body').on('focus', ".datepicker", function() {
    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
});

//http://trentrichardson.com/examples/timepicker/
$('body').on('focus', ".datetimepicker", function() {
    $(this).datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: ' hh:mm:ss tt' });
});

//http://trentrichardson.com/examples/timepicker/
$('body').on('focus', ".timepicker", function() {
    $(this).datetimepicker({ timeFormat: ' hh:mm:ss tt' });
});


jQuery.fn.ForceNumericOnly = function() {
    return this.each(function() {
        $(this).keydown(function(e) {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

$('body').on('focus', "input[type='number']", function() {
    var tis = $(this);
    tis.ForceNumericOnly();
    tis.on('mousewheel', function(e) { $(this).blur(); });
    if (tis.val() < 0) {
        tis.val('0');
    }
});

function putMinToZerro() {
    $("input[type='number']").attr('min', '0');
}

/* ............for delete button start...................*/
$(document).on('submit', '.delete-form', function() {
    return confirm('Are you sure?');
});

/* ............for delete button end...................*/

function callOthers(selector) {
    var val = $(selector).val();
    if (val == 6) {
        $('#others').slideDown();
    } else {
        $('#others').slideUp();
    }

}

function callYes(selector) {
    var val = $(selector).val();
    if (val == 'yes') {
        $('#yes').slideDown();
    } else {
        $('#yes').slideUp();
    }

}



$(document).on('change', '.numbers', function() {
    var total = 0;
    $(".numbers").each(function(index) {
        var value = parseInt($(this).val());
        if (!isNaN(value)) {
            total += value;
        }
    });
    $('#total').val(total).change();
});




function compareTotal() {
    var obj = $('#total');
    var obj2 = $('#total2');
    var obj3 = $('#buttonToBeDissable');
    if (obj.val() != obj2.val()) {
        obj.css({ 'border-style': 'solid', 'border-width': '1px', 'border-color': 'red' });
        obj2.css({ 'border-style': 'solid', 'border-width': '1px', 'border-color': 'red' });
        obj3.prop('disabled', true);
    } else {
        obj.css({ 'border-style': 'solid', 'border-width': '1px', 'border-color': '' });
        obj2.css({ 'border-style': 'solid', 'border-width': '1px', 'border-color': '' });
        obj3.prop('disabled', false);
    }
}


/* -- start User role permission check box true false control -- */
function permission_select_deselect_child(selector) {
    var check;
    if ($(selector).is(':checked') === false) {
        check = false;
    } else {
        check = true;
    }
    if ($(selector).parent().parent().hasClass('controller') === true) {
        var action_ul = $(selector).parent().parent().next('div.action-wraper');
        $.each(action_ul.children('.actions'), function(ind, val) {
            var cur_check_box = $(val).children().children('input');
            $(cur_check_box).prop('checked', check);
        });
    }
}

function permission_select_parent(selector) {
    var check = $('.' + selector).is(':checked');
    $('.parent_' + selector).prop('checked', check);
}
/* -- End User role permission check box true false control -- */

var radioChange = function(name, vall) {
    if (name == 'first_time' && vall == '1') {
        $("input[type='radio'][name='continue_next'][value='0']").prop('checked', true);
    } else if (name == 'first_time' && vall == '0') {
        $("input[type='radio'][name='continue_next'][value='1']").prop('checked', true);
    } else if (name == 'continue_next' && vall == '1') {
        $("input[type='radio'][name='first_time'][value='0']").prop('checked', true);
    } else {
        $("input[type='radio'][name='first_time'][value='1']").prop('checked', true);
    }
};

$(document).ready(function() {
    $('.glyphicon-edit').attr("title", "Edit");
    $('.glyphicon-edit').tooltip();

    $('.glyphicon-eye-open').attr("title", "View");
    $('.glyphicon-eye-open').tooltip();

    $('.glyphicon-plus').attr("title", "Add");
    $('.glyphicon-plus').tooltip();

    $('.glyphicon-send').parent().attr("title", "Send");
    $('.glyphicon-send').parent().tooltip();

    $('.glyphicon-remove').parent().attr("title", "Delete");
    $('.glyphicon-remove').parent().tooltip();

    putMinToZerro();

    /*All active link select for navigation*/
var parentAllClass = $(".in").attr("class")||'default';
if(parentAllClass!=='default'){
parentAllClass = parentAllClass.replace("panel-collapse collapse in ", "");
$("li#" + parentAllClass + ' a').css("color", "red");
}

});





// required validation for safari
$('#modalForm').click(function(e) {
    e.preventDefault();
    var sendModalForm = true;
    $('[required]').each(function() {
        if ($(this).val() === '') {
            sendModalForm = false;
            alert("Required field should not be blank."); // or $('.error-message').show();
        }
    });

    if (sendModalForm) {
        this.form.submit();
    }
});


function readURL(input) {   
    var preview_location = $(input).parent().parent().find('.preview-div');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview_location.html('<img class="img-responsive" width="70" src="' + e.target.result + '">');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function reindexing(className){   
    $('.re-index').each(function(index,val){       
         var img= $(this).find(".reindex-"+className);
         img.attr('name',className+'['+index+']');       
    });
}

function returnHightlightHtml(){
    var parentsHtml ='<div class="form-group table-responsive re-index">\
        <table border="0" class="col-sm-8 col-sm-offset-1">\
          <tbody><tr>\
            <td width="20%">&nbsp;</td>\
            <td width="50%"><input type="file" name="img[]" onchange="readURL(this)" class="reindex-img"></td>\
            <td width="20%">\
            <button type="button" onclick="addMoreImg(this)" class="btn btn-success"><i class="glyphicon glyphicon-plus" title="" data-original-title="Add"></i></button>\
            <button type="button" onclick="removeMoreImg(this)" class="btn btn-danger" title="" data-original-title="Delete"><i class="glyphicon glyphicon-remove"></i></button></td>\
            <td width="10%"><div class="preview-div"></div></td>\
          </tr>\
          <tr>\
            <td>&nbsp;</td>\
            <td><input type="text" name="image_alt[]" placeholder="image Alt" class="form-control reindex-image_alt"> <br>    <input type="text" name="caption[]" placeholder="image Caption" class="form-control reindex-caption"></td>\
            <td>&nbsp;</td>\
            <td>&nbsp;</td>\
          </tr>\
        </tbody></table>\
    </div>';
    return  parentsHtml;
}

function addMoreImg(selector){
    var parent=$(selector).parents().eq(4);
    parent.after(returnHightlightHtml());
    reindexing('img');
    reindexing('image_alt');
    reindexing('caption');
}

function removeMoreImg(selector){
    $(selector).parents().eq(4).remove();
    reindexing('img');
    reindexing('image_alt');
    reindexing('caption');
}

function returnExcursionHtml(){
    var parentsHtml ='<div class="form-group table-responsive re-index">\
        <table border="0" class="col-sm-8 col-sm-offset-1">\
          <tbody><tr>\
            <td width="20%">&nbsp;</td>\
            <td width="50%"><input type="file" name="img[]" onchange="readURL(this)" class="reindex-img"></td>\
            <td width="20%">\
            <button type="button" onclick="addExcursionImg(this)" class="btn btn-success"><i class="glyphicon glyphicon-plus" title="" data-original-title="Add"></i></button>\
            <button type="button" onclick="removeExcursionImg(this)" class="btn btn-danger" title="" data-original-title="Delete"><i class="glyphicon glyphicon-remove"></i></button></td>\
            <td width="10%"><div class="preview-div"></div></td>\
          </tr>\
          <tr>\
            <td>&nbsp;</td>\
            <td><input type="text" name="image_alt[]" placeholder="image Alt" class="form-control reindex-image_alt"> </td>\
            <td>&nbsp;</td>\
            <td>&nbsp;</td>\
          </tr>\
        </tbody></table>\
    </div>';
    return  parentsHtml;
}

function addExcursionImg(selector){
    var parent=$(selector).parents().eq(4);
    parent.after(returnExcursionHtml());
    reindexing('img');
    reindexing('image_alt');
    reindexing('old_img');
}

function removeExcursionImg(selector){
    $(selector).parents().eq(4).remove();
    reindexing('img');
    reindexing('image_alt');
    reindexing('old_img');
}

function addFeature(selector){
    var parent=$(selector).parents().eq(2);
    var html = '<div class="form-group my-control re-index">\
    <div class="col-md-2"></div>\
    <div class="col-md-7">\
        <div class="col-md-3">\
            <div class="media-left media-middle">\
                <button class="btn btn-primary btn-xs add-data" type="button" data-target="#changeIcon" data-toggle="modal"><i class="glyphicon glyphicon-plus" data-original-title="Add" title=""></i> icon</button>\
            </div>\
            <div class="media-right media-middle icon-preview"></div>\
            <input class="icon-input reindex-feature_icon" type="hidden" name="feature_icon[]">\
        </div>\
        <div class="col-md-7">\
            <input class="form-control reindex-feature_list" type="text" name="feature_list[]">\
        </div>\
        <div class="col-md-2 input-group-btn">\
            <button type="button" onclick="addFeature(this)" class="btn btn-success"><i class="glyphicon glyphicon-plus" title="" data-original-title="Add"></i></button>\
            <button type="button" onclick="removeFeature(this)" class="btn btn-danger" title="" data-original-title="Delete"><i class="glyphicon glyphicon-remove"></i></button></td>\
        </div>\
    </div>\
</div>';
     parent.after(html);
    reindexing('feature_icon');
    reindexing('feature_list');

}

function removeFeature(selector){
    $(selector).parent().parent().parent().remove();
    reindexing('feature_icon');
    reindexing('feature_list');
}

function returnShipSliderHtml(){
    var parentsHtml ='<div class="form-group table-responsive re-index">\
        <table border="0" class="col-sm-8 col-sm-offset-1">\
          <tbody><tr>\
            <td width="20%">&nbsp;</td>\
            <td width="50%"><input type="file" name="slider_img[]" onchange="readURL(this)" class="reindex-slider_img"></td>\
            <td width="20%">\
            <button type="button" onclick="addShipSliderImg(this)" class="btn btn-success"><i class="glyphicon glyphicon-plus" title="" data-original-title="Add"></i></button>\
            <button type="button" onclick="removeShipSliderImg(this)" class="btn btn-danger" title="" data-original-title="Delete"><i class="glyphicon glyphicon-remove"></i></button></td>\
            <td width="10%"><div class="preview-div"></div></td>\
          </tr>\
        </tbody></table>\
    </div>';
    return  parentsHtml;
}

function addShipSliderImg(selector){
    var parent=$(selector).parents().eq(4);
    parent.after(returnShipSliderHtml());
    reindexing('slider_img'); 
    reindexing('old_slider_img'); 
}
function removeShipSliderImg(selector){
    $(selector).parents().eq(4).remove();
    reindexing('slider_img');   
    reindexing('old_slider_img');
}

function returnShipDeckHtml(){
    var parentsHtml ='<div class="form-group table-responsive re-index">\
        <table border="0" class="col-sm-8 col-sm-offset-1">\
          <tbody><tr>\
            <td width="20%">&nbsp;</td>\
            <td width="50%"><input type="file" name="deck_img[]" onchange="readURL(this)" class="reindex-img"></td>\
            <td width="20%">\
            <button type="button" onclick="addShipDeckImg(this)" class="btn btn-success"><i class="glyphicon glyphicon-plus" title="" data-original-title="Add"></i></button>\
            <button type="button" onclick="removeShipDeckImg(this)" class="btn btn-danger" title="" data-original-title="Delete"><i class="glyphicon glyphicon-remove"></i></button></td>\
            <td width="10%"><div class="preview-div"></div></td>\
          </tr>\
        </tbody></table>\
    </div>';
    return  parentsHtml;
}

function addShipDeckImg(selector){
    var parent=$(selector).parents().eq(4);
    parent.after(returnShipDeckHtml());
    reindexing('slider_img');  
}
function removeShipDeckImg(selector){
    $(selector).parents().eq(4).remove();
    reindexing('slider_img');   
}

$('body').on('click', ".add-data", function() {
    var index = $( ".add-data" ).index( this );
    $(".my-index").attr("value", index);
});

$('.add-icon').click(function(){ 
  var collection_img_path  = $(this).attr('src');
  var img = '<img width="30" src="'+collection_img_path+'">';
  var collection_index  = $('.my-index').attr('value'); 
  var filename = collection_img_path.split('/').pop();
  $( "div.icon-preview" ).eq(collection_index).html(img); 
  $( "input.icon-input" ).eq(collection_index).attr("value", filename);
});

$("form").submit(function(e) {

    var ref = $(this).find("[required]");

    $(ref).each(function(){
        if ( $(this).val() == '' )
        {
            alert("Required field should not be blank.");

            $(this).focus();

            e.preventDefault();
            return false;
        }
    });  return true;
});
