<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <title>Document</title>
</head>
<body>
    <input type="text" name="name" class="typeahead form-control">
</body>
</html>
<script type="text/javascript">
    var path = "<?php echo e(route('autocomplete')); ?>";
    $('input.typeahead').typeahead({
        source:function(query,process){
            return $.get(path,{query:name},function(data){
                return process(data);
            });
        }
    });
    </script>
<?php /**PATH C:\xampp\htdocs\codecamp\resources\views/layouts/autocomplete.blade.php ENDPATH**/ ?>