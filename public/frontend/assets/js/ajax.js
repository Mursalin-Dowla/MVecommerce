jQuery(document).ready(function(){
    jQuery(document).on("click",".qck_vw_atcart",function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url:"/addtocart/"+id,
            type:"GET",
            success:function(res){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: res.msg,
                    showConfirmButton: false,
                    timer: 1500
                  })
                show();
            }
        })
    });
    show();
    function show(){
        jQuery.ajax({
            url:"/showcart/",
            type:"GET",
            success:function(res){
                let allData = "";
                let sum = 0;
                let count = 0;
                $.each(res.data,function(key,val){
                    sum += val.price;
                    count++;
                    allData += '<li>\
                    <div class="shopping-cart-img">\
                        <a href="shop-product-right.html"><img alt="Nest" src="http://127.0.0.1:8000/uploads/product/'+val.image+'" /></a>\
                    </div>\
                    <div class="shopping-cart-title">\
                        <h4><a href="shop-product-right.html">'+val.product_name+'</a></h4>\
                        <h4><span>'+val.qnt+' × </span>$'+val.price+'</h4>\
                    </div>\
                    <div class="shopping-cart-delete">\
                        <button value='+val.id+' class="removeItem" href="#"><i class="fi-rs-cross-small"></i></button>\
                    </div>\
                </li>'
                });
                jQuery('.show_cart').html(allData);
                jQuery('.total_cart').html(sum);
                jQuery('.cart_count').html(count);
            }
        })
    }
    jQuery(document).on('click','.removeItem',function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url:'/deleteItem/'+id,
            type:"GET",
            success:function(res){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: res.msg,
                    showConfirmButton: false,
                    timer: 1500
                  })
                show();
            }
        })
    }) 
    jQuery(document).on('click','.qnt-up',function(){
        var id = jQuery(this).val();    
        jQuery.ajax({
            url:'/qntup/'+id,
            type:"GET",
            success:function(res){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: res.msg,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        })
    })  
    jQuery(document).on('click','.qnt-down',function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url:'/qntdown/'+id,
            type:"GET",
            success:function(res){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: res.msg,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        })
    })        
})