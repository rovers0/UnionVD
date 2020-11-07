
$(document).ready(function (){
    $('.noneactive').first().addClass('active');
    $('#pagi').each(function() {
        $($(this)).on('click', 'li', function(e){
            e.preventDefault();
            $(this).addClass('active').siblings().removeClass('active');
        });
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //close btn
    $('button[type="submit"]').on('click', function(){
        
    //    console.log('helô');
       if ($(this).hasClass('btn-primary')) {
        $(this).css("display","none");
        return true;
       } else {
           
       }
       
    });
    
    $( 'form' ).submit(function ( e ) {
        var data;
        var url = $(this).data('url');
        if (typeof url !== 'undefined') {
            var value = $(this).serialize()
            $.ajax({
                url: url,
                data: value,
                processData: false,
                type: 'POST',
                success: function (data) {
                    alert( data );
                }
            }); 
        
            e.preventDefault();
        } else {
           
            
        }
        
    });

    $('button[type="put"]').on('click', function(){
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{active_id:id}, 
            dataType: 'html',          
            success: function(result){ 
                if (result) {
                    document.getElementById(id).style.display = 'none';
                } else {
                    alert('Something went wrong!')                    
                }
                
                
            }
        })    
    });
    $('.destroy').on('click', function(){
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{aid:id}, 
            dataType: 'html',          
            success: function(result){ 
                if (result) {
                    document.getElementById(id).style.display = 'none';
                } else {
                    alert('Something went wrong!')                    
                }
                
                
            }
        })    
    });
    
    $("select[id='provinces']").change(function (){
        var provinces_id = $(this).find(':selected').attr('data-id');
        var url = $(this).data('url');
      
        $.ajax({
            url: url,
            method:'POST',
            data:{provinces_id:provinces_id}, 
            dataType: 'html',          
            success: function(result){          
                $('#districts').html(result);
                
            }
        })
    });
    $("select[id='districts']").change(function (){
        var districts_id = $(this).find(':selected').attr('data-id');;
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{districts_id:districts_id}, 
            dataType: 'html',          
            success: function(result){          
                $('#wards').html(result);
                
            }
        })
    });
    $("#exampleInputFile").change(function () {
        if(window.confirm('are sure for change your image') == true){
            $("#formchangeimg").submit();
            return true;
        }
          return false;
       
       });
    $(document).on('click','button[name="resetpass"]', function(){
        // var num = $(this).attr('id');
        // var flimid = $(this).attr('data');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            // data:{idcm:num , flim_id:flimid},
            success: function(result){
               alert('Reset password successful')
            }
        })
        
    });
    
    $("select[id='status']").change(function (){
        var districts_id = $(this).find(':selected').attr('value');;
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method:'POST',
            data:{status:districts_id}, 
            dataType: 'html',          
            success: function(result){          
                if (result) {
                    alert('successful')
                } else {
                    alert('Something went wrong')
                }
                
            }
        })
    });
        
   
    
    

});