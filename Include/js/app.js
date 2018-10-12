(function($){
    
   $('.addPanier').click(function(event){
       event.preventDefault();
       $.get($(this).attr('href'),{},function(data){
                if(data.error){
                    alert(data.message);
                }else{
                    if(confirm(data.message + ' Voulez-vous consulter votre panier?')){
                        location.href='panier.php';
                    }else{
                        $('#total').empty().append(data.total);
                        $('#nbArticle').empty().append(data.nbArticle);
                    }
                }
             }, 'json');
       return false;
   });
   
})(jQuery);