<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RedactionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'can:level4'])->only('import');
        $this->middleware(['auth', 'can:level2'])->except('import');
    }

    public function import()
    {
        return view('redactions.import');
    }

    public function process_import()
    {
        sleep(5);
        return "Teste";
    }

    public function get_data($image)
    {
        $file = Storage::get($image);
        $img = Image::make($file);
        $corte_vertical = 0;
        $corte_horizontal = 710;
        $x = $corte_vertical;
        $y = $corte_horizontal;
        $largura = $img->width() - $corte_vertical;
        $altura =  $img->height() - $corte_horizontal;
        $img->crop($largura,  $altura, $x, $y);
        $img_data = $img->encode('data-url');
        return $img_data;
    }


}
