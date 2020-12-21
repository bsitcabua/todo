
var base_url = window.location.origin;
var api_base_url = base_url + '/api/';


function getAjax(url, success) {
    // Set up our HTTP request
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('GET', api_base_url + url);
    // Setup our listener to process completed requests
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) success(xhr.responseText);
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send();
    return xhr;
}


getItems();

function getItems(){
    
    getAjax('items', function(data){
        var json = JSON.parse(data);
        var items = json.data.items;
        var html = '';

        if( items.length < 1 ) {
            html += '<tr>\
                    <td scope="row" colspan="4" class="text-center">\
                        No data found.\
                    </td>\
                </tr>';
        }
        

        for (var i = 0; i < items.length; i++){
    
            var obj = items[i];
    
            console.log(obj)
            html += '<tr>\
                        <td scope="row">\
                            <input class="checkbox" type="checkbox">\
                        </td>\
                        <td>'+obj.name+'</td>\
                        <td>'+obj.deadline+'</td>\
                        <td class="text-center">\
                            <i class="fa fa-pencil text-info mr-1 edit_todo" data-id="'+obj.id+'" title="Edit" style="cursor: pointer"></i>\
                            <i class="fa fa-trash text-danger ml-1 delete_todo" title="Delete" data-id="'+obj.id+'" data-name="'+obj.name+'" style="cursor: pointer" data-toggle="modal" data-target="#delete_item_modal"></i>\
                        </td>\
                    </tr>';
    
        }
        

        document.getElementById("todo_items").innerHTML = html

        // $('#todo_items').html(html);
        
    });
}


function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', api_base_url + url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}




$(document).on('click', '#btn_add_item', function(){
    var name = $('#name').val();
    var deadline_date = $('#deadline_date').val();
    var deadline_time = $('#deadline_time').val();

    var data = {
        name : name,
        deadline_date : deadline_date,
        deadline_time : deadline_time,
    };

    $('.input_control').removeClass('is-invalid');

    if( name == '' ){
        $('#name').addClass('is-invalid');
        return false;
    }
    else if( deadline_date == '' ) {
        $('#deadline_date').addClass('is-invalid');
        return false;
    }
    else if( deadline_time == '' ) {
        $('#deadline_time').addClass('is-invalid');
        return false;
    }

    $('#adding_item_modal').modal('toggle');
    $('#adding_message').text('Adding...');

    // example request with data object
    postAjax('item-store', data, function(data){ 
        var json = JSON.parse(data);

        if( json.success == true ){

            $('#name').val('');
            $('#deadline_date').val('');
            $('#deadline_time').val('');
            
            getItems();

            setTimeout(function(){
                $('#adding_item_modal').modal('toggle');
            },1000);
        }
    });

});

// Show modal for deletion
$(document).on('click', '.delete_todo', function(){
    var todo_id = $(this).data('id');
    var todo_name = $(this).data('name');

    $('#todo_id').val(todo_id);
    $('#todo_name').text(todo_name);
});

$(document).on('click', '#confirm_delete_todo', function(){

    var todo_id = $('#todo_id').val();
    var data = {id: todo_id};
    
    $(this).text('Deleting...');

    if( todo_id ){
        // example request with data object
        postAjax('item-destroy', data, function(data){ 
            var json = JSON.parse(data);

            if( json.success == true ){
                $('#confirm_delete_todo').text('Delete');
                $('#delete_item_modal').modal('toggle');
                getItems();
            }
        });
    }
    else{
        console.log('Oops! Something went wrong.');
    }
    
});


$(document).on('click', '.edit_todo', function(){

    var todo_id = $(this).data('id');

    var data = {id: todo_id};

    $('#update_todo_id').val(todo_id);

    // example request with data object
    postAjax('item-get', data, function(data){ 
        var json = JSON.parse(data);

        console.log(json);
        if( json.success == true ){

            $('#update_name').val(json.data.name);
            $('#update_deadline_date').val(json.data.deadline_date);
            $('#update_deadline_time').val(json.data.deadline_time);
            $('#update_item_modal').modal('toggle');
        }
    });

    
});


$(document).on('click', '#confirm_update_todo', function(){
    var name = $('#update_name').val();
    var todo_id = $('#update_todo_id').val();
    var deadline_date = $('#update_deadline_date').val();
    var deadline_time = $('#update_deadline_time').val();

    var data = {
        id : todo_id,
        name : name,
        deadline_date : deadline_date,
        deadline_time : deadline_time,
    };

    $('.input_control_update').removeClass('is-invalid');

    if( name == '' ){
        $('#update_name').addClass('is-invalid');
        return false;
    }
    else if( deadline_date == '' ) {
        $('#update_deadline_date').addClass('is-invalid');
        return false;
    }
    else if( deadline_time == '' ) {
        $('#update_deadline_time').addClass('is-invalid');
        return false;
    }

    $('#confirm_update_todo').text('Updating...');

    // example request with data object
    postAjax('item-update', data, function(data){ 
        var json = JSON.parse(data);

        if( json.success == true ){

            getItems();

            setTimeout(function(){
                $('#update_item_modal').modal('toggle');
                $('#confirm_update_todo').text('Update');
            },1000);
        }
    });

});