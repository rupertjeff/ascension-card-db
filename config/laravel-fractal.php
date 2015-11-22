<?php

use League\Fractal\Serializer\JsonApiSerializer;

return [

    /*
     * The default serializer to be used when performing a transformation.
     * Leave empty to use the Fractal's default.
     */
    'default_serializer' => JsonApiSerializer::class,
];
