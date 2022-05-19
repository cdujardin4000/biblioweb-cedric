$(function(){
    $('header').css({'margin-bottom': '2rem'})
    $('footer').css({'padding-top': '2rem', 'padding-bottom': '2rem', 'margin-top': '2rem'});
    $('.no-result').css({'font-size': '2rem', 'margin': '2rem 0'});
    $('#input').css({'margin-bottom': '1rem'});
    $('.copyright').css({'text-align': 'center', 'color': '#ffca2c'});
    $('#mail').css({'color': 'white'});
    $('#mail:hover').css({'color': '#d12d90'});
    $('.change-logo').css({'margin-top': '1rem'});
    $('label.statusMessage').css({'margin': '2rem 0','font-size': '2rem'});
    updateSelect = (selectedValue) =>
    {
        this.value = selectedValue;
        console.log(this.value);
    }



});