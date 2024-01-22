<?php
namespace app;
class home
{
    public static function index():string
    {
        return "Home";

    }
}

class invoices
{
    public static function index(): string
    {
        return "Invoice";
    }

    public static function create(): string
    {
        return "Create Invoice";
    }
}