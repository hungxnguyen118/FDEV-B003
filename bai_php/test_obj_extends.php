<?php
class A {
    function __construct() {
        echo 'Khởi tạo A<br/>';
    }
}

class B extends A {
    function __construct() {
        parent::__construct();
        echo 'Khởi tạo B<br/>';
    }
}

class C extends B {
    function __construct(){
        parent::__construct();
        echo 'Khởi tạo C<br/>';
    }
}

$c = new C();
?>