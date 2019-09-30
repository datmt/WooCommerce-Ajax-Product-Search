(function ($) {
    $(function(){
        $('.bc-product-search').select2({
            ajax: {
                url: ajaxurl,
                data: function (params) {
                    return {
                        term         : params.term,
                        action       : 'woocommerce_json_search_products_and_variations',
                        security: $(this).attr('data-security'),
                    };
                },
                processResults: function( data ) {
                    var terms = [];
                    if ( data ) {
                        $.each( data, function( id, text ) {
                            terms.push( { id: id, text: text } );
                        });
                    }
                    return {
                        results: terms
                    };
                },
                cache: true
            }
        });

        $('.show-selected-results').on('click', function(){

            console.log($('.bc-product-search').val());

        });
    });



})(jQuery)




