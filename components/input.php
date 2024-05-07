<?php
function html_input( string $type, string $placeholder, string $label, string $name, string $value) : void {
    echo "
            <div class='my-4'>
                <label class='text-xl' for='$name'>$label</label>
                 <input 
                     type='$type'
                     placeholder='$placeholder'
                     class='input input-bordered w-full'
                     name='$name'
                     id='$name'
                     value='$value'
                />
           ";
    if(isset($_SESSION["errors"][$name])) {
        $error_message = $_SESSION["errors"][$name];
        echo "<p class='text-red-400'>$error_message</p>";
    }

    echo " </div>";
}