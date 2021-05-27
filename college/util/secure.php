<?php

function secure($data): string
{
  $data = trim($data);
  $data = stripslashes($data);
    return htmlspecialchars($data);
}
