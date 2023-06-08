<!DOCTYPE html>
<html>
<head>
    <title>Volumetric Weight Calculator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <h1 style="color: blue; text-align: center; ">Volumetric Weight Calculator</h1>

    <form style="text-align: center;" id="calculatorForm">
        <label for="length">Length:</label>
        <input type="text" name="length" id="length"  style="margin: 5px; font-family: cursive;" required><br><br>
         <?php echo csrf_field(); ?>
        <label for="width">Width:</label>
        <input type="text" name="width" id="width" style="margin: 5px; font-family: cursive;" required><br><br>

        <label for="height">Height:</label>
        <input type="text" name="height" id="height" style="margin: 5px; font-family: cursive;" required><br><br>
        
        <label for="height">Quantity:</label>
        <input type="text" name="quantity" id="quantity" value="1" style="margin: 5px; font-family: cursive;"><br><br>

        <input type="submit" value="Calculate"><br>
    </form>

     <div id="result" style="display: none;">
        <h2>Volumetric Weight:</h2>
        <p>Kilograms: <span id="volumetricWeightKg"></span></p>
        <p>lbs: <span id="volumetricWeightLbs"></span></p>
    </div>

    <script>
        $(document).ready(function() {
            $('#calculatorForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '/calculate',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#volumetricWeightKg').text(response.volumetric_weight_kg);
                        $('#volumetricWeightLbs').text(response.volumetric_weight_lbs);
                        $('#result').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\volumetric-weight-calculator\resources\views/calculator.blade.php ENDPATH**/ ?>