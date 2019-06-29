/**
* ローディングアニメーション
*/

var $delayTime = 1000;

$(window).on('load', function(){

    var $loadingAnim = $('#loadingAnim'),
        $body = $('body');

    setTimeout( function(){
        
        $body.addClass('loaded');
        
        // アニメ完了後にDOM削除
        $loadingAnim.find('.loadingAnim_line').on('transitionend', function( e ){
            $(this).parent().remove();
        });

    }, $delayTime );
});
