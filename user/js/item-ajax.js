$( document ).ready(function() {

    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;
    var email = "";
    var username = "";

    manageData();

    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: url+'/user/api/getData.php',
            data: {page:page}
        }).done(function(data){
             // console.log(data);
            total_page = Math.ceil(data.total/10)+1;
            current_page = page;
            // alert(data.user_data.length);
            var str_html='<select id="user_data" style="width:100%; height:38px; border-radius:4px;">';
            str_html+='<option value=" ">Select to User Name</option>';
            for(i=0;i<data.user_data.length;i++){
                username = data.user_data[i]['username'];
                email = data.user_data[i]['email'];
                str_html+='<option value="'+data.user_data[i]['email']+','+data.user_data[i]['id']+'">'+data.user_data[i]['username']+'</option>';
            }
            str_html+='</select>';
            
            $('#user_table').html(str_html);
            $('#user_data').change(function(){
                email=$(this).val().split(",")[0];
                var user_id=$(this).val().split(",")[1];
                $('#user_email').val(email);
                $('#user_id').val(user_id);
            });
        
            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if(is_ajax_fire != 0){
                      getPageData();
                    }
                }
            });

            manageRow(data.data);
            is_ajax_fire = 1;

        });

    }

    /* Get Page Data*/
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: url+'/user/api/getData.php',
            data: {page:page}
        }).done(function(data){
            manageRow(data.data);
        });
    }

    /* Add new Item table row */
    function manageRow(data) {
        var rows = '';
        var todayDate = new Date().toISOString().slice(0,10);
        $.each( data, function( key, value ) {
            // var total = parseFloat(value.precentage_commission) + parseFloat(value.commission_amount);
            rows = rows + '<tr>';
            rows = rows + '<td>'+todayDate+'</td>';
            rows = rows + '<td>'+value.username+'</td>';
            rows = rows + '<td>'+value.book_name+'</td>';
            rows = rows + '<td>'+value.channel+'</td>';
            rows = rows + '<td>'+value.precentage_commission+'</td>';
            rows = rows + '<td>'+value.commission_amount+'</td>';
            rows = rows + '<td>'+value.running_totals+'</td>';
            rows = rows + '</tr>';
        });

        $("tbody").html(rows);
    }

    /* payme submit */
    $(".btn-success.payme").click(function(e){
        var data = {
            mail: email,
            name: username
        };
        $.post( "http://www.grimlockpress.com/test_login/user/api/email.php", data)
          .done(function( data ) {
            alert( "Request Sent: " + data );
          }); 
    });
});
