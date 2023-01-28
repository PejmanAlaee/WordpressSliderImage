jQuery(document).ready(function($){
        //Jquery code
        $("li.add-slide").click(function(){
            $("#lightbox-data").lightbox_me({
                centered: true,
                closeSelector: '.action-cancel',
                onLoad : function(){

               //     $("input.action-insert").val();
                    $("input#delete").attr('type', 'hidden');
                    $("input.action-insert").val('اضافه کردن');
                    $("#current-slide").val(0);
                    $("#lightbox-data img").attr('src', data.default_image_url);


                }
            });

});

      $("#lightbox-data img").click(function (){
          var el = $(this);
          tb_show('test caption', 'media-upload.php?type=image&TB_iframe=true');
          window.send_to_editor = function( html ){
              var imgUrl = $('img', html).attr('src');
              $(el).attr('src', imgUrl);
              $(el).removeClass('notSelected');
              tb_remove();
          }
          return false;

      });
    $(document).on('click', '#metabox li:not(.add-slide)', function(){

        var slideId         = $(this).data('slide');
        var inputElemets    = $(this).find('input');
        var imgUrl          = $(inputElemets).eq(0).val();


        $("#lightbox-data").lightbox_me({
            centered: true,
            closeSelector: '.action-cancel',
            onLoad : function(){
                $("input#delete").attr('type', 'button');
                $("input.action-insert").val(data.edit);
                $("#current-slide").val(slideId);
                $("#lightbox-data img").attr('src', imgUrl);


            }
        });

    });

    $("input#delete").click(function() {
        var slideForEdit = $("li[data-slide='" + $('#current-slide').val() + "'] *").parent().remove();
        $("#lightbox-data").trigger('close');
    });

    $("input.action-insert").click(function() {

        var currentSlide = $('#current-slide').val();
        var imgUrl = $('#lightbox-data img').attr('src');

        if (data.default_image_url == imgUrl) {
            alert('لطفا عکس مورد نظر را وارد کنید !');
            return false;
        } else {
            if( currentSlide == 0 ){
                var lastId = $("li.add-slide").prev().data('slide');
                lastId++;
                var newHtml = '<li class="slide slideStyle"  data-slide="' + lastId + '" data-content="' + 'ویرایش' + '"><img src="' + imgUrl + '"><input type="hidden" name="slide_images[]" value="' + imgUrl + '"></li>';
                $(newHtml).insertBefore('li.add-slide');
            }else{
                var slideForEdit = $("li[data-slide='" + currentSlide + "'] *");

                $(slideForEdit).eq(0).attr('src', imgUrl);
                $(slideForEdit).eq(1).val(imgUrl);

            }
        }

            $("#lightbox-data").trigger('close');

            return false;
    });


    $( "#sortable1" ).sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();

});