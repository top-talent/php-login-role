$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
var email = "";

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url+'/add/api/getData.php',
        data: {page:page}
    }).done(function(data){
         // console.log(data);
        total_page = Math.ceil(data.total/10)+1;
        current_page = page;
        // alert(data.user_data.length);
        var str_html='<select id="user_data" style="width:100%; height:38px; border-radius:4px;">';
        str_html+='<option value=" ">Select to User Name</option>';
        for(i=0;i<data.user_data.length;i++){
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
        url: url+'/add/api/getData.php',
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
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });

    $("tbody").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
     // e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action-data");
    var date_1 = $("#create-item").find("input[name='date_1']").val();
    var book_name = $("#create-item").find("input[name='book_name']").val();
    var channel = $("#create-item").find("input[name='Channel']").val();
    var precentage_commission = $("#create-item").find("input[name='precentage_commission']").val();
    var commission_amount = $("#create-item").find("input[name='commission_amount']").val();
    var running_total = $("#create-item").find("input[name='running_total']").val();

    if(date_1 != '' && book_name != '' && Channel != '' && precentage_commission != '' && commission_amount != '' && running_total != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{date_1:date_1, book_name:book_name, Channel:Channel, precentage_commission:precentage_commission, commission_amount:commission_amount, running_total:running_total}
        }).done(function(data){
            alert('ok');
            $("#create-item").find("input[name='date_1']").val('');
            $("#create-item").find("input[name='book_name']").val('');
            $("#create-item").find("input[name='Channel']").val('');
            $("#create-item").find("input[name='precentage_commission']").val('');
            $("#create-item").find("input[name='commission_amount']").val('');
            $("#create-item").find("input[name='running_total']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or description.')
    }


   
});




/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + '/add/api/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });


});

/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var date_1 = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
    var book_name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
    var Channel = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
    var precentage_commission = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var commission_amount = $(this).parent("td").prev("td").prev("td").text();
    var running_total = $(this).parent("td").prev("td").text();

    $("#edit-item").find("input[name='date_1']").val(date_1);
    $("#edit-item").find("input[name='book_name']").val(book_name);
    $("#edit-item").find("input[name='Channel']").val(Channel);
    $("#edit-item").find("input[name='precentage_commission']").val(precentage_commission);
    $("#edit-item").find("input[name='commission_amount']").val(commission_amount);
    $("#edit-item").find("input[name='running_total']").val(running_total);
    $("#edit-item").find(".edit-id").val(id);

});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    // e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var title = $("#edit-item").find("input[name='title']").val();

    var description = $("#edit-item").find("textarea[name='description']").val();
    var id = $("#edit-item").find(".edit-id").val();

    if(title != '' && description != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{title:title, description:description,id:id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or description.')
    }

});
});
