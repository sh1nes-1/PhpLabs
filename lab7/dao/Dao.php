<?php

interface Dao {
    function getAll();

    function getById($id);

    function update($id);
    
    function delete($id);
}