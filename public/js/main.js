$(document).ready(function () {
    $('.add-form form').submit(function (e) {
        e.preventDefault();
        $.post(document.URL, $(this).serializeArray(), function (data) {
            console.log(data);
            if (data.error){
                alert('Error submiting form.');
            }
            $( document.createElement('dd') ).addClass('linkbox-content').html(data.date + '| points: 0').prependTo('dl.main');
            $( document.createElement('dt') ).addClass('linkbox-title').append($( document.createElement('a') ).attr('target','_blank').attr('href',data.url).html(svg + data.name + "<small>&nbsp;(" + data.category + ")</small>")).prependTo('dl.main');
            
        });
    });
    $("#logo").fitText(0.915);
});