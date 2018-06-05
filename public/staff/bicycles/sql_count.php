<?php

    $sql = "SELECT SUM(price1) AS Total FROM bicycles";
    $bike = Bicycles::find_by_sql($sql);