<?php


namespace App\Resource\Curso;

use App\Models\Curso;

class Manager

{
    public $nombre;

    function __construct()
    {
        $this->nombre = "Hola mundo";
    }

public function buscarIntegranteDelCurso($id){
return Curso::find($id);
//where("id", $id)-> first();
}

    public function listarIntegrantesDelCurso()
    {
        return Curso::all();
    }

    public function crearIntegranteDelCurso($request)
    {
        return Curso::create(
            [
                "nombre" => $request->nombre,
                "edad" => $request->edad,
                "telefono" => $request->telefono,
                "correo" => $request->correo,
                "id_jefe" => null,

            ]
        );
    }

    public function actualizarIntegranteDelCurso($request, $id)
    {
        return Curso::where("id", $id)->update([
            "nombre" => $request->nombre,
            "edad" => $request->edad,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "id_jefe" => null,
        ]);
    }

    public function eliminarIntegranteDelCurso($id)
    {
        return Curso::where("id", $id)->delete();
    }
}
