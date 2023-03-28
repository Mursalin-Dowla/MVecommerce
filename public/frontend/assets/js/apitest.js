jQuery(document).ready(function(){
    jQuery('.test-btn').click(function(){           
        jQuery.ajax({
            url:"https://dummyjson.com/products",
            type:"get",
            success:function(res){ 
                allData = "";                              
               $.each(res.products, function(key, data){
                allData += '<tr>\
                <td>'+key+'</td>\
                <td>'+data.title+'</td>\
                <td>'+data.description+'</td>\
                <td>'+data.price+'</td>\
                <td>'+data.discountPercentage+'</td>\
                <td>'+data.rating+'</td>\
                <td>'+data.brand+'</td>\
                <td>'+data.category+'</td>\
                <td><img width="100px" src='+data.thumbnail+' alt="pimage"></td>\
            </tr>'
               } )
               jQuery('.allData').html(allData);
            }
        })
    })
    jQuery('.load-btn').click(function(){
        jQuery.ajax({
            url:"https://dummyjson.com/products/1",
            type:"get",
            success:function(res){ 
               jQuery('#title').val(res.title)
               jQuery('#description').val(res.description)
               jQuery('#price').val(res.price)
               jQuery('#rating').val(res.rating)
               jQuery('#thumbnail').val(res.thumbnail)
            }
        })
    })
    jQuery(document).on('click','.save',function(){ 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var title = jQuery('#title').val();
        var description = jQuery('#description').val();
        var price = jQuery('#price').val();
        var rating = jQuery('#rating').val();
        var thumbnail = jQuery('#thumbnail').val();
        if(title == ''){
            alert('Please Load Data First');
        }
        else{
            jQuery.ajax({
                url:'/apitest/store',
                type:'POST',
                data:{
                    'title':title,
                    'description':description,
                    'price':price,
                    'rating':rating,
                    'thumbnail':thumbnail,
                }                
            })
        }
    })
});