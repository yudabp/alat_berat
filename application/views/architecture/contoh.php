<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Color Picker</title>
    <link href="assets/user-color-picker-source/demo/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/user-color-picker-source/demo/css/jquery.minicolor.css" rel="stylesheet">

    <script src="assets/user-color-picker-source/demo/bootstrap.min.css"></script>
    <script src="assets/user-color-picker-source/demo/jquery.minicolors.min.js"></script>
    <script src="assets/user-color-picker-source/demo/jquery-1.10.2.min.js"></script>
</head>
<body>
    
    <script>
         var colpick = $('.demo').function() {
        $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        inline: $(this).attr('data-inline') === 'true',
        letterCase: 'lowercase',
        opacity: false,
        change: function(hex, opacity) {
            if(!hex) return;
            if(opacity) hex += ', ' + opacity;
            try {
            console.log(hex);
            } catch(e) {}
            $(this).select();
        },
        theme: 'bootstrap'
        });
    };
    </script>    
    <script>
      var $inlinehex = $('#inlinecolorhex h3 small');
        $('#inlinecolors').minicolors({
            inline: true,
            theme: 'bootstrap',
            change: function(hex) {
            if(!hex) return;
            $inlinehex.html(hex);
            }
        });
    </script>
</body>
</html>