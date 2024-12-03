<?php

return [
    /**
     * The font directory where your fonts are stored.
     */
    'font_dir' => storage_path('fonts'), // You can also use public_path('fonts')

    /**
     * The font cache directory where dompdf will cache the fonts.
     */
    'font_cache' => storage_path('fonts'), // Can be changed as needed

    /**
     * List of available fonts (not using `@font-face`).
     * Each entry should be an array with:
     * - normal: path to the normal font file
     * - bold (optional): path to the bold font file
     * - italic (optional): path to the italic font file
     * - bold_italic (optional): path to the bold italic font file
     */
    'font' => [
        'Inter' => [
            'normal' => public_path('fonts/inter-regular-webfont.ttf'),
            'bold' => public_path('fonts/inter-semibold-webfont.ttf'),
        ],
        // Add more fonts here if necessary
    ],

    /**
     * Default font for DomPDF
     */
    'default_font' => 'Inter',

    // Other DomPDF settings...
    'pdf_backend' => 'CPDF', // Set to 'GD' for better font rendering (optional)
    'canvas_width' => 600, // Canvas width
    'canvas_height' => 850, // Canvas height
    // Other settings as required...
];
