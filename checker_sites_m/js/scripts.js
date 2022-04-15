$( document ).ready(function() {
    $("#btn_add_project").on("click",	function() {
        var msg   = $('#form_add_project').serialize();
         $.ajax({
           type: 'GET',
           url: '/system_files/ajax_add.php',
           data: msg,
           success: function(data) {
             $('#success_add_site').html(data);
           },
           error:  function(xhr, str){
         alert('Возникла ошибка: ' + xhr.responseCode);
           }
         });

        });

        $("#btn_del_project").on("click",	function() {
        var msg   = $('#form_delete_project').serialize();
          $.ajax({
            type: 'GET',
            url: '/system_files/ajax_delete.php',
            data: msg,
            success: function(data) {
              $('#success_remove_project').html(data);
            },
            error:  function(xhr, str){
          alert('Возникла ошибка: ' + xhr.responseCode);
            }
          });

        });

        $("#btn_change_passw").on("click",	function() {
          var msg   = $('#form_change_password').serialize();
            $.ajax({
              type: 'GET',
              url: '/system_files/ajax_change_passw.php',
              data: msg,
              success: function(data) {
                $('#success_change_passw').html(data);
              },
              error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
              }
            });
  
          });

          $("#btn_del_all_project").on("click",	function() {
            var msg   = $('#form_delete_all_project').serialize();
              $.ajax({
                type: 'GET',
                url: '/system_files/ajax_remove_all_projects.php',
                data: msg,
                success: function(data) {
                  $('#success_remove_project').html(data);
                },
                error:  function(xhr, str){
              alert('Возникла ошибка: ' + xhr.responseCode);
                }
              });
    
            });
  

});
  
