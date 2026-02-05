<?php

function selectedOption($cat, $film)
{
    if (isset($_POST['genre']) && $_POST['genre'] === $cat) {
        return "selected";
    } else if (!isset($_POST['genre']) && $film['genre'] === $cat) {
        return "selected";
    } else if (isset($_POST['genre']) && $_POST['genre'] === "" && $film['genre'] === $cat) {
        return "selected";
    }
}
