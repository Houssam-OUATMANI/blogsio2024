<?php
function html_input( string $type, string $placeholder, string $label, string $name) {
    echo "
            <div class='my-4'>
                <label class='text-xl' for='$name'>$label</label>
                 <input 
                     type='$type'
                     placeholder='$placeholder'
                     class='input input-bordered w-full'
                     name='$name'
                     id='$name'
                />
            </div>
           ";
}