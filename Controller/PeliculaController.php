<?php
require_once 'model/Pelicula.php';
class ProductController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Pelicula();
    }

    public function index() {
        $products = $this->modelo->obtenerPeliculas();
        require 'View/listarPeliculas.php';
    }

    public function agregarPelicula(){
        header('Content-Type: application/json');
        try {

            $titulo = $_POST['txt_titulo'];
            $director = $_POST['txt_director'];
            $anio = $_POST['txt_anio'];
            $genero = $_POST['txt_genero'];
            $resultado = $this->modelo->crearPelicula($titulo, $director, $anio, $genero);
            echo json_encode(['success' => $resultado]);
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function editarPelicula(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $titulo = $_POST['txt_edittitulo'];
            $director = $_POST['txt_editdirector'];
            $anio = $_POST['txt_editanio'];
            $genero = $_POST['txt_editgenero'];
            $resultado = $this->modelo->actualizarPelicula($id,$titulo,$director,$anio,$genero);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function eliminarPelicula(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $resultado = $this->modelo->borrarPelicula($id);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}