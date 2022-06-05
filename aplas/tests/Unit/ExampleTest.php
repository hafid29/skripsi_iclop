<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    /**
     * Testing query create database with wrongSyntax (kreate)
     * @return void
     */
    public function testCreateDatabaseWithKreateSytax()
    {
        // siswa melakukan query untuk membuat database
        // query yg di masukan siswa adalah "KREATE DATABASE 'name'"
        // sedangkan ekspetasi untuk query tersebut adalah "CREATE DATABASE"
        // maka dihalaman pembelajaran akan muncul alert 'query salah'
    }
    
    /**
     * Testing query create database with correct syntax (CREATE DATABASE)
     * @return void
     */
    public function testCreateDatabaseWithCorrectSyntax() {
        // siswa melakukan query untuk create database
        // qwuery yg dimasukan adalah "CREATE DATABASE 'name'"
        // sedangkan ekspetasi nya adalah "CREATE DATABASE 'name'"
        // maka dihalaman pembelajan akan muncul pesan "query betul dan akan menampilkan hasil"
    }
    
    /**
     * 
     */
}