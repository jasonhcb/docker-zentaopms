/**
 * Created by user on 2016/5/6.
 */
$("input").focusin(function(){
    $(this).css("border-bottom","1px solid #4d90fe");
});
$("input").focusout(function(){
    $(this).css("border-bottom","1px solid #465f77");
});
