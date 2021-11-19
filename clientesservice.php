<?php

    include 'conexion.php';
    $pdo= new Conexion();
    //crud de un web service(create, read, update, delete)
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $sql=$pdo->prepare("SELECT * FROM solicitante");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $sql="INSERT INTO solicitante(nombre,fechaN,sexo,direccion,telefono,correo,nacionalidad,nivelE,habilidades,objetivosV,pasatiempo)
        VALUES(:nombre,:fechaN,:sexo,:direccion,:telefono,:correo,:nacionalidad,:nivelE,:habilidades,:objetivosV,:pasatiempo)";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(':nombre',$_POST['nombre']);
        $consulta->bindValue(':fechaN',$_POST['fechaN']);
        $consulta->bindValue(':sexo',$_POST['sexo']);
        $consulta->bindValue(':direccion',$_POST['direccion']);
        $consulta->bindValue(':telefono',$_POST['telefono']);
        $consulta->bindValue(':correo',$_POST['correo']);
        $consulta->bindValue(':nacionalidad',$_POST['nacionalidad']);
        $consulta->bindValue(':nivelE',$_POST['nivelE']);
        $consulta->bindValue(':habilidades',$_POST['habilidades']);
        $consulta->bindValue(':objetivosV',$_POST['objetivosV']);
        $consulta->bindValue(':pasatiempo',$_POST['pasatiempo']);
        $consulta->execute();
        $ultimoId=$pdo->lastInsertId();
        if($ultimoId){
            header("HTTP/1.1 200 OK");
            echo json_encode($ultimoId);
            exit;
        }

    }
    if($_SERVER['REQUEST_METHOD']=='PUT'){
        $sql="UPDATE solicitante SET Nombre=:nombre,FechaN=:fechaN,Sexo=:sexo,Direccion=:direccion,Telefono=:telefono,Correo=:correo,
        Nacionalidad=:nacionalidad,NivelE=:nivelE,Habilidades=:habilidades,ObjetivosV=:objetivosV,Pasatiempo=:pasatiempo
        WHERE Id=id";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(':nombre',$_GET['nombre']);
        $consulta->bindValue(':fechaN',$_GET['fechaN']);
        $consulta->bindValue(':sexo',$_GET['sexo']);
        $consulta->bindValue(':direccion',$_GET['direccion']);
        $consulta->bindValue(':telefono',$_GET['telefono']);
        $consulta->bindValue(':correo',$_GET['correo']);
        $consulta->bindValue(':nacionalidad',$_GET['nacionalidad']);
        $consulta->bindValue(':nivelE',$_GET['nivelE']);
        $consulta->bindValue(':habilidades',$_GET['habilidades']);
        $consulta->bindValue(':objetivosV',$_GET['objetivosV']);
        $consulta->bindValue(':pasatiempo',$_GET['pasatiempo']);
        header("HTTP/1.1 200 OK");
        exit;
    }
    if($_SERVER['REQUEST_METHOD']=='DELETE'){
        $sql="DELETE FROM solicitante WHERE Id=:id";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(':Id',$_GET['id']);
        $consulta->execute();
        header("HTTP/1.1 200 OK");
        exit;
    }
    header("HTTP/1.1 400 Bad request");
?>