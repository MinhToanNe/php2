<?php
namespace app;
class home
{
    public static function index()
    {
        echo "Home";

    }
}

class invoices
{
    public static function index()
    {
        echo "Invoice";
    }

    public static function create()
    {
        echo "Create Invoice";
    }
}