<?php

interface Dao {
    function getAll();

    function getById($id);

    function insert($obj);

    function update($obj);
    
    function delete($id);
}