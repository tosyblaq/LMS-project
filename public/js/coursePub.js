$(document).ready(function(){
    // let unpublishOne = document.getElementById('unpublishOne');
    // let publish = document.getElementById('publish');

    $.ajaxSetup({
        header:{
            "X-CSRF-TOKEN" : $('meta[name="csrf_token"]').attr('content')
        }
    });

    $('.published').click(function(){
        let id = $(this).data('id');
        let obj = $(this);
        
        $.ajax({
            type:'GET',
            url:'course/'+id+'/publish',
            data:{courseId:id},
            success:function(data){
                // console.log(data.success);
                console.log(id);
                $('#publish').css( "display", "none" );
                $('#unpublishOne').css( "display", "block" );
                $('#pubImg').css( "display", "block" );
                $('#tdImg').appendTo('<img id="tdImg" src="{{asset("img/check.png")}}" alt="Published" width="50px;"/>');
                $('#unpubImg').css("display", "none" );
                //document.DomContentLoaded(data);
            }
        });
    });


    $('#unpublishOne').click(function(){
        let id = $(this).data('id');
        let obj = $(this);
        
        $.ajax({
            type:'GET',
            url:'course/'+id+'/unpublish',
            data:{courseid:id},
            success:function(data){
                $('#unpublishOne').css( "display", "none");
                $('#publish').css( "display", "block" );
                // $('#unpubImg').css( "display", "block" );
                $('#cancel').appendTo('<img id="tdImg" src="{{asset("img/cancel.png")}}" alt="UnPublished" width="50px;"/>');
                // $('#cancel').css('background-image:', url="{{asset('img/cancel.png')}}");
                $('#tdImg').css("display", "none" );
            }
        });
    });

});
      





