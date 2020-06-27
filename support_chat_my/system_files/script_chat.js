window.onload=function()
        {
           $('#chat_field').hide();
           $("#messages_field").on("click", function()
           {
           		$('#chat_field').toggle(800);
           });

$("#button_create_quection").on("click",  function create() {
    var msg   = $('#form_create_quections').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: msg,
           success: function(data) {
          $('#block_quections').html(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });

        $(".reset").val('');
 
    });

  $("#clean_all").on("click", function()
  {
    var del_all   = $('#form_del_all_quections').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: del_all,
           success: function(data) {
          $('#block_quections').html(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    });


           $("#send_message").on("click",  function() {
    var msg   = $('#chat-form').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: msg,
           success: function(data) {
          $('.massage_field').html(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });

        $(".reset").val('');
 
    });


$("#del_by_num").on("click",  function() {
    var msg   = $('#form_del_by_num').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: msg,
           success: function(data) {
          $('.massage_field').html(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });

        $(".reset").val('');
 
    });



$("#change_pass").on("click",  function() {
    var msg   = $('#form_change_pass').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: msg,
           success: function(data) {
          alert(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });

        $(".reset").val('');
 
    });

$("#clean_history").on("click",  function() {
    var msg   = $('#form_clean_history').serialize();
        $.ajax({
          type: 'POST',
          url: '/support_chat_my/ajax/ajax.php',
          data: msg,
           success: function(data) {
          $('#table_hist').html(data);
          },
          error:  function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });

      });


$(".link_q").on("click", function()
{
  $('#chat_field').toggle(800);
});



  }

        

