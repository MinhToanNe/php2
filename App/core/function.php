<?php

function checkAdmin()
{
    if(!isset($_SESSION['admin_id']))
    {
        header("Location:/login");
    }
  
}