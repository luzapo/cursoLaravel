<?php

namespace App\Http\Controllers;

use App\Resource\Curso\Manager;
use Illuminate\Http\Request;

class CursoController extends Controller
{

  public $manager;

  function __construct()
  {
    $this->manager = new Manager();
    $integrate = $this->manager->listarIntegrantesDelCurso();
  }
  public function index()
  {
    //  return "Hola mundo";
    $manager = new Manager();
    $registros = $manager->listarIntegrantesDelCurso();
    // dd($registros);
    // dd($manager->nombre);

    return view("curso.index")
      ->with("integrantes", $registros);
  }


  //vemos la informacion como un arreglo
  public function store(Request $request)
  {
    $manager = new Manager();
    $curso = $manager->crearIntegranteDelCurso($request);
    if ($curso) {
      return redirect()->back();
    } else {
      dd("No se pudo crear el curso");
    }
  }

  public function update(Request $request, $id)
  {
    $manager = new Manager();
    $integrante = $manager->actualizarIntegranteDelCurso($request, $id);
    if ($integrante) {
      return redirect()->back();
    } else {
      dd("No se pudo actualizar el integrante del curso");
    }
  }


  public function delete($id)
  {
    $manager = new Manager();
    $integrante = $manager->eliminarIntegranteDelCurso($id);
    if ($integrante) {
      return redirect()->back();
    } else {
      dd("No se pudo eliminar el registro del curso");
    }
  }


  public function show()
  {
    //  return "Hola mundo";
    return view("curso.show");
  }
  public function edit()
  {
    //  return "Hola mundo";
    return view("curso.edit");
  }
}
