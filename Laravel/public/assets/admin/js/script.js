$(document).ready(function() {
    var token = jQuery('meta[name="csrf-token"]').attr('content');
    var site_url = jQuery('meta[name="site-url"]').attr('content');
    $(".gambar").attr(
        "src",
        "http://localhost:8000/assets/admin/img/150x75.jpg"
     );
    var $uploadCrop, tempFilename, rawImg, imageId, imageClicked;
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#upload-demo").addClass("ready");
                $("#cropImagePop").modal("show");
                rawImg = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $("#upload-demo").croppie({
        viewport: {
            width: 220,
            height: 220
        },
        boundary: {
            width: 250,
            height: 250
        },
        // enforceBoundary: false,
        enableExif: true
    });

    $("#cropImagePop").on("shown.bs.modal", function () {
        $uploadCrop.croppie("bind",
        {
            url: rawImg
        })
        .then(function () {
            // console.log("jQuery bind complete");
        });
    });

    $(".get-upload-img").on("change", function () {
        imageClicked = this;
        imageId = $(this).data("id");
        tempFilename = $(this).val();
        $("#cancelCropBtn").data("id", imageId);
        readFile(this);
    });
    
    $("#cropImageBtn").on("click", function (ev) {
        $uploadCrop.croppie("result", {
            type: "base64",
            format: "jpeg",
            size: { width: 250, height: 250 }
        })
        .then(function (response) {
            $.ajax({
                url: site_url+"/crud-file-upload/",
                type: "POST",
                data: {"image":response, _token:token},
                success: function (data) {
                    console.log(data);
                    $(imageClicked).parents('.upload-image-div').find('.upload-img-output').attr('src', response)
                    $(imageClicked).parents('.upload-image-div').find('.update-upload-img').attr('value', data.path)
                }
            });
        });
    });
});


jQuery(document).ready(function() {
  var lmi = jQuery('#lmi').text();
  jQuery('#lmi').remove();
  var token = jQuery('meta[name="csrf-token"]').attr('content')
  var site_url = jQuery('meta[name="site-url"]').attr('content')
  function scroll_height(){
    console.log($('.chat-messages').innerHeight());
    $('.chat-messages').animate({scrollTop:'1000000px'}, 'slow');
  }
  scroll_height();

    jQuery(document).on('submit', '#send-message', function(event){
      event.preventDefault();
        var isThis = this;
        // console.log('hhhhhh');
        $.ajax({
            type:'post',
            url: site_url+'/admin/chat/send-message',
            data:{
                'rec': jQuery('#rec').val(),
                'message': jQuery('#message').val(),
                _token:token
            },
            success:function(data){
                console.log(data);
                lmi = data.id;
                jQuery('#message').val('');
                html = '<div class="sender-message">';
        html += '<div class="message-width">';
        html += '<p class="message">'+data.message+'</p>';
        html += '</div>';                 
        html += '</div>';
        jQuery('.chat-messages').append(html);
        scroll_height();
            }
        });
    });

    jQuery(document).on('keyup', '#message', function(event){
      if(event.keyCode == 32 || event.keyCode == 190 || event.keyCode == 188 || event.keyCode == 191){
          var isThis = this;
          $.ajax({
              type:'post',
              url: site_url+'/admin/chat/translate',
              data:{
                  'rec': jQuery('#rec').val(),
                  'message': jQuery('#message').val(),
                  _token:token
              },
              success:function(data){
                  // console.log(data);
                  jQuery('.translated-text p').text(data);
              }
          });
        }
    });

    setInterval(function(){
      // console.log($('.chat-messages').scrollTop($(document).height()));
      // console.log($('.chat-messages').height());
        $.ajax({
            type:'post',
            url: site_url+'/admin/chat/refresh-message',
            data:{
                'rec': jQuery('#rec').val(),
                'lmi': lmi,
                _token:token
            },
            success:function(data){
              // console.log(data);
                if (data != '') {
                  lmi = data['lmi'];
          jQuery('.chat-messages').append(data['html']);
          scroll_height();
                }                
            }
        });
    }, 5000);
});
