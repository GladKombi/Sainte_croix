<?php
include('../connexion/connexion.php');
if(isset($_POST['login']) && !empty($_GET['fonction']))
{
    $fonction=$_GET['fonction'];
    if($fonction=="admin")
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  users where nom=? and pwd=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
           
          
            $_SESSION['fonction']=$fonction;
            header('location:../views/index.php');  
        }
        else{
            $_SESSION['msg']="username ou password incorect";
            header("location:../views/login.php?fonction=$fonction");  
        }
    }
    else if($fonction=="enseignant")
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  enseignants where nom=? and tel=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
           
          
            $_SESSION['fonction']=$fonction;
            header('location:../views/index.php');  
        }
        else{
            $_SESSION['msg']="username ou password incorect";
            header("location:../views/login.php?fonction=$fonction");  
        }
    }
    else if($fonction=="eleve")
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  eleve  where matricule=? and numeroParent=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
           
          
            $_SESSION['fonction']=$fonction;
            header('location:../views/consulter.php');  
        }
        else{
            $_SESSION['msg']="username ou password incorect";
            header("location:../views/login.php?fonction=$fonction");  
        }
    }
    else
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $req=$connexion->prepare("SELECT * from  eleve where nom=? and pwd=?");
        $req->execute(array($username,$password));
        if($data=$req->fetch())
        {
           
            $_SESSION['fonction']=$fonction;
            $_SESSION['photo']=$data['photo'];
            header('location:../index.php');  
        }
        else{
            $_SESSION['msg']="username ou password incorect";
            header("location:../views/login.php?fonction=$fonction");  
        }
    }

}

?>