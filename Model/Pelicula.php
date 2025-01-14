<?php
class Pelicula {
    private $Database;
    private $tabla = "peliculas";
    
    public function __construct() {
        $this->Database = new PDO('mysql:host=localhost;dbname=bdejemplo', 'root', '');
    }

    public function obtenerPeliculas() {
        $capturar_productos = $this->Database->query('SELECT * FROM peliculas');
        return $capturar_productos->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearPelicula($titulo, $director, $anio, $genero){
        $insertarp = $this->Database->prepare('INSERT INTO peliculas(titulo,director,anio_estreno,genero) VALUES (?, ?, ?, ?)');
        return $insertarp->execute([$titulo, $director, $anio, $genero]);
    }

    public function actualizarPelicula($id, $titulo, $director, $anio, $genero){
        $query = "UPDATE ". $this->tabla . " 
        SET titulo = :titulo, director = :director, anio_estreno = :anio_estreno, genero = :genero
        WHERE id = :id";
        $stmt = $this->Database->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':director', $director);
        $stmt->bindParam(':anio_estreno', $anio);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function borrarPelicula($id){
        $query = "DELETE FROM " . $this->tabla . " WHERE id = :id";
        $stmt = $this->Database->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}