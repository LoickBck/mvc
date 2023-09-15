<?php
    require("controller/frontend.php");
    try{
        if(isset($_GET['action']))
        {
            if($_GET['action'] == 'listPost')
            {
                listPosts();
            }elseif($_GET['action'] == 'post')
            {
                if(isset($_GET['id']) && $_GET['id'] > 0)
                {
                    post($_GET['id']);
                }else{
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }elseif($_GET['action'] == 'addComment'){
                if(isset($_GET['id']) && $_GET['id'] > 0)
                {
                    if(isset($_POST['author']))
                    {
                        if(!empty($_POST['author']))
                        {
                            $author = $_POST['author'];
                        }else{
                            header("LOCATION:index.php?action=post&id=".$_GET['id']."&err=12");
                        }
                        if(!empty($_POST['comment']))
                        {
                            $comment = $_POST['comment'];
                        }else{
                            header("LOCATION:index.php?action=post&id=".$_GET['id']."&err=13");
                        }
                        addComment($_GET['id'], $author, $comment);
                        header("LOCATION:index.php?action=post&id=".$_GET['id']);
                    }else{
                        header("LOCATION:index.php?action=post&id=".$_GET['id']."&err=14");
                    }
                }else{
                    header("LOCATION:index.php?action=post&id=".$_GET['id']."&err=8");
                }
            }
        }else{
            //Home Page
            listPosts();
        }
    }catch(Exception $e)
    {
        $errorMessage = $e->getMessage();
    }



?>