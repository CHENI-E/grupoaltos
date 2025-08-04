<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadHelper
{
    protected function guardarArchivo($archivo, $ruta, $prefijo = '')
    {
        $nombreArchivo = $prefijo . uniqid() . '.' . $archivo->getClientOriginalExtension();
        $archivo->move($ruta, $nombreArchivo);
        return $nombreArchivo;
    }

    protected function procesarImagenesDetalle(Request $request, string $uploadPath, $item = null): array
    {
        $imagenes = [];

        $campos = [
            'imagen_detalle_one' => ['indice' => 'one', 'atributo' => 'imagen_one'],
            'imagen_detalle_two' => ['indice' => 'two', 'atributo' => 'imagen_two'],
            'imagen_detalle_tree' => ['indice' => 'tree', 'atributo' => 'imagen_three'],
            'imagen_detalle_four' => ['indice' => 'four', 'atributo' => 'imagen_four'],
        ];

        foreach ($campos as $campo => $info) {
            if ($request->hasFile($campo)) {
                if ($item) {
                    $atributo = $info['atributo'];
                    if ($item->$atributo && file_exists(public_path($item->$atributo))) {
                        unlink(public_path($item->$atributo));
                    }
                }

                $archivo = $request->file($campo);
                $nombre = $this->guardarArchivo($archivo, $uploadPath, 'detalle_');
                $imagenes[$info['indice']] = 'uploads/items/' . $nombre;
            }
        }

        return $imagenes;
    }

}
