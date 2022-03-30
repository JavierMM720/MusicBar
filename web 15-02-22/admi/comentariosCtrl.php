<?php
include "comentariosClass.php";
                    $coment=new Comentarios();
                    $coment->conectarBD();

                    switch($_REQUEST['opc']){
                        case 1:
                            $estrellas=0;
                            if ( isset($_REQUEST['estrellas']))
                                $estrellas=$_REQUEST['estrellas'];
                            $coment->inicializar($estrellas,$_REQUEST['titulo'],$_REQUEST['descripcion'],$_REQUEST['clave']);
                            $coment->ingresar();
                            header ("Location: ../index.php");break;
                        case 2:$coment->consultar($_REQUEST['clave']); break;
                        case 3:$coment->borrar($_REQUEST['clave']); 
                            header("Location: comentarios.php"); break;
                        case 4:$coment->aprobar($_REQUEST['clave']); 
                            header("Location: comentarios.php"); break;
                        case 5:$coment->bloquear($_REQUEST['clave']); 
                            header("Location: comentarios.php"); break;
                    }

                    $coment->desconectarBD();

                ?>
